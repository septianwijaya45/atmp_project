<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Jenissite;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = DB::select("
            SELECT u.*, u.id as uid, u.created_at as tgl_buat, m.*
            FROM users u, menus m
            WHERE u.id = m.user_id
        ");
        return view('admin.index', compact(['user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenissiteP = Jenissite::where('atmp_id', 1)->get();
        $jenissitePr = Jenissite::where('atmp_id', 2)->get();
        return view('admin.insert', compact(['jenissiteP', 'jenissitePr']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'          => 'required',
            'username'      => 'required',
            'nik'           => 'required|unique:users',
            'plantatmp_id'  => 'required',
            'produksiatmp_id'  => 'required'
        ], [
            'name.required'             => 'Nama Harus Diisi!',
            'username.required'         => 'Username Harus Diisi!',
            'nik.required'              => 'NIK Harus Diisi!',
            'nik.unique'                => 'NIK Harus Berbeda!',
            'plantatmp_id.required'     => 'Jenis Site Harus Dipilih!',
            'produksiatmp_id.required'     => 'Jenis Site Harus Dipilih!'
        ]);
        
        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Menambahkan Data Admin!')->withErrors($validate);
        }


        // User
        $user = new User();
        $user->role_id       = 2;
        $user->name           = $request->name;
        $user->username      = $request->username;
        $user->nik            = $request->nik;
        $user->password      = bcrypt('admin');
        $user->created_at    = Carbon::now();
        $user->updated_at    = Carbon::now();
        $user->save();

        // Menu
        Menu::insert([
            'user_id'       => $user->id,
            'plantatmp_id'  => $request->plantatmp_id,
            'produksiatmp_id'  => $request->produksiatmp_id,
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->route('admin')->with('alert', 'Sukses Menambahkan Data Admin!')->withErrors($validate);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $jenissite = Menu::where('user_id', $id)->first();
        $jenissiteP = Jenissite::where('atmp_id', 1)->get();
        $jenissitePr = Jenissite::where('atmp_id', 2)->get();
        return view('admin.edit', compact(['user', 'jenissiteP', 'jenissitePr', 'jenissite']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'name'          => 'required',
            'username'      => 'required',
            'nik'           => 'required',
            'plantatmp_id'  => 'required',
            'produksiatmp_id'  => 'required'
        ], [
            'name.required'             => 'Nama Harus Diisi!',
            'username.required'         => 'Username Harus Diisi!',
            'nik.required'              => 'NIK Harus Diisi!',
            'plantatmp_id.required'     => 'Jenis Site Harus Dipilih!',
            'produksiatmp_id.required'     => 'Jenis Site Harus Dipilih!'
        ]);
        
        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Admin!')->withErrors($validate);
        }


        // User
        User::where('id', $id)->update([
            'name'          => $request->name,
            'username'      => $request->username,
            'nik'           => $request->nik,
            'updated_at'    => Carbon::now()
        ]);

        // Menu
        Menu::where('user_id', $id)->update([
            'plantatmp_id'  => $request->plantatmp_id,
            'produksiatmp_id'  => $request->produksiatmp_id,
        ]);

        Session::put('sweetalert', 'success');
        return redirect()->back()->with('alert', 'Sukses Mengubah Data Admin!')->withErrors($validate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            Menu::where('user_id', $id)->delete();
            User::where('id', $id)->delete();
        }
    }

    public function resetPassword($id)
    {
        User::where('id', $id)->update([
            'password'  => bcrypt('admin')
        ]);
    }
}
