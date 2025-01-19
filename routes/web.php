<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PinjamController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:1', 'verified'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin', [BukuController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/buku', [BukuController::class, 'index'])->name('admin.buku');
    Route::get('/admin/buku/create', [BukuController::class, 'create'])->name('admin.buku.create');
    Route::post('/admin/buku', [BukuController::class, 'store'])->name('admin.buku.store');
    Route::get('/admin/buku/edit/{buku}', [BukuController::class, 'edit'])->name('admin.buku.edit');
    Route::put('/admin/buku/edit/{buku}', [BukuController::class, 'update'])->name('admin.buku.update');
    Route::delete('/admin/buku/{buku}', [BukuController::class, 'destroy'])->name('admin.buku.destroy');

    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('admin.kategori');
    Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/admin/kategori/edit/{kategori}', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/admin/kategori/edit/{kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::delete('/admin/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    Route::get('/admin/pinjam', [PinjamController::class, 'adminindex'])->name('admin.pinjam.index');
    Route::get('/admin/pinjam/{pinjam}', [PinjamController::class, 'edit'])->name('admin.pinjam.edit');
    Route::get('/admin/pinjam/{pinjam}/{status}', [PinjamController::class, 'update'])->name('admin.pinjam.update');
});

Route::middleware(['auth', 'role:0', 'verified'])->group(function () {
    Route::get('/user', [BukuController::class, 'userindex'])->name('user.dashboard');
    Route::get('/user/buku', [BukuController::class, 'userall'])->name('user.buku');
    Route::get('/user/buku/{category}', [BukuController::class, 'usercategory'])->name('user.buku.category');
    Route::get('/user/bukulist/{buku}', [BukuController::class, 'show'])->name('user.buku.show');
    Route::get('/user/pinjam/', [BukuController::class, 'userpinjam'])->name('user.pinjam');
    Route::get('/user/pinjam/{buku}', [PinjamController::class, 'create'])->name('user.pinjam.create');
    Route::post('/user/pinjam', [PinjamController::class, 'store'])->name('user.pinjam.store');
    Route::get('/user/listpinjam', [PinjamController::class, 'index'])->name('user.pinjam.list');
});

require __DIR__ . '/auth.php';
