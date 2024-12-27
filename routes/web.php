<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileController;
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

Route::get('/home', function () {
    return Inertia::render('Home');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::get('/admin', [OperatorController::class, 'dashboard']) -> name('admin');
Route::get('/admin/dashboard', [OperatorController::class, 'dashboard']) -> name('admin.dashboard');
Route::get('/admin/datapenduduk', [OperatorController::class, 'datapenduduk']) -> name('datapenduduk');
Route::get('/admin/formadd', [OperatorController::class, 'create']) -> name('formadd');
Route::get('/admin/formadd/create', [OperatorController::class, 'create']) -> name('formadd.create');
Route::post('/admin/formadd', [OperatorController::class, 'store'])->name('formadd.store');
Route::get('/admin/formedit', [OperatorController::class, 'editdata']) -> name('formedit');
Route::get('/admin/validasidata', [OperatorController::class, 'validasidata']) -> name('validasidata');
Route::get('/admin/artikel', [OperatorController::class, 'artikel']) -> name('artikel');
Route::get('/admin/profile', [OperatorController::class, 'profile']) -> name('profile');
Route::get('/admin/setting', [OperatorController::class, 'pengaturan']) -> name('pengaturan');
Route::get('/admin/detailpenduduk', [OperatorController::class, 'detailpenduduk']) -> name('detailpenduduk');


require __DIR__.'/auth.php';
