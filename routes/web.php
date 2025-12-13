<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| ========================================================================
| KODE DIRA - HALAMAN UTAMA / HOME
| ========================================================================
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendUserController::class, 'index'])->name('home');
Route::get('/beranda', [FrontendUserController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| KODE DIRA - REDIRECT DASHBOARD (DEFAULT LARAVEL)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| ========================================================================
| KODE DIRA - FRONTEND USER ROUTES (PUBLIK)
| ========================================================================
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| BERITA
|--------------------------------------------------------------------------
*/
Route::get('/berita', [NewsController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.detail');


/*
|--------------------------------------------------------------------------
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
|--------------------------------------------------------------------------
| EKSTRAKURIKULER
|--------------------------------------------------------------------------
*/
Route::get('/ekstrakurikuler', [FrontendUserController::class, 'ekstrakurikuler'])
    ->name('ekstrakurikuler');

Route::get('/ekstrakurikuler/{slug}', [FrontendUserController::class, 'ekstrakurikulerDetail'])
    ->name('ekstrakurikuler.detail');


/*
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
*/
Route::get('/kontak', [FrontendUserController::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim', [FrontendUserController::class, 'kontakKirim'])->name('kontak.kirim');


/*
|--------------------------------------------------------------------------
| ========================================================================
| KODE LENI - LOGIN ADMIN (PUBLIK / TERPISAH)
| ========================================================================
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| ========================================================================
| KODE DIRA + LENI (HASIL MERGE)
| ADMIN ROUTES (DILINDUNGI MIDDLEWARE)
| ========================================================================
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LOGIN ADMIN (DUPLIKAT DIPERTAHANKAN SESUAI KODE ASLI)
    |--------------------------------------------------------------------------
    */
    Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminController::class, 'loginSubmit'])->name('login.submit');


    /*
    |--------------------------------------------------------------------------
    | SEMUA ROUTE ADMIN TERPROTEKSI
    |--------------------------------------------------------------------------
    */
    Route::middleware('adminauth')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | MANAJEMEN BERITA
        |--------------------------------------------------------------------------
        */
        Route::get('/berita', [AdminController::class, 'manageBerita'])
            ->name('berita');

        Route::post('/berita', [AdminController::class, 'addBerita'])
            ->name('berita.store');

        Route::put('/berita/{id}', [AdminController::class, 'updateBerita'])
            ->name('berita.update');

        Route::delete('/berita/{id}', [AdminController::class, 'deleteBerita'])
            ->name('berita.destroy');


        /*
        |--------------------------------------------------------------------------
        | MANAJEMEN EKSTRAKURIKULER
        |--------------------------------------------------------------------------
        */
        Route::get('/ekstrakurikuler', [AdminController::class, 'manageEkstrakurikuler'])
            ->name('ekstrakurikuler');

        Route::post('/ekstrakurikuler/add', [AdminController::class, 'addEkstra'])
            ->name('ekstra.add');

        Route::post('/ekstrakurikuler/update/{id}', [AdminController::class, 'updateEkstra'])
            ->name('ekstra.update');

        Route::post('/ekstrakurikuler/delete/{id}', [AdminController::class, 'deleteEkstra'])
            ->name('ekstra.delete');


        /*
        |--------------------------------------------------------------------------
        | SETTINGS
        |--------------------------------------------------------------------------
        */
        Route::get('/settings', [AdminController::class, 'manageSettings'])
            ->name('settings');

        Route::post('/settings/update', [AdminController::class, 'updateSettings'])
            ->name('settings.update');


        /*
        |--------------------------------------------------------------------------
        | MANAJEMEN PPDB
        |--------------------------------------------------------------------------
        */
        Route::get('/ppdb', [AdminController::class, 'managePpdb'])
            ->name('ppdb');

        Route::post('/ppdb/update', [AdminController::class, 'updatePpdb'])
            ->name('ppdb.update');

        Route::post('/ppdb/delete/{id}', [AdminController::class, 'deletePpdb'])
            ->name('ppdb.delete');


        /*
        |--------------------------------------------------------------------------
        | LOGOUT ADMIN
        |--------------------------------------------------------------------------
        */
        Route::post('/logout', [AdminController::class, 'logout'])
            ->name('logout');
    });
});


/*
|--------------------------------------------------------------------------
| ========================================================================
| FALLBACK ROUTE (404)
| ========================================================================
|--------------------------------------------------------------------------
*/
Route::fallback(fn () => view('errors.404'));

require __DIR__ . '/auth.php';
