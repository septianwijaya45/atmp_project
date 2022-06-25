@extends('layouts.app', [ 'title' => 'ATMP'])

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>ATMP</h3>
            <p class="text-subtitle text-muted">Tambah {{$name}}</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">ATMP</li>
                    <li class="breadcrumb-item active" aria-current="page">Tambah ATMP {{$name}}</li>
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
                        <h3>Tambah Data ATMP {{$name}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Form Tambah Data</h4>
            </div>
            <form action="{{ route('storePlant', $name) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Jenis Site</label>
                                <select name="jenissite_id" id="jenissite_id" class="form-control @error('jenissite_id') is-invalid @enderror" value="{{ old('jenissite_id') }}">
                                    <option value="" selected disabled>Pilih Jenis ATMP</option>
                                    @foreach($jenissite as $data)
                                        <option value="{{ $data->id }}" @if($data->id == $id) selected @endif>{{$data->name}}</option>
                                    @endforeach
                                </select>

                                @error('jenissite_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_start">Plan Start</label>
                                <input type="date" class="form-control @error('plan_start') is-invalid @enderror" name="plan_start" placeholder="Plant Start" value="{{ old('plan_start') }}">

                                @error('plan_start')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="actual_start">Actual Start</label>
                                <input type="date" class="form-control @error('actual_start') is-invalid @enderror" name="actual_start" placeholder="Actual Start" value="{{ old('actual_start') }}">

                                @error('actual_start')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tot_peserta">Total Peserta</label>
                                <input type="number" min="0" class="form-control @error('tot_peserta') is-invalid @enderror" name="tot_peserta" placeholder="Total Peserta" value="{{ old('tot_peserta') }}">

                                @error('tot_peserta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="achiv_peserta">Achive Peserta</label>
                                <input type="number" min="0" class="form-control @error('achiv_peserta') is-invalid @enderror" name="achiv_peserta" placeholder="Achive Peserta" value="{{ old('achiv_peserta') }}">

                                @error('achiv_peserta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="percent_achiv_peserta">Percentage Achive Peserta</label>
                                <input type="number" min="0" class="form-control @error('percent_achiv_peserta') is-invalid @enderror" name="percent_achiv_peserta" placeholder="Percentage Achive Peserta" value="{{ old('percent_achiv_peserta') }}">

                                @error('percent_achiv_peserta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="plan_finish">Plan Finish</label>
                                <input type="date" class="form-control @error('plan_finish') is-invalid @enderror" name="plant_finish" placeholder="Plan Finish" value="{{ old('plan_finish') }}">

                                @error('plan_finish')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="actual_finish">Actual Finish</label>
                                <input type="date" class="form-control @error('actual_finish') is-invalid @enderror" name="actual_finish" placeholder="Actual Finish" value="{{ old('actual_finish') }}">

                                @error('actual_finish')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="act_peserta">Actual Peserta</label>
                                <input type="number" min="0" class="form-control @error('act_peserta') is-invalid @enderror" name="act_peserta" placeholder="Actual Peserta" value="{{ old('act_peserta') }}">

                                @error('act_peserta')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="instruktur">Instruktur</label>
                                <input type="text" min="0" class="form-control @error('instruktur') is-invalid @enderror" name="instruktur" placeholder="Instruktur" value="{{ old('instruktur') }}">

                                @error('instruktur')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="percent_achiv_event_month">Percentage Achive Event Month</label>
                                <input type="number" min="0" class="form-control @error('percent_achiv_event_month') is-invalid @enderror" name="percent_achiv_peserta" placeholder="Percentage Achive Event Month" value="{{ old('percent_achiv_event_month') }}">

                                @error('percent_achiv_event_month')
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