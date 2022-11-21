<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\KaryawanController;
use App\Http\Controllers\Api\DepartemenController;
use App\Http\Controllers\Api\JabatanController;
use App\Http\Controllers\Api\DokumenController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('karyawan', KaryawanController::class);
Route::apiResource('jabatan', JabatanController::class);

Route::get('departemen', 'App\Http\Controllers\Api\DepartemenController@index');
Route::get('departemen/{departemen}', 'App\Http\Controllers\Api\DepartemenController@show');
Route::get('departemen/{departemen}/edit', 'App\Http\Controllers\Api\DepartemenController@edit');
Route::post('departemen', 'App\Http\Controllers\Api\DepartemenController@store');
Route::patch('departemen/{departemen}', 'App\Http\Controllers\Api\DepartemenController@update');
Route::delete('departemen/{departemen}', 'App\Http\Controllers\Api\DepartemenController@destroy');

Route::get('dokumen', 'App\Http\Controllers\Api\DokumenController@index');
Route::get('dokumen/{dokumen}', 'App\Http\Controllers\Api\DokumenController@show');
Route::get('dokumen/{dokumen}/edit', 'App\Http\Controllers\Api\DokumenController@edit');
Route::post('dokumen', 'App\Http\Controllers\Api\DokumenController@store');
Route::patch('dokumen/{dokumen}', 'App\Http\Controllers\Api\DokumenController@update');
Route::delete('dokumen/{dokumen}', 'App\Http\Controllers\Api\DokumenController@destroy');

