<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PosterController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Models\Product;
use App\Models\Poster;

Route::get('/', function () {
    $products = Product::latest()->take(8)->get();
    $posters = Poster::latest()->take(3)->get(); // Mengambil data poster murni
    
    return view('home', compact('products', 'posters'));
});

Route::get('/admin/login', [DashboardController::class, 'index'])->name('login');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('/login', [DashboardController::class, 'login'])->name('login.submit');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');

    // MANAGEMENT PRODUK
    Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
    Route::get('/produk/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/produk', [ProductController::class, 'store'])->name('products.store');
    Route::get('/produk/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produk/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // MANAGEMENT POSTER (Murni Upload Gambar)
    Route::get('/poster', [PosterController::class, 'index'])->name('posters.index');
    Route::post('/poster', [PosterController::class, 'store'])->name('posters.store');
    Route::put('/poster/{poster}', [PosterController::class, 'update'])->name('posters.update');     // 🔑 Rute BARU untuk Edit Gambar
    Route::delete('/poster/{poster}', [PosterController::class, 'destroy'])->name('posters.destroy'); // 🔑 Rute BARU untuk Hapus Poster
});

// ROUTE MEMBACA GAMBAR PRODUK
Route::get('/baca-komponen/produk/{filename}', function ($filename) {
    $path = 'public/products/' . $filename;
    if (!Storage::exists($path)) abort(404);
    
    $file = Storage::get($path);
    $type = Storage::mimeType($path);
    return Response::make($file, 200)->header("Content-Type", $type);
})->name('baca.gambar');

// ROUTE MEMBACA GAMBAR POSTER (DI LUAR PREFIX ADMIN)
Route::get('/baca-komponen/poster/{filename}', function ($filename) {
    $path = 'public/posters/' . $filename;
    if (!Storage::exists($path)) abort(404);

    $file = Storage::get($path);
    $type = Storage::mimeType($path);
    return Response::make($file, 200)->header("Content-Type", $type);
})->name('baca.gambar.poster');