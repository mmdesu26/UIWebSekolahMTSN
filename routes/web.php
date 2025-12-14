<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CONTROLLERS
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\FrontendUserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\AdminController;

// ADMIN CONTROLLERS (LENI)
use App\Http\Controllers\Admin\AdminSejarahController;
use App\Http\Controllers\Admin\AdminVisiMisiController;
use App\Http\Controllers\Admin\AdminStrukturController;
use App\Http\Controllers\Admin\AdminKurikulumController;
use App\Http\Controllers\Admin\AdminKalenderController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminJadwalController;

// USER / FRONTEND CONTROLLERS (LENI)
use App\Http\Controllers\Profil\UserSejarahController;
use App\Http\Controllers\Profil\UserVisiMisiController;
use App\Http\Controllers\Profil\UserStrukturController;
use App\Http\Controllers\UserKalenderController;
use App\Http\Controllers\UserGaleriController;
use App\Http\Controllers\UserJadwalController;

/*
|--------------------------------------------------------------------------
| ========================================================================
| USER / FRONTEND ROUTES (PUBLIK)
| ========================================================================
|--------------------------------------------------------------------------
*/

/*
| HOME
*/
Route::get('/', [FrontendUserController::class, 'index'])->name('home');
Route::get('/beranda', [FrontendUserController::class, 'index'])->name('home');

/*
| PROFIL SEKOLAH (LENI)
*/
Route::prefix('profil-sekolah')->group(function () {
    Route::get('/', [FrontendUserController::class, 'profilIndex'])->name('profil.index');
    Route::get('/sejarah', [UserSejarahController::class, 'index'])->name('profil.sejarah');
    Route::get('/visi-misi', [UserVisiMisiController::class, 'index'])->name('profil.visi-misi');
    Route::get('/struktur', [UserStrukturController::class, 'index'])->name('profil.struktur-organisasi');
    Route::get('/guru', fn() => redirect()->route('profil.struktur-organisasi'))->name('profil.guru');
    Route::get('/fasilitas', fn() => view('user.profil.fasilitas_sekolah'))->name('profil.fasilitas');
    Route::get('/akreditasi', fn() => view('user.profil.akreditasi'))->name('profil.akreditasi');
});

