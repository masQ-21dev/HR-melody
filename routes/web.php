<?php

use App\Http\Controllers\Api\karyawanApiContoller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\JobDescController;
use App\Http\Controllers\karyawan\karyawanController;
use App\Http\Controllers\karyawan\pengalamanKaryawanController;
use App\Http\Controllers\karyawan\tanggunganKaryawanController;
use App\Http\Controllers\karyawanByDepattementController;
use App\Http\Controllers\LampiranController;
use App\Http\Controllers\printController;
use App\Http\Controllers\usersController;
// use App\Http\Controllers\KaryawanController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Auth::routes();

// Route::get('/', function () {
//     return view('layout.main');
// });

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/autahenticate', 'autahenticate')->name('autahenticate');
    Route::get('/', 'home')->name('home')->middleware('auth');
    Route::get('/logout', 'logout')->name('logout')->Middleware('auth');
});

Route::resource('karyawan', karyawanController::class)->middleware('auth');
Route::resource('karyawan/{id}/pengalaman', pengalamanKaryawanController::class)->middleware('auth');
Route::resource('karyawan/{id}/tanggungan', tanggunganKaryawanController::class)->middleware('auth');
Route::resource('karyawan/{id}/job-data', JobDescController::class)->middleware('auth');
Route::resource('karyawan/{id}/lampiran', LampiranController::class)->middleware('auth');

Route::get('karyawan/{id}/print/aplication',[ printController::class, 'printAplication'] )->name('aplication')->middleware('auth');
Route::get('karyawan/{id}/print/lampiran',[ printController::class, 'printLampiran'] )->name('lampiran')->middleware('auth');



Route::resource('deparatement', DepartemenController::class)->middleware('auth');
Route::resource('user', usersController::class)->middleware('auth');


Route::get('/depatemenfilter', [karyawanByDepattementController::class, 'index'])->name('departemen.filter');
Route::post('/depatemenfilter', [karyawanByDepattementController::class, 'index'])->name('departemen.filter');


Route::get('/fake', function () {
    // now()-date('Y-m-d');
    return view('karyawan.resedu');
});


// API
Route::get('API', function () {
    return response()->json([
        "message" => "API Siapeg Gatra Mapan"
    ]);
});
Route::get('API/karyawan', [karyawanApiContoller::class, 'index']);
Route::get('API/karyawan/{id}', [karyawanApiContoller::class, 'show']);
Route::get('API/karyawan/all/phone', [karyawanApiContoller::class, 'getAllPhoneKaryawan']);
Route::get('API/karyawan/{id}/phone', [karyawanApiContoller::class, 'getPhoneKaryawan']);


