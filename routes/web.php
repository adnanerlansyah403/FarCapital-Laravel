<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('layouts.app');
// });

// Route::resource('products', ProductController::class);

// Route::prefix('user')->group(function () {
//     Route::get('/list', [UserController::class, 'index'])->name('user.index');
//     Route::get('/detail/{id}', [UserController::class, 'detail'])->name('user.detail');
//     Route::get('/create', [UserController::class, 'create'])->name('user.create');
//     Route::post('/store', [UserController::class,'store'])->name('user.store');
//     Route::put('/update/{id}', [UserController::class,'update'])->name('user.update');
//     Route::get('/destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');
// });

Route::get("/", function() {
    return view('frontend.index');
})->name('index');

Route::get("/add", function() {
    return view('frontend.add');
})->name('add');


Route::get("/detail/{id}", function() {
    return view('frontend.detail');
})->name('detail');