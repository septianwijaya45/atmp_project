<?php

use App\Models\Jenissite;

    $plant = Jenissite::where('atmp_id', 1)->get();
    $produksi = Jenissite::where('atmp_id', 2)->get();
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{asset('backend/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item active ">
                    <a href="{{route('dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">ATMP Menu</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>ATMP</span>
                    </a>
                    <ul class="submenu ">
                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <span>Plant</span>
                            </a>
                            <ul class="submenu">
                                @if(Auth::user()->role_id == 1)
                                    @foreach($plant as $data)
                                        <li class="submenu-item ">
                                            <a href="{{ route($data->name, [$data->name, 'Plant']) }}">{{$data->name}}</a>
                                        </li>
                                    @endforeach
                                @else
                                    @if(Auth::user()->id == 2)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$plant[2]->name, [$plant[2]->name, 'Plant']) }}">{{$plant[2]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 3)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$plant[3]->name, [$plant[3]->name, 'Plant']) }}">{{$plant[3]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 4)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$plant[4]->name, [$plant[4]->name, 'Plant']) }}">{{$plant[4]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 5)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$plant[5]->name, [$plant[5]->name, 'Plant']) }}">{{$plant[5]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 6)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$plant[6]->name, [$plant[6]->name, 'Plant']) }}">{{$plant[6]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 7)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$plant[7]->name, [$plant[7]->name, 'Plant']) }}">{{$plant[7]->name}}</a>
                                        </li>
                                    @else
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$plant[8]->name, [$plant[8]->name, 'Plant']) }}">{{$plant[8]->name}}</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </li>
                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <span>Produksi</span>
                            </a>
                            <ul class="submenu">
                                @if(Auth::user()->role_id == 1)
                                    @foreach($produksi as $data)
                                        <li class="submenu-item ">
                                            <a href="{{ route($data->name, [$data->name, 'Produksi']) }}">{{$data->name}}</a>
                                        </li>
                                    @endforeach
                                @else
                                    @if(Auth::user()->id == 2)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$produksi[2]->name, [$produksi[2]->name, 'Produksi']) }}">{{$produksi[2]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 3)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$produksi[3]->name, [$produksi[3]->name, 'Produksi']) }}">{{$produksi[3]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 4)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$produksi[4]->name, [$produksi[4]->name, 'Produksi']) }}">{{$produksi[4]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 5)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$produksi[5]->name, [$produksi[5]->name, 'Produksi']) }}">{{$produksi[5]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 6)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$produksi[6]->name, [$produksi[6]->name, 'Produksi']) }}">{{$produksi[6]->name}}</a>
                                        </li>
                                    @elseif(Auth::user()->id == 7)
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$produksi[7]->name, [$produksi[7]->name, 'Produksi']) }}">{{$produksi[7]->name}}</a>
                                        </li>
                                    @else
                                        <li class="submenu-item ">
                                            <a href="{{ route('a.'.$produksi[8]->name, [$produksi[8]->name, 'Produksi']) }}">{{$produksi[8]->name}}</a>
                                        </li>
                                    @endif
                                @endif
                            </ul>
                        </li>
                        
                    </ul>
                </li>

                <li class="sidebar-title">Setting</li>

                <li class="sidebar-item  ">
                    <a href="application-email.html" class='sidebar-link'>
                        <i class="bi bi-envelope-fill"></i>
                        <span>My Profile</span>
                    </a>
                </li>

                <li class="sidebar-item  ">
                    <a href="{{route('log-out')}}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>