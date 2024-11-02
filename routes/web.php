<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    DataAnakController,
    DataPushController,
    DataLansiaController,
    PemeriksaanController,
    DataIbuHamilController,
    DataPemeriksaanController,
    PemeriksaanPushController,
    PemeriksaanLansiaController,
    Auth\AuthenticatedSessionController,
    RekapanPemeriksaanController
};
use App\Http\Controllers\RekapPemeriksaanController;
use App\Http\Controllers\RekapDataPemeriksaanController;

Route::get('/rekap-data-pemeriksaan', [RekapDataPemeriksaanController::class, 'index'])->name('rekap-data-pemeriksaan');

Route::get('/rekap-pemeriksaan', [RekapPemeriksaanController::class, 'index'])->name('rekap-pemeriksaan.index');


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
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

    // Route untuk data
    Route::resource('data-anak', DataAnakController::class);
    Route::resource('data-ibu-hamil', DataIbuHamilController::class);
    Route::resource('data-push', DataPushController::class);
    Route::resource('data-lansia', DataLansiaController::class);

    // Route untuk Rekapan Pemeriksaan
    Route::get('/rekapan-pemeriksaan', [RekapanPemeriksaanController::class, 'index'])->name('rekapan-pemeriksaan.index');
    
    
    // Route untuk Pemeriksaan
    Route::prefix('pemeriksaan')->name('pemeriksaan.')->group(function () {
        Route::get('/create/{nama}', [PemeriksaanController::class, 'create'])->name('create');
        Route::post('/', [PemeriksaanController::class, 'store'])->name('store');
        Route::get('/', [PemeriksaanController::class, 'index'])->name('index');
        Route::get('/{id}', [PemeriksaanController::class, 'show'])->name('show');
        Route::get('/{nama}/edit', [PemeriksaanController::class, 'edit'])->name('edit');
        Route::put('/{nama}', [PemeriksaanController::class, 'update'])->name('update');
        Route::delete('/{id}', [PemeriksaanController::class, 'destroy'])->name('destroy');
    });

    // Route untuk detail Data Anak
    Route::get('data-anak/{nama}', [DataAnakController::class, 'show'])->name('data-anak.show');
    
    // Route untuk rekap Data Anak
    Route::get('/data-anak/rekap', [DataAnakController::class, 'rekap'])->name('data-anak.rekap');
    
    // Route untuk Pemeriksaan Lansia
    Route::resource('pemeriksaan-lansia', PemeriksaanLansiaController::class)->except(['index', 'show']);
    Route::get('/pemeriksaan-lansia/create/{id}', [PemeriksaanLansiaController::class, 'create'])->name('pemeriksaan-lansia.create');
    
    Route::get('rekap-data-pemeriksaan-lansia', [PemeriksaanLansiaController::class, 'rekap'])->name('rekap-data-pemeriksaan-lansia');
    
    // Route untuk Data Ibu Hamil
    Route::prefix('data-ibu-hamil')->name('data-ibu-hamil.')->group(function () {
        Route::get('/{nama}', [DataIbuHamilController::class, 'show'])->name('show');
        Route::get('/{nama}/edit', [DataIbuHamilController::class, 'edit'])->name('edit');
    });

    // Route untuk Data Pemeriksaan Ibu Hamil
    Route::prefix('data-pemeriksaan')->name('data-pemeriksaan.')->group(function () {
        Route::get('/create/{ibu_hamil}', [DataPemeriksaanController::class, 'create'])->name('create');
        Route::post('/', [DataPemeriksaanController::class, 'store'])->name('store');
        Route::get('{dataPemeriksaan}/edit', [DataPemeriksaanController::class, 'edit'])->name('edit');
        Route::put('{dataPemeriksaan}', [DataPemeriksaanController::class, 'update'])->name('update');
        Route::delete('{dataPemeriksaan}', [DataPemeriksaanController::class, 'destroy'])->name('destroy');
    });

    // Route untuk Pemeriksaan PUSH
    Route::resource('pemeriksaan-push', PemeriksaanPushController::class)->except(['index', 'show']);
    Route::prefix('pemeriksaan-push')->name('pemeriksaan-push.')->group(function () {
        Route::get('/create/{id}', [PemeriksaanPushController::class, 'create'])->name('create');
        Route::post('/', [PemeriksaanPushController::class, 'store'])->name('store');
        Route::get('{id}/edit', [PemeriksaanPushController::class, 'edit'])->name('edit');
        Route::put('{id}', [PemeriksaanPushController::class, 'update'])->name('update');
        Route::delete('{id}', [PemeriksaanPushController::class, 'destroy'])->name('destroy');
    });

    // Route untuk halaman akun
    Route::get('/akun', function () {
        return view('akun'); // Sesuaikan dengan view akun Anda
    })->name('akun');

    // Route untuk logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

require __DIR__.'/auth.php';
