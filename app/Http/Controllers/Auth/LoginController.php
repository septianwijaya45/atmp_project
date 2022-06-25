<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if(Auth::attempt([
            'nik'       => $request->nik,
            'password'  => $request->password,
            'role_id'   => 1
        ])){
            Session::put('sweetalert', 'warning');
            return redirect()->route('dashboard')->with('alert', 'Selamat Datang!');
        }elseif(Auth::attempt([
            'nik'       => $request->nik,
            'password'  => $request->password,
            'role_id'   => 2
        ])){
            Session::put('sweetalert', 'warning');
            return redirect()->route('dashboardAdmin')->with('alert', 'Selamat Datang!');
        }else{
            return redirect('login')->with('alert','NIK atau Password anda salah!');
        }
    }
    
    public function logout()
    {
        Auth::logout();
        Session::put('sweetalert', 'success');
        return redirect('login')->with('success', 'Berhasil Log Out!');
    }
}
