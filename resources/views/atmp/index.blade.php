@extends('layouts.app', [ 'title' => 'ATMP'])

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
            <h3>ATMP</h3>
            <p class="text-subtitle text-muted">{{$name}}</p>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">ATMP</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="page-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 float-left">
                            <h3>Data ATMP {{$name}}</h3>
                        </div>
                        <div class="col-md-6">
                            @if(Auth::user()->role_id == 1)
                                <a href="{{ route('insertATMP', [$name, $atmp_name]) }}" class="btn btn-primary float-end">
                                    <i class="bi bi-plus"></i>
                                    Tambah Data
                                </a>
                            @else
                                <a href="{{ route('a.insertATMP', [$name, $atmp_name]) }}" class="btn btn-primary float-end">
                                    <i class="bi bi-plus"></i>
                                    Tambah Data
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data {{$name}}</h4>
                </div>
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer')
@if(Auth::user()->role_id == 1)
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                initialView: 'listWeek',
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: [
                    @foreach($atmpPlant as $data)
                        {
                            'title': 'Plant-'+{!! json_encode($data->name) !!},
                            'start': {!! json_encode($data->plan_start) !!},
                            'color':  '#FFC54D',
                            'url'  : {!! json_encode( route('detailATMP', ['name' => $name, 'id' => $data->id]) ) !!}
                        },
                    @endforeach
                    @foreach($atmpActual as $data)
                        {
                            'title': 'Actual-'+{!! json_encode($data->name) !!},
                            'start': {!! json_encode($data->actual_start) !!},
                            @if(empty($data->achiv_peserta))
                                'color': '#990000',
                            @elseif(empty($data->plan_start))
                                'color': '#8D8DAA',
                            @else
                                'color': '#53BF9D',
                            @endif
                            'url'  : {!! json_encode( route('detailATMP', ['name' => $name, 'id' => $data->id]) ) !!}
                        },
                    @endforeach
                ]
            })
        });
</script>
@else
<script>
    $(document).ready(function () {
            // page is now ready, initialize the calendar...
            events={!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                initialView: 'listWeek',
                header:{
                    left:'prev,next today',
                    center:'title',
                    right:'month,agendaWeek,agendaDay'
                },
                events: [
                    @foreach($atmpPlant as $data)
                        {
                            'title': 'Plant-'+{!! json_encode($data->name) !!},
                            'start': {!! json_encode($data->plan_start) !!},
                            'color':  '#FFC54D',
                            'url'  : {!! json_encode( route('a.detailATMP', ['name' => $name, 'id' => $data->id]) ) !!}
                        },
                    @endforeach
                    @foreach($atmpActual as $data)
                        {
                            'title': 'Actual-'+{!! json_encode($data->name) !!},
                            'start': {!! json_encode($data->actual_start) !!},
                            @if(empty($data->achiv_peserta))
                                'color': '#990000',
                            @elseif(empty($data->plan_start))
                                'color': '#8D8DAA',
                            @else
                                'color': '#53BF9D',
                            @endif
                            'url'  : {!! json_encode( route('a.detailATMP', ['name' => $name, 'id' => $data->id]) ) !!}
                        },
                    @endforeach
                ]
            })
        });
</script>
@endif
@stop