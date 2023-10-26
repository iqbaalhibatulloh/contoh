<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CollectionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

/**
 * NIM: 6706220110
 * NAMA: Iqbaal Hibatulloh
 * KELAS: 46-04
 */

// User
Route::get('/user', [UserController::class, 'index'])->name('user.daftarPengguna')->middleware(['auth', 'verified']);
Route::get('/userRegistration', [UserController::class, 'create'])->name('user.registrasi');
Route::post('/userStore', [UserController::class, 'store'])->name('user.store');
Route::get('/userView/{user}', [UserController::class, 'show'])->name('user.infoPengguna');

Route::get('/userView/{user}', [UserController::class, 'show'])->name("user.infoPengguna");
Route::get('/editUser/{user}', [UserController::class, 'edit'])->name('user.editUser');

// koleksi
Route::get('/koleksi', [CollectionController::class, 'index'])->name('koleksi.daftarKoleksi');
Route::get('/koleksiTambah', [CollectionController::class, 'create'])->name('koleksi.registrasi');
Route::post('/koleksiStore', [CollectionController::class, 'store'])->name('koleksi.store');
Route::get('/koleksiView/{collection}', [CollectionController::class, 'show'])->name('koleksi.infoKoleksi');

Route::post('/updatekoleksi/{collection}', [CollectionController::class, 'update'])->name('koleksi.updateKoleksi');
Route::get('/editkoleksi/{collection}', [CollectionController::class, 'edit'])->name('koleksi.editKoleksi');
