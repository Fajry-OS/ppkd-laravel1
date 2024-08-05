<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('latihan', [CountController::class, 'index']);

Route::get('penjumlahan', [CountController::class, 'jumlah'])->name('penjumlahan');

Route::get('pengurangan', [CountController::class, 'kurang'])->name('pengurangan');

Route::get('perkalian', [CountController::class, 'kali'])->name('perkalian');

Route::get('pembagian', [CountController::class, 'bagi'])->name('pembagian');

Route::post('storejumlah', [CountController::class, 'storejumlah'])->name('store_penjumlahan');

Route::post('storekurang', [CountController::class, 'storekurang'])->name('store_pengurangan');

Route::post('storekali', [CountController::class, 'storekali'])->name('store_perkalian');

Route::post('storebagi', [CountController::class, 'storebagi'])->name('store_pembagian');

Route::get('/dashboard', function () {
    if (Auth::user()->id_level === 1) {
        return view('admin.dashboard');
    } elseif (Auth::user()->id_level === 2) {
        return view('user.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);

Route::get('user/dashboard', [HomeController::class, 'indexUser'])->middleware(['auth', 'user']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
