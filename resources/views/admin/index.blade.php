@extends('layouts.app', [ 'title' => 'Admin User'])

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
            <h3>User Admin</h3>
            <p class="text-subtitle text-muted">Data User Admin</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item" aria-current="page">User</li>
                    <li class="breadcrumb-item active" aria-current="page">Admin</li>
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
                    <div class="col-md-6">
                        <h4 class="card-title">Data Admin ATMP</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('addAdmin') }}" class="btn btn-primary float-end">
                            <i class="bi bi-plus"></i>
                            Tambah Data
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>NIK</th>
                            <th>Plant Menu</th>
                            <th>Produksi Menu</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

use App\Models\Jenissite;

                            $no = 1;
                        ?>
                        @foreach($user as $data)
                        <?php 
                            $plant = Jenissite::where('id', $data->plantatmp_id)->value('name');
                            $produksi = Jenissite::where('id', $data->produksiatmp_id)->value('name');
                        ?>
                            <tr>
                                <th>{{$no++}}</th>
                                <th>{{$data->name}}</th>
                                <th>{{$data->username}}</th>
                                <th>{{$data->nik}}</th>
                                <th>{{$plant}}</th>
                                <th>{{$produksi}}</th>
                                <th>{{date('d F Y', strtotime($data->tgl_buat))}}</th>
                                <th>
                                    <a href="{{ route('editAdmin', $data->uid) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button onclick="destroy('{{$data->uid}}')" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash2"></i>
                                    </button>
                                    <button onclick="resetPassword('{{$data->uid}}')" class="btn btn-sm btn-primary">
                                        <i class="bi bi-file-lock2"></i>
                                    </button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop


@section('footer')
<script type="text/javascript">
    function destroy(id){
        swal({
            title: "Anda Yakin?",
            text: "Untuk menghapus Admin ini?",
            icon: 'warning',
            buttons: true,
            dangerMode: true
        })
        .then((willDelete) => {
            if(willDelete) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        url: "{{url('Administrator/Admin/Delete')}}/"+id,
                        method: 'DELETE',
                        success: function (results) {
                            swal("Berhasil!", "Data Berhasil Dihapus!", "success");
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        },
                        error: function (results) {
                            swal("GAGAL!", "Gagal Menghapus Data!", "error");
                        }
                    });
            }else{
                swal("Data Admin Batal Dihapus", "", "info")
            }
        })
    }

    function resetPassword(id){
        swal({
            title: "Anda Yakin?",
            text: "Untuk Reset Password Admin ini?",
            icon: 'warning',
            buttons: true,
            dangerMode: true
        })
        .then((willDelete) => {
            if(willDelete) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                        url: "{{url('Administrator/Admin/Reset-Password')}}/"+id,
                        method: 'GET',
                        success: function (results) {
                            swal("Berhasil!", "Berhasil Reset Password!", "success");
                            setTimeout(() => {
                                window.location.reload();
                            }, 1000);
                        },
                        error: function (results) {
                            swal("GAGAL!", "Gagal Reset Password!", "error");
                        }
                    });
            }else{
                swal("Batal Reset Password", "", "info")
            }
        })
    }
</script>
@stop