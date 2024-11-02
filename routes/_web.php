<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataAnakController;
use App\Http\Controllers\DataPushController;
use App\Http\Controllers\DataLansiaController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\DataIbuHamilController;
use App\Http\Controllers\DataPemeriksaanController;
use App\Http\Controllers\PemeriksaanPushController;
use App\Http\Controllers\PemeriksaanLansiaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RekapanPemeriksaanController;

// Route untuk menampilkan daftar pemeriksaan lansia
 


// Route untuk halaman utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Route untuk dashboard yang memerlukan autentikasi
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group route yang memerlukan autentikasi
Route::middleware('auth')->group(function () {

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk data
    Route::resource('data-anak', DataAnakController::class);
    Route::resource('data-ibu-hamil', DataIbuHamilController::class);
    Route::resource('data-push', DataPushController::class);
    Route::resource('data-lansia', DataLansiaController::class);

    // Route untuk Rekapan Pemeriksaan
    Route::get('/rekapan-pemeriksaan', [RekapanPemeriksaanController::class, 'index'])->name('rekapan-pemeriksaan.index');

    // Route untuk Pemeriksaan
    Route::get('/pemeriksaan/create/{nama}', [PemeriksaanController::class, 'create'])->name('pemeriksaan.create');
    Route::post('/pemeriksaan', [PemeriksaanController::class, 'store'])->name('pemeriksaan.store');
    Route::get('/pemeriksaan', [PemeriksaanController::class, 'index'])->name('pemeriksaan.index');
    Route::get('/pemeriksaan/{id}', [PemeriksaanController::class, 'show'])->name('pemeriksaan.show');
    Route::get('/pemeriksaan/{nama}/edit', [PemeriksaanController::class, 'edit'])->name('pemeriksaan.edit');
    Route::put('/pemeriksaan/{nama}', [PemeriksaanController::class, 'update'])->name('pemeriksaan.update');
    Route::delete('/pemeriksaan/{id}', [PemeriksaanController::class, 'destroy'])->name('pemeriksaan.destroy');
    Route::get('/data-anak/{data_anak}', [DataAnakController::class, 'show'])->name('data-anak.show');


        // Route untuk Pemeriksaan lansia
        Route::resource('pemeriksaan-lansia', PemeriksaanLansiaController::class)->except(['index', 'show']);
        Route::get('/pemeriksaan-lansia/create/{id}', [PemeriksaanLansiaController::class, 'create'])->name('pemeriksaan-lansia.create');
        Route::post('/pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'store'])->name('pemeriksaan-lansia.store');
        Route::get('/pemeriksaan-push/{id}/edit', [PemeriksaanLansiaController::class, 'edit'])->name('pemeriksaan-lansia.edit');
        Route::put('/pemeriksaan-push/{id}', [PemeriksaanLansiaController::class, 'update'])->name('pemeriksaan-lansia.update');
        Route::delete('/pemeriksaan-push/{id}', [PemeriksaanLansiaController::class, 'destroy'])->name('pemeriksaan-lansia.destroy');

    // Route untuk Data Ibu Hamil
    Route::get('/data-ibu-hamil/{nama}', [DataIbuHamilController::class, 'show'])->name('data-ibu-hamil.show');
    Route::get('/data-ibu-hamil/{nama}/edit', [DataIbuHamilController::class, 'edit'])->name('data-ibu-hamil.edit');
    

    // Route untuk Data Pemeriksaan Ibu Hamil
    Route::get('/data-pemeriksaan/create/{ibu_hamil}', [DataPemeriksaanController::class, 'create'])->name('data-pemeriksaan.create');
    Route::post('/data-pemeriksaan', [DataPemeriksaanController::class, 'store'])->name('data-pemeriksaan.store');
    Route::get('/data-pemeriksaan/{dataPemeriksaan}/edit', [DataPemeriksaanController::class, 'edit'])->name('data-pemeriksaan.edit');
    Route::put('/data-pemeriksaan/{dataPemeriksaan}', [DataPemeriksaanController::class, 'update'])->name('data-pemeriksaan.update');
    Route::delete('/data-pemeriksaan/{dataPemeriksaan}', [DataPemeriksaanController::class, 'destroy'])->name('data-pemeriksaan.destroy');

    // Route untuk Pemeriksaan PUSH
    Route::resource('pemeriksaan-push', PemeriksaanPushController::class)->except(['index', 'show']);
    Route::get('/pemeriksaan-push/create/{id}', [PemeriksaanPushController::class, 'create'])->name('pemeriksaan-push.create');
    Route::post('/pemeriksaan-push', [PemeriksaanPushController::class, 'store'])->name('pemeriksaan-push.store');
    Route::get('/pemeriksaan-push/{id}/edit', [PemeriksaanPushController::class, 'edit'])->name('pemeriksaan-push.edit');
    Route::put('/pemeriksaan-push/{id}', [PemeriksaanPushController::class, 'update'])->name('pemeriksaan-push.update');
    Route::delete('/pemeriksaan-push/{id}', [PemeriksaanPushController::class, 'destroy'])->name('pemeriksaan-push.destroy');



    // Route untuk halaman akun
    Route::get('/akun', function () {
        return view('akun'); // Sesuaikan dengan view akun Anda
    })->name('akun');
    
    // Route untuk logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';
