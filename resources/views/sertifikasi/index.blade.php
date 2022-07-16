@extends('layouts.app', [ 'title' => 'Sertifikasi'])

@section('content')
@if(Session::has('alert'))
  @if(Session::get('sweetalert')=='success')
    <div class="swalDefaultSuccess">
    </div>
  @elseif(Session::get('sweetalert')=='error')
    <div class="swalDefaultError">
    </div>
    @elseif(Session::get('sweetalert')=='warning')
    <div class="swalDefaultWarning">
    </div>
  @endif
@endif
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Sertifikasi</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">ATMP</li>
                    <li class="breadcrumb-item active" aria-current="page">Sertifikasi</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Cari Data Sertifikasi</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('addSertifikasi') }}" class="btn btn-primary float-end">
                                <i class="bi bi-plus"></i>
                                Tambah Data
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('searchSertifikasi') }}" method="POST" enctype="multipart/form-data" id="formCari">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" id="nik" class="form-control" value="{{ $request->nik ? $request->nik : old('nik') }}">
                        </div>
                        <div class="col-md-1 mt-4">
                            <p>ATAU</p>
                        </div>
                        <div class="col-md-5">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{ $request->nama ? $request->nama : old('nama') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success mt-4">Cari Data</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Sertifikasi</h4>
            </div>
            <div class="card-body">
            <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Training</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                            ?>
                            @foreach($training as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$data->jt_nama}}</td>
                                    <td>
                                    <a href="" class="btn btn-sm btn-warning">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <button onclick="destroy('{{$data->id}}')" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash2"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop