<?php

use App\Models\Jenissite;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

    $plant = Jenissite::where('atmp_id', 1)->get();
    $produksi = Jenissite::where('atmp_id', 2)->get();
    $menu = Menu::where('user_id', Auth::user()->id)->first();
    if(Auth::user()->role_id === 2){
        $menuPlant = Jenissite::find($menu->plantatmp_id);
        $menuProduksi = Jenissite::find($menu->produksiatmp_id);
    }
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

                <li class="sidebar-item {{ request()->is('Administrator/Dashboard') || request()->is('Admin/Dashboard') ? 'active' : '' }} ">
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
                                    <li class="submenu-item ">
                                        <a href="{{ route('a.'.$menuPlant->name, [$menuPlant->name, 'Plant']) }}">{{$menuPlant->name}}</a>
                                    </li>
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
                                    <li class="submenu-item ">
                                        <a href="{{ route('a.'.$menuProduksi->name, [$menuProduksi->name, 'Produksi']) }}">{{$menuProduksi->name}}</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        
                    </ul>
                </li>
                @if(Auth::user()->role_id == 1)
                    <li class="sidebar-item  ">
                        <a href="{{ route('sertifikasi') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Sertifikasi</span>
                        </a>
                    </li>
                    <li class="sidebar-title">User</li>

                    <li class="sidebar-item  ">
                        <a href="{{ route('admin') }}" class='sidebar-link'>
                            <i class="bi bi-people"></i>
                            <span>Admin Account</span>
                        </a>
                    </li>
                @endif

                <li class="sidebar-title">Setting</li>

                <li class="sidebar-item  ">
                    @if(Auth::user()->role_id === 1)
                        <a href="{{route('profile', Auth::user()->id)}}" class='sidebar-link'>
                    @else
                        <a href="{{route('a.profile', Auth::user()->id)}}" class='sidebar-link'>
                    @endif
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