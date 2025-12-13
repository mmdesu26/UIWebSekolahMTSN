<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA / HOME
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendUserController::class, 'index'])->name('home');
Route::get('/beranda', [FrontendUserController::class, 'index'])->name('home');

// Redirect setelah login standar Laravel
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| FRONTEND USER ROUTES (Publik)
|--------------------------------------------------------------------------
*/
Route::get('/berita', [NewsController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.detail');
/*
| PPDB
|--------------------------------------------------------------------------
*/
Route::prefix('ppdb')->group(function () {
    Route::get('/', [FrontendUserController::class, 'ppdb'])->name('ppdb');
    Route::get('/pendaftaran', [FrontendUserController::class, 'ppdbPendaftaran'])->name('ppdb.pendaftaran');
    Route::post('/submit', [FrontendUserController::class, 'ppdbSubmit'])->name('ppdb.submit');
    Route::get('/status/{no_registrasi}', [FrontendUserController::class, 'ppdbStatus'])->name('ppdb.status');
});

/*
| EKSTRAKURIKULER
|--------------------------------------------------------------------------
*/
Route::get('/ekstrakurikuler', [FrontendUserController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{slug}', [FrontendUserController::class, 'ekstrakurikulerDetail'])->name('ekstrakurikuler.detail');

/*
| KONTAK
|--------------------------------------------------------------------------
*/
Route::get('/kontak', [FrontendUserController::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim', [FrontendUserController::class, 'kontakKirim'])->name('kontak.kirim');

/*
|--------------------------------------------------------------------------
| LOGIN ADMIN (Terpisah - Publik)
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (Dilindungi Middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // Login admin (duplikat di luar, tetap dipertahankan di dalam prefix sesuai kode asli)
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'loginSubmit'])->name('login.submit');

    // SEMUA ROUTE ADMIN YANG DIPROTEKSI
    Route::middleware('adminauth')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // Manajemen Berita
        // Halaman utama kelola berita
    Route::get('/berita', [AdminController::class, 'manageBerita'])
         ->name('berita');                    

    // Tambah berita
    Route::post('/berita', [AdminController::class, 'addBerita'])
         ->name('berita.store');             

    // Update berita
    Route::put('/berita/{id}', [AdminController::class, 'updateBerita'])
         ->name('berita.update');

    // Hapus berita
    Route::delete('/berita/{id}', [AdminController::class, 'deleteBerita'])
         ->name('berita.destroy');

        // Manajemen Ekstrakurikuler
        Route::get('/ekstrakurikuler', [AdminController::class, 'manageEkstrakurikuler'])->name('ekstrakurikuler');
        Route::post('/ekstrakurikuler/add', [AdminController::class, 'addEkstra'])->name('ekstra.add');
        Route::post('/ekstrakurikuler/update/{id}', [AdminController::class, 'updateEkstra'])->name('ekstra.update');
        Route::post('/ekstrakurikuler/delete/{id}', [AdminController::class, 'deleteEkstra'])->name('ekstra.delete');

        // Settings
        Route::get('/settings', [AdminController::class, 'manageSettings'])->name('settings');
        Route::post('/settings/update', [AdminController::class, 'updateSettings'])->name('settings.update');

        // Manajemen PPDB
        Route::get('/ppdb', [AdminController::class, 'managePpdb'])->name('ppdb');
        Route::post('/ppdb/update', [AdminController::class, 'updatePpdb'])->name('ppdb.update');
        Route::post('/ppdb/delete/{id}', [AdminController::class, 'deletePpdb'])->name('ppdb.delete');

        // Logout
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});

/*
|--------------------------------------------------------------------------
| FALLBACK ROUTE (404)
|--------------------------------------------------------------------------
*/
Route::fallback(fn() => view('errors.404'));

require __DIR__.'/auth.php';