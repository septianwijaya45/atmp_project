<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AtmpController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Jenissite;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::patch('login-request', [LoginController::class, 'login'])->name('post-login');
Route::get('/log-out', [LoginController::class, 'logout'])->name('log-out');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['middleware' => ['web', 'auth', 'roles']], function(){
    // Administrator
    Route::group(['roles' => 'Administrator', 'prefix' => 'Administrator'], function(){
        Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // ATMP
        Route::group(['prefix' => 'ATMP'], function(){
            $JenisSite = DB::select("
                SELECT j.name, a.name as atmp_name
                FROM jenissites j, atmps a
                WHERE j.atmp_id = a.id
            ");
            foreach($JenisSite as $data){
                Route::get('/{'.$data->name.'}/{'.$data->atmp_name.'}', [AtmpController::class, 'index'])->name(''.$data->name.'');
            }

            Route::get('/Data-ATMP/Add-Data/{name}/{atmp_name}', [AtmpController::class, 'insert'])->name('insertATMP');
            Route::post('/Store-Data/{name}/{atmp_name}', [AtmpController::class, 'storeATMP'])->name('storeATMP');
            Route::get('/Data-ATMP/Detail-Data/{name}/{id}', [AtmpController::class, 'detail'])->name('detailATMP');
            Route::post('/Update-Data/{name}/{id}/{atmp_name}', [AtmpController::class, 'updateATMP'])->name('updateATMP');
            Route::get('/Delete-Data/{name}/{id}/{atmp_name}', [AtmpController::class, 'destroy'])->name('deleteATMP');
        });

        // Admin
        Route::group(['prefix'  => 'Admin'], function(){
            Route::get('/', [AdminController::class, 'index'])->name('admin');
            // Add
            Route::get('/Tambah-Data', [AdminController::class, 'create'])->name('addAdmin');
            Route::post('/Tambah-Data/Simpan', [AdminController::class, 'store'])->name('storeAdmin');
            // Edit
            Route::get('/Edit-Data/{id}', [AdminController::class, 'edit'])->name('editAdmin');
            Route::post('/Update-Data/{id}', [AdminController::class, 'update'])->name('updateAdmin');
            // Delete
            Route::delete('/Delete/{id}', [AdminController::class, 'destroy'])->name('destroyAdmin');
            // Reset Password
            Route::get('/Reset-Password/{id}', [AdminController::class, 'resetPassword'])->name('resetPasswordAdmin');
        });

        // Profile
        Route::group(['prefix'  => 'Profile'], function(){
            Route::get('/{id}', [UserController::class, 'index'])->name('profile');
            Route::post('/Simpan-Data/{id}', [UserController::class, 'update'])->name('updateProfile');
        });
    });

    // Admin

    Route::group(['roles' => 'Admin', 'prefix' => 'Admin'], function(){
        Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboardAdmin');

        // ATMP
        Route::group(['prefix' => 'ATMP'], function(){
            $JenisSite = DB::select("
                SELECT j.name, a.name as atmp_name
                FROM jenissites j, atmps a
                WHERE j.atmp_id = a.id
            ");
            foreach($JenisSite as $data){
                Route::get('/{'.$data->name.'}/{'.$data->atmp_name.'}', [AtmpController::class, 'index'])->name('a.'.$data->name.'');
            }

            Route::get('/Data-ATMP/Add-Data/{name}/{atmp_name}', [AtmpController::class, 'insert'])->name('a.insertATMP');
            Route::post('/Store-Data/{name}/{atmp_name}', [AtmpController::class, 'storeATMP'])->name('a.storeATMP');
            Route::get('/Data-ATMP/Detail-Data/{name}/{id}', [AtmpController::class, 'detail'])->name('a.detailATMP');
            Route::post('/Update-Data/{name}/{id}/{atmp_name}', [AtmpController::class, 'updateATMP'])->name('a.updateATMP');
            Route::get('/Delete-Data/{name}/{id}/{atmp_name}', [AtmpController::class, 'destroy'])->name('a.deleteATMP');
        });


        // Profile
        Route::group(['prefix'  => 'Profile'], function(){
            Route::get('/{id}', [UserController::class, 'index'])->name('a.profile');
            Route::post('/Simpan-Data/{id}', [UserController::class, 'update'])->name('a.updateProfile');
        });
    });
});
