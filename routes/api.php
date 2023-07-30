<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\karyawanApiContoller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});


