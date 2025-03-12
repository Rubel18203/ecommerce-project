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
Route::post('/store_product', [HomeController::class, 'store'])->name('store_product');
Route::get('/show_product', [HomeController::class, 'show_product'])->name('show_product');
Route::get('/delete_product/{id}', [HomeController::class, 'delete'])->name('/delete_product/{id}');
Route::get('/Edit_product/{id}', [HomeController::class, 'Edit'])->name('/Edit_product/{id}');
Route::get('/update_product/{id}', [HomeController::class, 'update'])->name('/update_product/{id}');
Route::get('/product_details/{id}', [AdminController::class, 'product_details'])->name('/product_details/{id}');
Route::post('/Add_cart/{id}', [AdminController::class, 'Add_cart'])->name('/Add_cart/{id}');
Route::get('/cart_show', [AdminController::class, 'cart_show'])->name('/cart_show');
Route::get('/remove_cart', [AdminController::class, 'remove'])->name('/remove_cart');
