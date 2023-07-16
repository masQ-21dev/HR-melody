<?php

use App\Http\Controllers\Auth\LoginController;
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
    Route::get('/logout', 'logout')->Middleware('auth');
});

// Route::resource('login', LoginController::class);

// Route::get('/login', function () {
//     return view('Auth.login');
// });

