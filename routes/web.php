<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\AtmpController;
use App\Http\Controllers\Backend\DashboardController;
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

            Route::get('/Tambah-Data/{name}', [AtmpController::class, 'insert'])->name('insertPlant');
            Route::post('/Store-Data-Plant/{name}', [AtmpController::class, 'storePlant'])->name('storePlant');
            Route::get('/Detail-Data/{name}/{id}', [AtmpController::class, 'detail'])->name('detailPlant');
            Route::post('/Update-Data/{name}/{id}', [AtmpController::class, 'updatePlant'])->name('updatePlant');
            Route::get('/Delete-Data/{name}/{id}', [AtmpController::class, 'destroy'])->name('deletePlant');
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

            Route::get('/Tambah-Data/{name}', [AtmpController::class, 'insert'])->name('a.insertPlant');
            Route::post('/Store-Data-Plant/{name}', [AtmpController::class, 'storePlant'])->name('a.storePlant');
            Route::get('/Detail-Data/{name}/{id}', [AtmpController::class, 'detail'])->name('a.detailPlant');
            Route::post('/Update-Data/{name}/{id}', [AtmpController::class, 'updatePlant'])->name('a.updatePlant');
            Route::get('/Delete-Data/{name}/{id}', [AtmpController::class, 'destroy'])->name('a.deletePlant');
        });
    });
});
