<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users.create', [UserController::class,'create'])->name('users.create');
Route::post('users.store', [UserController::class,'store'])->name('users.store');
Route::get('users.index', [UserController::class,'index'])->name('users.index');
Route::get('users/{id}', [UserController::class,'show'])->name('users.show');
Route::get('users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
Route::put('users/{id}/update', [UserController::class,'update'])->name('users.update');
Route::delete('users/{id}', [UserController::class,'destroy'])->name('users.destroy');
Route::get('users/{id}/send-mail', [UserController::class, 'sendMail'])->name('users.sendMail');

Route::get('products.create', [ProductController::class,'create'])->name('products.create');
Route::post('products.store', [ProductController::class,'store'])->name('products.store');
Route::get('products.index', [ProductController::class,'index'])->name('products.index');
Route::get('products/{id}', [ProductController::class,'show'])->name('products.show');
Route::get('products/{id}/edit', [ProductController::class,'edit'])->name('products.edit');
Route::put('products/{id}/update', [ProductController::class,'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class,'destroy'])->name('products.destroy');


Route::get('roles.create', [RoleController::class,'create'])->name('roles.create');
Route::post('roles.store', [RoleController::class,'store'])->name('roles.store');
Route::get('roles.index', [RoleController::class,'index'])->name('roles.index');
Route::get('roles/{id}', [RoleController::class,'show'])->name('roles.show');
Route::get('roles/{id}/edit', [RoleController::class,'edit'])->name('roles.edit');
Route::put('roles/{id}/update', [RoleController::class,'update'])->name('roles.update');
Route::delete('roles/{id}', [RoleController::class,'destroy'])->name('roles.destroy');



Route::get('bookings.create', [BookingController::class,'create'])->name('bookings.create');
Route::post('bookings.store', [BookingController::class,'store'])->name('bookings.store');
Route::get('bookings.index', [BookingController::class,'index'])->name('bookings.index');
Route::get('bookings/{id}', [BookingController::class,'show'])->name('bookings.show');
Route::get('bookings/{id}/edit', [BookingController::class,'edit'])->name('bookings.edit');
Route::put('bookings/{id}/update', [BookingController::class,'update'])->name('bookings.update');
Route::delete('bookings/{id}', [BookingController::class,'destroy'])->name('bookings.destroy');
