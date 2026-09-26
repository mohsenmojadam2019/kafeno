<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/menu', 'menu')->name('menu');
Route::view('/shipping', 'shipping')->name('shipping');
Route::view('/tax', 'tax')->name('tax');
Route::view('/gallery', 'gallery')->name('gallery');
Route::view('/events', 'events')->name('events');
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::middleware('admin.session')->group(function(){Route::get('/admin',[AdminController::class,'dashboard'])->name('admin');Route::get('/admin/menu',[AdminController::class,'menu'])->name('admin.menu');Route::get('/admin/reservations',[AdminController::class,'reservations'])->name('admin.reservations');});
