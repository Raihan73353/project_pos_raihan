<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerControler;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard',[
        "title"=>"Dashboard"
    ]);
})->Middleware('auth');

Route::resource('kategori',CategoryController::class)->except('show','destroy','create')->middleware('auth');

route::resource('pelanggan',CustomerControler::class)->except('destroy')->middleware('auth');

Route::resource('produk', ProductController::class)->middleware('auth');


Route::resource('pengguna',UserController::class)->except('destroy','create','show','update','edit')->middleware('auth');

Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('logout',[LoginController::class,'logout'])->middleware('auth');
