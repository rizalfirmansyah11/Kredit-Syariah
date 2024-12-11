<?php

use App\Http\Controllers\AkadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SimulasiController;
use Illuminate\Support\Facades\Route;

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

// Redirect to login if accessing the root URL
Route::redirect('/', '/login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::POST('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::POST('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

// Group Routes for Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {
  Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');    
    Route::get('/user', [HomeController::class, 'index'])->name('index');
    Route::get('/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/store', [HomeController::class, 'store'])->name('user.store');
    
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');
});

// Group Routes for Nasabah
Route::group(['prefix' => 'nasabah', 'middleware' => ['auth', 'role:nasabah'], 'as' => 'nasabah.'], function () {
  Route::get('/dashboard', [HomeController::class, 'nasabahDashboard'])->name('dashboard');
  
  Route::get('/simulasi', [SimulasiController::class, 'simulasi'])->name('simulasi');
  Route::POST('simulasi/hasil', [SimulasiController::class, 'hitung'])->name('hasil');
  Route::post('/simulasi/hitung', [SimulasiController::class, 'hitung'])->name('simulasi.hitung');

  Route::get('/akad',[AkadController::class, 'akad'])->name('akad');
  Route::get('/akad/buat',[AkadController::class, 'buat'])->name('buatakad');



});
