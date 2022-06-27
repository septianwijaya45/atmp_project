@extends('layouts.app', [ 'title' => 'Edit Data Diri'])

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
            <h3>Edit Data Diri</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">User</li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Data Diri</li>
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
                        <h3>Edit Data Diri</h3>
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
            @if(Auth::user()->role_id == 1)
                <form action="{{ route('updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @else
                <form action="{{ route('a.updateProfile', $user->id) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
            @endif
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
                                <label for="">Password <span class="text-danger">*Isi Jika Ingin Diubah</span></label> 
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password <span class="text-danger">*Isi Jika Ingin Diubah</span></label> 
                                <input type="password"  class="form-control" id="confirm_password" placeholder="Confirm Password">
                            </div>
                            <span class="text-center" id='message'></span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-end" id="btn-submit">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

@section('footer')
<script type="text/javascript">
    //Password Change Validation
    $('#password, #confirm_password').on('keyup', function () {
        let pass = $('#password').val();
        let confirm_pass = $('#confirm_password').val();

        if (pass == confirm_pass) {
            if(pass === '' && confirm_pass === ''){
                $('#message').html('').css('color', 'green');
                $('#btn-submit').attr('disabled', false);
            }else{
                $('#message').html('Matching').css('color', 'green');
                $('#btn-submit').attr('disabled', false);
            }
        } else {
            $('#message').html('Not Matching').css('color', 'red');
            $('#btn-submit').attr('disabled', true);
        }
    });
</script>
@stop