<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/galeri', [PageController::class, 'gallery'])->name('gallery');
Route::get('/harga', [PageController::class, 'pricing'])->name('pricing');
Route::get('/kontak', [PageController::class, 'contact'])->name('contact');
Route::post('/pesanan', [OrderController::class, 'store'])->name('orders.store');
Route::get('/ulasan', [ReviewController::class, 'index'])->name('reviews.index');
Route::post('/ulasan', [ReviewController::class, 'store'])->name('reviews.store');

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->middleware('throttle:5,1')->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('admin.auth');
Route::post('/admin', [AdminController::class, 'update'])->name('admin.update')->middleware('admin.auth');
Route::get('/admin/layanan', [AdminController::class, 'showServices'])->name('admin.services')->middleware('admin.auth');
Route::post('/admin/layanan', [AdminController::class, 'storeService'])->name('admin.services.store')->middleware('admin.auth');

Route::get('/cuci', [ServiceController::class, 'show'])->defaults('slug', 'cuci')->name('services.cuci');
Route::get('/interior', [ServiceController::class, 'show'])->defaults('slug', 'interior')->name('services.interior');
Route::get('/eksterior', [ServiceController::class, 'show'])->defaults('slug', 'eksterior')->name('services.eksterior');
Route::get('/kaca', [ServiceController::class, 'show'])->defaults('slug', 'kaca')->name('services.kaca');
Route::get('/mesin', [ServiceController::class, 'show'])->defaults('slug', 'mesin')->name('services.mesin');
Route::get('/ban', [ServiceController::class, 'show'])->defaults('slug', 'ban')->name('services.ban');

Route::fallback([PageController::class, 'notFound']);
