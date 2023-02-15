<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('pegawai', [PegawaiController::class, 'index']);
Route::post('pegawai/store', [PegawaiController::class, 'store']);
Route::get('pegawai/show/{id}', [PegawaiController::class, 'show']);
Route::post('pegawai/update/{id}', [PegawaiController::class, 'update']);
Route::get('pegawai/destroy/{id}', [PegawaiController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});



