<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\karyawan\karyawanController;
use App\Http\Controllers\karyawan\pengalamanKaryawanController;
use App\Http\Controllers\karyawan\tanggunganKaryawanController;
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

Route::get('/', function () {
    return view('layout.main');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/autahenticate', 'autahenticate')->name('autahenticate');
    Route::get('/home', 'home')->name('home')->middleware('auth');
    Route::get('/logout', 'logout')->name('logout')->Middleware('auth');
});

Route::resource('karyawan', karyawanController::class)->middleware('auth');
Route::resource('karyawan/{id}/pengalaman', pengalamanKaryawanController::class)->middleware('auth');
Route::resource('karyawan/{id}/tanggungan', tanggunganKaryawanController::class)->middleware('auth');

// Route::resource('karyawan', KaryawanController::class)->middleware('auth');
// Route::controller(KaryawanController::class)->group(function() {
//     Route::get('karyawan/{id}/tanggungan/{id1}','showTanggungan')->name('showtanggungan');
// });

// Route::resource('login', LoginController::class);

// Route::get('/login', function () {
//     return view('Auth.login');
// });

