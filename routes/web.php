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
Route::get('/formadd', [OperatorController::class, 'create']) -> name('formadd');
Route::get('/formadd/create', [OperatorController::class, 'create']) -> name('formadd.create');
Route::post('/formadd', [OperatorController::class, 'store'])->name('formadd.store');
Route::get('/formedit', [OperatorController::class, 'editdata']) -> name('formedit');
Route::get('/validasidata', [OperatorController::class, 'validasidata']) -> name('validasidata');
Route::get('/artikel', [OperatorController::class, 'artikel']) -> name('artikel');
Route::get('/profile', [OperatorController::class, 'profile']) -> name('profile');
Route::get('/setting', [OperatorController::class, 'pengaturan']) -> name('pengaturan');
Route::get('/detailpenduduk', [OperatorController::class, 'detailpenduduk']) -> name('detailpenduduk');
Route::get('/datapenduduk', [OperatorController::class, 'search'])->name('datapenduduk');
Route::patch('/validasidata/{user_id}/validate', [OperatorController::class, 'validate'])->name('validate');

});


require __DIR__.'/auth.php';
