<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;


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



Route::get('/',[AdminController::class,'home']);

Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/Category',[HomeController::class,'view'])->name('Category');
Route::get('/Add_category',[HomeController::class,'Add_category'])->name('Add_category');
Route::get('/delete/{id}',[HomeController::class,'deletedata'])->name('delete');
Route::get('/add_product',[HomeController::class,'product'])->name('add_product');
Route::get('/store_product',[HomeController::class,'store'])->name('store_product');



