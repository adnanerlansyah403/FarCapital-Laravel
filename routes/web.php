<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;
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
    return view('frontend.pengguna.index');
})->name('index');

Route::get("/add", function() {
    return view('frontend.pengguna.add');
})->name('add');

Route::get("/detail/{id}", function($id) {
    return view('frontend.pengguna.detail', ['id' => $id]);
})->name('detail');

Route::prefix("/products")
    ->name("products.")
    ->controller(ProductController::class)
    ->group(function() {

    Route::get("/", "index")->name("index");
    Route::get("/create", "create")->name("create");
    Route::get("/{id}/show", "show")->name("show");

});

Route::prefix("/blogs")
    ->name("blogs.")
    ->controller(BlogController::class)
    ->group(function() {

    Route::get("/", "index")->name("index");
    Route::get("/create", "create")->name("create");
    Route::get("/{id}/show", "show")->name("show");

});