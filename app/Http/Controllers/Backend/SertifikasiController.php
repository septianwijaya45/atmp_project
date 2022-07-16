<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\DetailTraining;
use App\Models\Identitas;
use App\Models\Jenissite;
use App\Models\JenisTraining;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SertifikasiController extends Controller
{
    function index(Request $request){
        if($request->method() == 'GET'){
            $training = [];
            return view('sertifikasi.index', compact(['training', 'request']));
        }else{
            if(!empty($request->nik)){
                $training = DB::select("
                    SELECT i.*, jt.nama as jt_nama, dt.*
                    FROM identitases i, jenis_trainings jt, detail_trainings dt
                    WHERE i.nik = '$request->nik' AND i.id = dt.identitas_id AND jt.id = dt.jenis_training_id
                ");
            }elseif(!empty($request->nama)){
                $training = DB::select("
                    SELECT i.*, jt.nama as jt_nama, dt.*
                    FROM identitases i, jenis_trainings jt, detail_trainings dt
                    WHERE i.nama = '$request->nama'  AND i.id = dt.identitas_id AND jt.id = dt.jenis_training_id
                ");
            }else{
                $training = DB::select("
                    SELECT i.*, jt.nama as jt_nama, dt.*
                    FROM identitases i, jenis_trainings jt, detail_trainings dt
                    WHERE i.nik = '$request->nik' AND i.nama = '$request->nama' AND i.id = dt.identitas_id AND jt.id = dt.jenis_training_id
                ");
            }
            return view('sertifikasi.index', compact(['training', 'request']));
        }
    }

    function insert(){
        $identitas = Identitas::all();
        $jenisSite = Jenissite::all();
        $jenisTraining = JenisTraining::all();
        return view('sertifikasi.insert', compact(['identitas', 'jenisSite', 'jenisTraining']));
    }

    function store(Request $request){
        $validate = Validator::make($request->all(),[
            'nik'                       => 'required',
            'nama'                      => 'required',
            'jenissite_id'              => 'required',
            'jabatan'                   => 'required',
            'jenis_training_id'         => 'required',
            'nama_training'             => 'required',
            'tgl_training'              => 'required',
            'tgl_sertifikat'            => 'required',
            'no_sertifikat'             => 'required',
            'no_reg'                    => 'required',
            'vendor'                    => 'required',
            'img'                       => 'required|mimes:jpeg,png,jpg,gif|max:5024'
        ], [
            'nik.required'                      => 'NIK Harus Diisi!',
            'nama.required'                     => 'Nama Harus Diisi!',
            'jenissite_id.required'             => 'Jenis Site Harus Diisi!',
            'jabatan.required'                  => 'Jabatan Harus Dipilih!',
            'jenis_training_id.required'        => 'Jenis Training Harus Dipilih!',
            'nama_training.required'            => 'Nama Training Harus Dipilih!',
            'tgl_training.required'             => 'Tanggal Training Harus Dipilih!',
            'tgl_sertifikat.required'           => 'Tanggal Sertifikat Harus Dipilih!',
            'no_sertifikat.required'            => 'Nomor Sertifikat!',
            'no_reg.required'                   => 'Nomor Reg Harus Diisi!',
            'vendor.required'                   => 'Vendor Harus Diisi!',
            'img.required'                      => 'Gambar Harus Diupload!',
            'img.mimes'                         => 'Gambar Harus Ekstensi File .jpeg, .png, .jpg, .gif!',
            'img.max'                          => 'Maksimal Gambar Harus 5MB!'
        ]);
        
        if($validate->fails()){
            Session::put('sweetalert', 'warning');
            return redirect()->back()->with('alert', 'Gagal Tambah Training!')->withErrors($validate);
        }

        $identitas                  = new Identitas();
        $identitas->jenissite_id    = $request->jenissite_id;
        $identitas->nik             = $request->nik;
        $identitas->nama            = $request->nama;
        $identitas->jabatan         = $request->jabatan;
        $identitas->created_at      = Carbon::now();
        $identitas->updated_at       = Carbon::now();
        $identitas->save();

        $name = $request->file('img')->getClientOriginalName();
        $request->file('img')->move('backend/images/profile/', $name);

        DetailTraining::insert([
            'identitas_id'          => $identitas->id,
            'jenis_training_id'     => $request->jenis_training_id,
            'nama_training'         => $request->nama_training,
            'tgl_training'          => $request->tgl_training,
            'tgl_sertifikat'        => $request->tgl_sertifikat,
            'no_sertifikat'         => $request->no_sertifikat,
            'no_reg'                => $request->no_reg,
            'vendor'                => $request->vendor,
            'img'                   => $request->img,
            'created_at'            => Carbon::now(),
            'updated_at'            => Carbon::now()
        ]);
        
        Session::put('sweetalert', 'success');
        return redirect()->route('searchSertifikasi')->withInput(['nik' => $request->nik, 'nama' => $request->nama])->with('alert', 'Berhasil Menambahkan Data Training!');
    }
}
