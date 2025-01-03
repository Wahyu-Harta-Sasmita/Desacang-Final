<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/home', [UserController::class, 'index'])->name('index');
Route::get('/article', [UserController::class, 'article']);
Route::get('/article/{id}', [UserController::class, 'articleDetail']);
Route::get('/notifikasi', [UserController::class, 'notifikasi']);
Route::get('/profiles', [UserController::class, 'profiles'])->name('profiles');
Route::get('/user/formadd', [UserController::class, 'create']) -> name('useradd.create');
Route::post('/user/formadd', [UserController::class, 'store'])->name('useradd.store');



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// USER
Route::middleware('guest')->group(function () {

});

// ADMIN
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin', [OperatorController::class, 'dashboard']) -> name('admin');
Route::get('/', [OperatorController::class, 'dashboard']) -> name('admin.dashboard');
Route::get('/datapenduduk', [OperatorController::class, 'datapenduduk']) -> name('datapenduduk');
Route::delete('/datapenduduk/{id}', [OperatorController::class, 'destroy'])->name('datapenduduk.destroy');
Route::get('/datapenduduk/{id}/edit', [OperatorController::class, 'edit'])->name('datapenduduk.edit');
Route::put('/datapenduduk/{id}', [OperatorController::class, 'update'])->name('datapenduduk.update');
Route::get('/formadd', [OperatorController::class, 'create']) -> name('formadd');
Route::get('/formadd/create', [OperatorController::class, 'create']) -> name('formadd.create');
Route::post('/formadd', [OperatorController::class, 'store'])->name('formadd.store');
Route::get('/validasidata', [OperatorController::class, 'validasidata']) -> name('validasidata');
Route::get('/profile', [OperatorController::class, 'profile']) -> name('profile');
Route::get('/setting', [OperatorController::class, 'pengaturan']) -> name('pengaturan');
Route::get('/detailpenduduk/{id}', [OperatorController::class, 'detailpenduduk'])->name('detailpenduduk');
Route::get('/datapenduduk', [OperatorController::class, 'search'])->name('datapenduduk');
Route::patch('/validasidata/{user_id}/validate', [OperatorController::class, 'validate'])->name('validate');
Route::get('/addartikel', [OperatorController::class, 'addartikel'])->name('addartikel');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('admin.artikel');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.add');
Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.delete');
});


require __DIR__.'/auth.php';
