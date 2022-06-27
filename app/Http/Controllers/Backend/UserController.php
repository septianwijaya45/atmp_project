<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);
        return view('profile.index', compact(['user']));
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(),[
            'name'          => 'required',
            'username'      => 'required',
            'nik'           => 'required',
        ], [
            'name.required'             => 'Nama Harus Diisi!',
            'username.required'         => 'Username Harus Diisi!',
            'nik.required'              => 'NIK Harus Diisi!',
        ]);
        
        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Mengubah Data Diri!')->withErrors($validate);
        }

        if(!is_null($request->password)){
            User::where('id', $id)->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'nik'           => $request->nik,
                'password'      => bcrypt($request->password),
                'updated_at'    => Carbon::now()
            ]);
        }else{
            User::where('id', $id)->update([
                'name'          => $request->name,
                'username'      => $request->username,
                'nik'           => $request->nik,
                'updated_at'    => Carbon::now()
            ]);
        }

        Session::put('sweetalert', 'success');
        return redirect()->back()->with('alert', 'Berhasil Mengubah Data Diri!')->withErrors($validate);
    }
}
