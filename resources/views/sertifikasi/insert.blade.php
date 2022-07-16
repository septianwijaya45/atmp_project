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
                            <h4 class="card-title">Tambah Sertifikasi</h4>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('storeSertifikasi') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <h5 class="text-success">Identitas Diri</h5>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenissite_id">Jenis Site</label>
                                <select name="jenissite_id" id="jenissite_id" class="form-control @error('jenissite_id') is-invalid @enderror">
                                    <option value="" class="text-center" readonly>Pilih Jenis Site</option>
                                    @foreach($jenisSite as $data)
                                        <option value="{{$data->id}}" @if(old('jenissite_id' == $data->id)) selected @endif>{{ $data->name }}</option>
                                    @endforeach
                                </select>
                                @error('jenissite_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" placeholder="NIK">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{  old('nama') }}" placeholder="Nama">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" value="{{  old('jabatan') }}" placeholder="Jabatan">
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="text-grey">Detail Training</h5>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jenis_training_id">Jenis Training</label>
                                <select name="jenis_training_id" id="jenis_training_id" class="form-control @error('jenis_training_id') is-invalid @enderror">
                                    <option value="" readonly class="text-center">Pilih Jenis Training</option>
                                    @foreach($jenisTraining as $data)
                                        <option value="{{$data->id}}" @if(old('jenis_training_id' == $data->id)) selected @endif>{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_training_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_training">Nama Training</label>
                            <textarea name="nama_training" id="nama_training" class="form-control @error('nama_training') is-invalid @enderror" cols="30" rows="10" placeholder="Nama Training">{{ old('nama_training') }}</textarea>
                            @error('nama_training')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_training">Tanggal Training</label>
                            <input type="date" name="tgl_training" id="tgl_training" class="form-control @error('tgl_training') is-invalid @enderror" value="{{  old('tgl_training') }}">
                            @error('tgl_training')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_sertifikasi">Tanggal Sertifikasi</label>
                            <input type="date" name="tgl_sertifikat" id="tgl_sertifikat" class="form-control @error('tgl_sertifikat') is-invalid @enderror" value="{{  old('tgl_sertifikat') }}">
                            @error('tgl_sertifikasi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_sertifikat">Nomor Sertifikat</label>
                            <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control @error('no_sertifikat') is-invalid @enderror" value="{{  old('no_sertifikat') }}" placeholder="Nomor Sertifikasi">
                            @error('no_sertifikat')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_reg">Nomor Reg</label>
                            <input type="text" name="no_reg" id="no_reg" class="form-control @error('no_reg') is-invalid @enderror" value="{{  old('no_reg') }}" placeholder="Nomor Reg">
                            @error('no_reg')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="vendor">Vendor</label>
                            <input type="text" name="vendor" id="vendor" class="form-control @error('vendor') is-invalid @enderror" value="{{  old('vendor') }}" placeholder="Vendor">
                            @error('vendor')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="img">Foto Sertifikasi</label>
                            <input type="file" name="img" id="img" class="form-control @error('img') is-invalid @enderror" value="{{  old('img') }}" placeholder="Foto">
                            @error('img')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <img src="https://dominionmartialarts.com/wp-content/uploads/2017/04/default-image.jpg" id="preview"  alt="your image" width="200px"/>
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <button type="submit" class="btn btn-success mt-4">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('footer')
<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#img").change(function() {
    readURL(this);
});
</script>
@stop