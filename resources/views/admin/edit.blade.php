@extends('layouts.app', [ 'title' => 'Edit User Admin'])

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
            <h3>Edit Data User</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">User</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Admin</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 float-left">
                        <h3>Edit Data Admin ATMP</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Data</h4>
            </div>
                <form action="{{ route('updateAdmin', $user->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nama</label> 
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Admin" value="{{ $user->name }}">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Username</label> 
                                <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username Admin" value="{{ $user->username }}">

                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">NIK Admin</label> 
                                <input type="number" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK Admin" value="{{ $user->nik }}">

                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Jenis Site (Plant)</label>
                                <select name="plantatmp_id" id="plantatmp_id" class="form-control @error('plantatmp_id') is-invalid @enderror" value="{{ old('plantatmp_id') }}">
                                    <option value="" selected disabled>Pilih Jenis ATMP (Plant)</option>
                                    @foreach($jenissiteP as $data)
                                        <option value="{{ $data->id }}" @if($jenissite->plantatmp_id === $data->id) selected @endif>{{$data->name}}</option>
                                    @endforeach
                                </select>

                                @error('plantatmp_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Jenis Site (Produksi)</label>
                                <select name="produksiatmp_id" id="produksiatmp_id" class="form-control @error('produksiatmp_id') is-invalid @enderror" value="{{ old('produksiatmp_id') }}">
                                    <option value="" selected disabled>Pilih Jenis ATMP</option>
                                    @foreach($jenissitePr as $data)
                                            <option value="{{ $data->id }}" @if($jenissite->produksiatmp_id === $data->id) selected @endif>{{$data->name}}</option>
                                    @endforeach
                                </select>

                                @error('produksiatmp_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-end">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop