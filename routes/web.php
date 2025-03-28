<?php

use App\Http\Controllers\Admin\SimulasiAdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AkadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarginKategoriController;
use App\Http\Controllers\NasabahProductController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SimulasiAdminController as ControllersSimulasiAdminController;
use App\Http\Controllers\SimulasiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use KatalogController as GlobalKatalogController;
use App\Models\Category;
use App\Http\Controllers\Admin\ElektronikController;
use App\Http\Controllers\AkadNasabahController;
use App\Http\Controllers\PerjanjianController;

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

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::POST('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

// Register Routes

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'registerProses'])->name('register-proses');

// Logout Route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Group Routes for Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/user', [HomeController::class, 'index'])->name('index');
    Route::get('/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/store', [HomeController::class, 'store'])->name('user.store');
    
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');

    Route::get('/manajemen-margin-kategori', [MarginKategoriController::class, 'index'])->name('admin.marginKategori.index');
    Route::put('/manajemen-margin-kategori/{id}', [MarginKategoriController::class, 'update'])->name('admin.marginKategori.update');

    Route::get('/manajemen-margin-kategori/create', [MarginKategoriController::class, 'create'])->name('admin.marginKategori.create');
    Route::post('/manajemen-margin-kategori', [MarginKategoriController::class, 'store'])->name('admin.marginKategori.store');
    Route::get('/manajemen-margin-kategori/{id}/edit', [MarginKategoriController::class, 'edit'])->name('admin.marginKategori.edit');
    Route::put('/admin/marginKategori/{id}', [MarginKategoriController::class, 'update'])->name('admin.admin.marginKategori.update');
    Route::get('/admin/marginKategori/{id}/detail', [MarginKategoriController::class, 'detail'])
    ->name('admin.admin.marginKategori.detail');




    Route::delete('/admin/manajemen-margin-kategori/{id}', [MarginKategoriController::class, 'destroy'])
    ->name('admin.admin.marginKategori.destroy');


  
    Route::get('/elektronik/tambah', [ElektronikController::class, 'create'])->name('elektronik.create');
    Route::post('/elektronik/store', [ElektronikController::class, 'store'])->name('elektronik.store');
    Route::get('/elektronik/{id}/edit', [ElektronikController::class, 'edit'])->name('elektronik.edit');
    Route::put('/elektronik/{id}/update', [ElektronikController::class, 'update'])->name('elektronik.update');

    // Rute untuk menghapus produk elektronik
    Route::delete('/elektronik/{id}/delete', [ElektronikController::class, 'destroy'])->name('elektronik.destroy');





   Route::get('/admin/produk', [AdminProductController::class, 'index'])->name('admin.produk');
Route::get('/admin/produk/tambah', [AdminProductController::class, 'create'])->name('admin.produk.create'); // Halaman tambah produk
Route::post('/admin/produk/store', [AdminProductController::class, 'store'])->name('admin.produk.store');
Route::get('/admin/produk/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.produk.edit');
Route::put('/admin/produk/{id}', [AdminProductController::class, 'update'])->name('admin.produk.update');
// Route::get('/admin/produk/{id}', [AdminProductController::class, 'show'])->name('admin.produk.detail');

Route::delete('/admin/produk/{id}', [AdminProductController::class, 'destroy'])->name('admin.produk.destroy');
Route::delete('/admin/product-image/{id}', [AdminProductController::class, 'destroyImage'])
    ->name('admin.product-image.destroy');



Route::get('/admin/simulasi', [SimulasiAdminController::class, 'index'])->name('admin.simulasi');
Route::post('/admin/simulasi/hitung', [SimulasiAdminController::class, 'hitungSimulasi'])->name('admin.simulasi.hitung');
Route::post('admin/simulasi/hitung', [SimulasiController::class, 'hitung'])->name('admin.simulasi.hitung');
Route::get('/admin/get-margin', [SimulasiAdminController::class, 'getMargin'])->name('admin.getMargin');


    Route::get('/akads', [AkadController::class, 'daftarAkad'])->name('admin.akads');
    Route::post('/akads/accept/{id}', [AkadController::class, 'acceptAkad'])->name('acceptAkad');
    Route::post('/akads/reject/{id}', [AkadController::class, 'rejectAkad'])->name('rejectAkad');
    Route::get('/admin/akads/riwayat', [AkadController::class, 'riwayatAkads'])->name('admin.akads.riwayat');

    // Admin Logout Route
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('admin.logout');
});



// Group Routes for Nasabah
Route::group(['prefix' => 'nasabah', 'middleware' => ['auth', 'role:nasabah'], 'as' => 'nasabah.'], function () {
    Route::get('/dashboard', [HomeController::class, 'nasabahDashboard'])->name('dashboard');
  
    Route::get('/simulasi', [SimulasiController::class, 'simulasi'])->name('simulasi');
    Route::POST('simulasi/hasil', [SimulasiController::class, 'hitung'])->name('hasil');
    Route::post('/simulasi/hitung', [SimulasiController::class, 'hitung'])->name('simulasi.hitung');
    Route::post('/hitung-kredit', [SimulasiController::class, 'hitungKredit'])->name('hitung.kredit');

  
    Route::get('/akad', [AkadController::class, 'akad'])->name('akad');
    Route::get('/akad/buat', [AkadController::class, 'buatakad'])->name('buatakad');
    // Route::post('/akad/simpan', [AkadController::class, 'simpan'])->name('simpanakad');
    Route::get('/akad/surat/{id}', [AkadController::class, 'suratAkad'])->name('surat');
    Route::get('/akad/lihat/{id}', [AkadController::class, 'index'])->name('lihatakad');



    // Route::get('/nasabah/bikin-akad/{nama_product}/{harga_product}', [AkadNasabahController::class, 'bikinAkad'])
    // ->name('nasabah.bikinAkad');
    // Route::post('/nasabah/simpan-akad', [AkadNasabahController::class, 'simpanAkad'])
    // ->name('nasabah.simpanAkad');


    Route::get('/nasabah/perjanjian/{id}', [PerjanjianController::class, 'buatPerjanjian'])
    ->name('nasabah.perjanjian.buat');

    Route::post('/perjanjian/simpan', [AkadController::class, 'simpan'])->name('perjanjian.simpan');



    Route::get('/nasabah/produk', [NasabahProductController::class, 'index'])->name('nasabah.produk');
    Route::get('/nasabah/produk/{id}', [NasabahProductController::class, 'show'])->name('nasabah.produk.detail');
    
    Route::get('/akad/edit/{id}', [AkadController::class, 'edit'])->name('editakad');
    Route::put('/akad/update/{id}', [AkadController::class, 'update'])->name('updateakad');
    Route::delete('/akad/delete/{id}', [AkadController::class, 'destroy'])->name('deleteakad');

    Route::get('/akad/statistik', [AkadController::class, 'statistik'])->name('statistik');

    Route::get('/pembayaran', [PembayaranController::class, 'pembayaran'])->name('nasabah.pembayaran');
    Route::post('/proses-pembayaran', [PembayaranController::class, 'prosesPembayaran'])->name('nasabah.proses-pembayaran');
    Route::post('/pembayaran/hitung', [PembayaranController::class, 'hitungPembayaran'])->name('nasabah.pembayaran.hitung');


    Route::post('/kirim-akad/{id}', [AkadController::class, 'kirimAkad'])->name('kirimAkad');
    // Route::get('/katalog', [KatalogController::class, 'katalog'])->name('nasabah.katalog');


  
    // Nasabah Logout Route
    Route::post('/logout', function () {
        Auth::logout();
        return redirect()->route('login');
    })->name('nasabah.logout');

});
