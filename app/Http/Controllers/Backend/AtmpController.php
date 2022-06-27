<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Atmp;
use App\Models\Jenissite;
use App\Models\Timeframe;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AtmpController extends Controller
{
    public function index($name, $atmp_name)
    {
        $atmp_id = Jenissite::where('name', $name)->value('atmp_id');
        $events = [];
        $events2 = [];

        if($atmp_name == 'Plant'){
            $id = Jenissite::where([
                    ['name', $name],
                    ['atmp_id', 1]
                ])->value('id');

            $atmpPlant = DB::select("
                SELECT t.id, t.atmp_id, t.jenissite_id, t.plan_start, j.name
                FROM atmps a, jenissites j, timeframes t
                Where t.atmp_id = a.id AND t.jenissite_id = j.id AND j.id = $id AND j.atmp_id = 1 AND t.plan_start IS NOT NULL
            ");
    
            $atmpActual = DB::select("
                SELECT t.id, t.atmp_id, t.jenissite_id, t.actual_start, j.name, t.achiv_peserta, t.plan_start
                FROM atmps a, jenissites j, timeframes t
                Where t.atmp_id = a.id AND t.jenissite_id = j.id AND j.id = $id AND j.atmp_id = 1 AND t.actual_start IS NOT NULL
            ");
        }else{
            $id = Jenissite::where([
                ['name', $name],
                ['atmp_id', 2]
            ])->value('id');

            $atmpPlant = DB::select("
                SELECT t.id, t.atmp_id, t.jenissite_id, t.plan_start, j.name
                FROM atmps a, jenissites j, timeframes t
                Where t.atmp_id = a.id AND t.jenissite_id = j.id AND j.id = $id AND j.atmp_id = 2 AND t.plan_start IS NOT NULL
            ");
    
            $atmpActual = DB::select("
                SELECT t.id, t.atmp_id, t.jenissite_id, t.actual_start, j.name, t.achiv_peserta, t.plan_start
                FROM atmps a, jenissites j, timeframes t
                Where t.atmp_id = a.id AND t.jenissite_id = j.id AND j.id = $id AND j.atmp_id = 2 AND t.actual_start IS NOT NULL
            ");
        }

        return view('atmp.index', compact(['events', 'events2', 'name', 'atmpPlant', 'atmpActual', 'atmp_name']));
    }

    public function insert($name, $atmp_name)
    {
        if($atmp_name == 'Plant'){
            $id = Jenissite::where([
                    ['name', $name],
                    ['atmp_id', 1]
                ])->value('id');
        }else{
            $id = Jenissite::where([
                    ['name', $name],
                    ['atmp_id', 2]
                ])->value('id');
        }
        $jenissite = Jenissite::all();
        return view('atmp.insert', compact(['id', 'name', 'jenissite', 'atmp_name']));
    }

    public function storeATMP(Request $request, $name, $atmp_name)
    {
        // $validate = Validator::make($request->all(),)

        Timeframe::insert([
            'atmp_id'       => 1,
            'jenissite_id'  => $request->jenissite_id,
            'plan_start'    => $request->plan_start,
            'plan_finish'   => $request->plan_finish,
            'actual_start'  => $request->actual_start,
            'actual_finish' => $request->actual_finish,
            'tot_peserta'   => $request->tot_peserta,
            'act_peserta'   => $request->act_peserta,
            'achiv_peserta' => $request->achiv_peserta,
            'instruktur'    => $request->instruktur,
            'percent_achiv_peserta'     => $request->percent_achiv_peserta,
            'percent_achiv_event_month' => $request->percent_achiv_event_month,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        if(Auth::user()->role_id == 1){
            return redirect()->route($name,[$name, $atmp_name])->with('alert', 'Berhasil Menambahkan Data Timeframe '.$name.'!');
        }else{
            return redirect()->route('a.'.$name,[$name, $atmp_name])->with('alert', 'Berhasil Menambahkan Data Timeframe '.$name.'!');
        }
    }

    public function detail($name, $id)
    {
        $data = Timeframe::where('id', $id)->first();
        $atmp_id = Jenissite::where('id', $data->jenissite_id)->value('atmp_id');
        $atmp_name = Atmp::where('id', $atmp_id)->value('name');
        $jenissite = Jenissite::all();
        return view('atmp.detail', compact(['name', 'id', 'data', 'jenissite', 'atmp_name']));
    }

    public function updateATMP(Request $request, $name, $id, $atmp_name)
    {
        // $validate = Validator::make($request->all(),)

        Timeframe::where('id', $id)->update([
            'atmp_id'       => 1,
            'jenissite_id'  => $request->jenissite_id,
            'plan_start'    => $request->plan_start,
            'plan_finish'   => $request->plan_finish,
            'actual_start'  => $request->actual_start,
            'actual_finish' => $request->actual_finish,
            'tot_peserta'   => $request->tot_peserta,
            'act_peserta'   => $request->act_peserta,
            'achiv_peserta' => $request->achiv_peserta,
            'instruktur'    => $request->instruktur,
            'percent_achiv_peserta'     => $request->percent_achiv_peserta,
            'percent_achiv_event_month' => $request->percent_achiv_event_month,
            'updated_at'    => Carbon::now()
        ]);

        Session::put('sweetalert', 'success');
        if(Auth::user()->role_id == 1){
            return redirect()->route($name,[$name, $atmp_name])->with('alert', 'Berhasil Mengupdate Data Timeframe '.$name.'!');
        }else{
            return redirect()->route('a.'.$name,[$name, $atmp_name])->with('alert', 'Berhasil Mengupdate Data Timeframe '.$name.'!');
        }
    }

    public function destroy($name, $id, $atmp_name)
    {
        $timeframe = Timeframe::where('id', $id)->first();
        if(!empty($timeframe)){
            Timeframe::where('id', $id)->delete();
        }

        Session::put('sweetalert', 'success');
        if(Auth::user()->role_id == 1){
            return redirect()->route($name,[$name, $atmp_name])->with('alert', 'Berhasil Menghapus Data Timeframe '.$name.'!');
        }else{
            return redirect()->route('a.'.$name,[$name, $atmp_name])->with('alert', 'Berhasil Menghapus Data Timeframe '.$name.'!');
        }
    }

}
