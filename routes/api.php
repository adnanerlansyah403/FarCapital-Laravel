<?php

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\ProductController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/pengguna/list', [PenggunaController::class, 'index']);
Route::get('/pengguna/{id}/show', [PenggunaController::class, 'show']);
Route::post('/pengguna/store', [PenggunaController::class, 'store']);
Route::post('/pengguna/{id}/update', [PenggunaController::class, 'update']);
Route::post('/pengguna/{id}/delete', [PenggunaController::class, 'destroy']);

// Product
Route::get('/products/list', [ProductController::class, 'index']);
Route::get('/products/{id}/show', [ProductController::class, 'show']);
Route::post('/products/store', [ProductController::class, 'store']);
Route::post('/products/{id}/update', [ProductController::class, 'update']);
Route::post('/products/{id}/delete', [ProductController::class, 'destroy']);

// Blog
Route::get('/blogs/list', [BlogController::class, 'index']);
Route::get('/blogs/{id}/show', [BlogController::class, 'show']);
Route::post('/blogs/store', [BlogController::class, 'store']);
Route::post('/blogs/{id}/update', [BlogController::class, 'update']);
Route::post('/blogs/{id}/delete', [BlogController::class, 'destroy']);