/*
| BERITA (DIRA - DIPAKAI KARENA SUDAH ADA)
*/
Route::get('/berita', [NewsController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.detail');

/*
| PPDB (DIRA - DIPAKAI KARENA SUDAH ADA)
*/
Route::prefix('ppdb')->group(function () {
    Route::get('/', [FrontendUserController::class, 'ppdb'])->name('ppdb');
    Route::get('/pendaftaran', [FrontendUserController::class, 'ppdbPendaftaran'])->name('ppdb.pendaftaran');
    Route::post('/submit', [FrontendUserController::class, 'ppdbSubmit'])->name('ppdb.submit');
    Route::get('/status/{no_registrasi}', [FrontendUserController::class, 'ppdbStatus'])->name('ppdb.status');
});

/*
| EKSTRAKURIKULER (DIRA - DIPAKAI KARENA SUDAH ADA)
*/
Route::get('/ekstrakurikuler', [FrontendUserController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');

/*
| GALERI – USER (LENI - BARU DITAMBAHKAN)
*/
Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/{kategori}', [UserGaleriController::class, 'kategori'])->name('galeri.kategori');

/*
| AKADEMIK – USER (LENI - BARU DITAMBAHKAN)
*/
Route::prefix('akademik')->name('akademik.')->group(function () {
    Route::get('/kurikulum', [KurikulumController::class, 'kurikulum'])->name('kurikulum');
    Route::get('/kelas-program', fn() => view('user.akademik.kelas_program'))->name('kelas-program');
    Route::get('/kalender-pendidikan', [UserKalenderController::class, 'index'])->name('kalender-pendidikan');
    Route::get('/jadwal-pelajaran', [UserJadwalController::class, 'index'])->name('jadwal');
});

/*
|--------------------------------------------------------------------------
| ========================================================================
| ADMIN AUTH (PUBLIK)
| ========================================================================
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');

/*
| REDIRECT DASHBOARD DEFAULT (UNTUK USER BIASA YANG LOGIN)
*/
Route::get('/dashboard', fn() => redirect()->route('admin.dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| ========================================================================
| ADMIN ROUTES (PROTECTED DENGAN MIDDLEWARE adminauth)
| ========================================================================
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('adminauth')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    /*
    | MANAJEMEN BERITA (DIRA)
    */
    Route::get('/berita', [AdminController::class, 'manageBerita'])->name('berita');
    Route::post('/berita', [AdminController::class, 'addBerita'])->name('berita.store');
    Route::get('/berita/edit/{id}', [AdminController::class, 'editBerita'])->name('berita.edit');
    Route::put('/berita/{id}', [AdminController::class, 'updateBerita'])->name('berita.update');
    Route::delete('/berita/{id}', [AdminController::class, 'deleteBerita'])->name('berita.destroy');

    /*
    | MANAJEMEN EKSTRAKURIKULER (DIRA)
    */
    Route::get('/ekstrakurikuler', [AdminController::class, 'manageEkstrakurikuler'])->name('ekstrakurikuler');
    Route::post('/ekstrakurikuler/add', [AdminController::class, 'addEkstra'])->name('ekstra.add');
    Route::get('/ekstrakurikuler/edit/{id}', [AdminController::class, 'editEkstra'])->name('ekstra.edit');
    Route::put('/ekstrakurikuler/update/{id}', [AdminController::class, 'updateEkstra'])->name('ekstra.update');
    Route::post('/ekstrakurikuler/delete/{id}', [AdminController::class, 'deleteEkstra'])->name('ekstra.delete');
          
    /*
    | MANAJEMEN PRESTASI (DIRA)
    */
    Route::get('/prestasi', [AdminController::class, 'managePrestasi'])->name('prestasi');
    Route::post('/prestasi/add', [AdminController::class, 'addPrestasi'])->name('prestasi.add');
    Route::get('/prestasi/edit/{id}', [AdminController::class, 'editPrestasi'])->name('prestasi.edit');
    Route::put('/prestasi/update/{id}', [AdminController::class, 'updatePrestasi'])->name('prestasi.update');
    Route::post('/prestasi/delete/{id}', [AdminController::class, 'deletePrestasi'])->name('prestasi.delete');

    /*
    | SETTINGS (DIRA)
    */
    Route::get('/settings', [AdminController::class, 'manageSettings'])->name('settings');
    Route::post('/settings/update', [AdminController::class, 'updateSettings'])->name('settings.update');

    /*
    | MANAJEMEN PPDB (DIRA)
    */
    Route::get('/ppdb', [AdminController::class, 'managePpdb'])->name('ppdb');
    Route::post('/ppdb/update', [AdminController::class, 'updatePpdb'])->name('ppdb.update');
    Route::post('/ppdb/delete/{id}', [AdminController::class, 'deletePpdb'])->name('ppdb.delete');

    /*
    | SEJARAH (LENI)
    */
    Route::prefix('sejarah')->name('sejarah.')->group(function () {
        Route::get('/', [AdminSejarahController::class, 'index'])->name('index');
        Route::post('/update', [AdminSejarahController::class, 'update'])->name('update');
        Route::delete('/delete-image', [AdminSejarahController::class, 'deleteImage'])->name('delete-image');
    });

    /*
    | VISI MISI (LENI)
    */
    Route::prefix('visi-misi')->name('visi-misi.')->group(function () {
        Route::get('/', [AdminVisiMisiController::class, 'index'])->name('index');
        Route::post('/update', [AdminVisiMisiController::class, 'update'])->name('update');
        Route::post('/reset', [AdminVisiMisiController::class, 'reset'])->name('reset');
    });

    /*
    | ========================================================================
    | STRUKTUR & GURU (LENI) - UPDATED WITH EDIT PAGE
    | ========================================================================
    */
    Route::prefix('struktur')->name('struktur.')->group(function () {
        // Halaman Utama
        Route::get('/', [AdminStrukturController::class, 'index'])->name('index');
        
        // Upload & Delete Gambar Struktur Organisasi
        Route::post('/upload', [AdminStrukturController::class, 'uploadStruktur'])->name('upload');
        Route::delete('/delete', [AdminStrukturController::class, 'deleteStruktur'])->name('delete');

        // CRUD Guru
        Route::post('/guru', [AdminStrukturController::class, 'storeGuru'])->name('guru.store');
        Route::get('/guru/{guru}/edit', [AdminStrukturController::class, 'editGuru'])->name('guru.edit');
        Route::put('/guru/{guru}', [AdminStrukturController::class, 'updateGuru'])->name('guru.update');
        Route::delete('/guru/{guru}', [AdminStrukturController::class, 'deleteGuru'])->name('guru.delete');
    });

    /*
    | KURIKULUM (LENI)
    */
    Route::get('/kurikulum', [AdminKurikulumController::class, 'index'])->name('kurikulum');
    Route::post('/kurikulum/update', [AdminKurikulumController::class, 'update'])->name('kurikulum.update');
    Route::delete('/kurikulum/delete', [AdminKurikulumController::class, 'delete'])->name('kurikulum.delete');

    /*
    | ========================================================================
    | KALENDER PENDIDIKAN (LENI) - UPDATED WITH SEPARATE CREATE & EDIT PAGES
    | ========================================================================
    */
    Route::prefix('kalender')->name('kalender.')->group(function () {
        // Halaman Utama (List Kalender)
        Route::get('/', [AdminKalenderController::class, 'index'])->name('index');
        
        // Tambah Kalender (Halaman Terpisah)
        Route::get('/create', [AdminKalenderController::class, 'create'])->name('create');
        Route::post('/store', [AdminKalenderController::class, 'store'])->name('store');
        
        // Edit Kalender (Halaman Terpisah)
        Route::get('/{id}/edit', [AdminKalenderController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminKalenderController::class, 'update'])->name('update');
        
        // Hapus Kalender
        Route::delete('/{id}', [AdminKalenderController::class, 'destroy'])->name('destroy');
        
        // Toggle Status
        Route::patch('/{id}/toggle', [AdminKalenderController::class, 'toggleStatus'])->name('toggle');
    });

    /*
    | ========================================================================
    | JADWAL PELAJARAN (LENI) - UPDATED WITH EDIT PAGE & DUPLICATE PAGE
    | ========================================================================
    */
    Route::prefix('jadwal')->name('jadwal.')->group(function () {
        // Halaman Utama (List Jadwal)
        Route::get('/', [AdminJadwalController::class, 'index'])->name('index');
        
        // Tambah Jadwal (Halaman Terpisah)
        Route::get('/create', [AdminJadwalController::class, 'create'])->name('create');
        Route::post('/store', [AdminJadwalController::class, 'store'])->name('store');
        
        // Edit Jadwal (Halaman Terpisah)
        Route::get('/{id}/edit', [AdminJadwalController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminJadwalController::class, 'update'])->name('update');
        
        // Hapus Jadwal
        Route::delete('/{id}', [AdminJadwalController::class, 'destroy'])->name('destroy');
        
        // Duplikat Jadwal (Halaman Terpisah)
        Route::get('/duplicate', [AdminJadwalController::class, 'showDuplicate'])->name('duplicate.show');
        Route::post('/duplicate', [AdminJadwalController::class, 'duplicate'])->name('duplicate');
    });

    /*
    | GALERI (LENI)
    */
    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', [AdminGaleriController::class, 'index'])->name('index');
        Route::post('/add', [AdminGaleriController::class, 'store'])->name('add');
        Route::post('/upload', [AdminGaleriController::class, 'upload'])->name('upload');
        Route::post('/update/{id}', [AdminGaleriController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [AdminGaleriController::class, 'destroy'])->name('delete');
    });

    /*
    | LOGOUT (DIRA - DIPINDAH KE DALAM GROUP BIAR TERPROTEKSI)
    */
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin/login')->with('success', 'Berhasil logout.');
    })->name('logout');
});

/*
|--------------------------------------------------------------------------
| FALLBACK 404
|--------------------------------------------------------------------------
*/
Route::fallback(fn() => view('errors.404'));

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LARAVEL BREEZE/JETSTREAM DLL)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';