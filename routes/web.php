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
use App\Http\Controllers\UserKelasProgramController;

// ADMIN CONTROLLERS (LENI)
use App\Http\Controllers\Admin\AdminSejarahController;
use App\Http\Controllers\Admin\AdminVisiMisiController;
use App\Http\Controllers\Admin\AdminStrukturController;
use App\Http\Controllers\Admin\AdminKurikulumController;
use App\Http\Controllers\Admin\AdminKalenderController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminJadwalController;
use App\Http\Controllers\Admin\AdminKelasProgramController;

// NEW – FASILITAS SEKOLAH
use App\Http\Controllers\Admin\AdminFasilitasController; // NEW
use App\Http\Controllers\UserFasilitasController;         // NEW

// USER / FRONTEND CONTROLLERS (LENI)
use App\Http\Controllers\Profil\UserSejarahController;
use App\Http\Controllers\Profil\UserVisiMisiController;
use App\Http\Controllers\Profil\UserStrukturController;
use App\Http\Controllers\UserKalenderController;
use App\Http\Controllers\UserGaleriController;
use App\Http\Controllers\UserJadwalController;

/*
|--------------------------------------------------------------------------
| USER / FRONTEND ROUTES (PUBLIK)
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendUserController::class, 'index'])->name('home');
Route::get('/beranda', [FrontendUserController::class, 'index'])->name('home');

/*
| PROFIL SEKOLAH
*/
Route::prefix('profil-sekolah')->group(function () {
    Route::get('/', [FrontendUserController::class, 'profilIndex'])->name('profil.index');
    Route::get('/sejarah', [UserSejarahController::class, 'index'])->name('profil.sejarah');
    Route::get('/visi-misi', [UserVisiMisiController::class, 'index'])->name('profil.visi-misi');
    Route::get('/struktur', [UserStrukturController::class, 'index'])->name('profil.struktur-organisasi');
    Route::get('/guru', fn() => redirect()->route('profil.struktur-organisasi'))->name('profil.guru');
    Route::get('/fasilitas', [UserFasilitasController::class, 'index'])->name('profil.fasilitas');
    Route::get('/akreditasi', [FrontendUserController::class, 'akreditasi'])
     ->name('profil.akreditasi');
});

/*
| BERITA
*/
Route::get('/berita', [NewsController::class, 'index'])->name('berita');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.detail');

/*
| PPDB
*/
Route::prefix('ppdb')->group(function () {
    Route::get('/', [FrontendUserController::class, 'ppdb'])->name('ppdb');
    Route::get('/pendaftaran', [FrontendUserController::class, 'ppdbPendaftaran'])->name('ppdb.pendaftaran');
    Route::post('/submit', [FrontendUserController::class, 'ppdbSubmit'])->name('ppdb.submit');
    Route::get('/status/{no_registrasi}', [FrontendUserController::class, 'ppdbStatus'])->name('ppdb.status');
});

/*
| EKSTRAKURIKULER
*/
Route::get('/ekstrakurikuler', [FrontendUserController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');

/*
| GALERI
*/
Route::get('/galeri', [UserGaleriController::class, 'index'])->name('galeri');
Route::get('/galeri/{kategori}', [UserGaleriController::class, 'kategori'])->name('galeri.kategori');

/*
| AKADEMIK – USER
*/
Route::prefix('akademik')->name('akademik.')->group(function () {
    Route::get('/kurikulum', [KurikulumController::class, 'kurikulum'])->name('kurikulum');
    Route::get('/kelas-program', [UserKelasProgramController::class, 'index'])->name('kelas-program');
    Route::get('/kalender-pendidikan', [UserKalenderController::class, 'index'])->name('kalender-pendidikan');
    Route::get('/jadwal-pelajaran', [UserJadwalController::class, 'index'])->name('jadwal');
});

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'loginSubmit'])->name('admin.login.submit');

Route::get('/dashboard', fn() => redirect()->route('admin.dashboard'))
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (PROTECTED)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware('adminauth')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // BERITA
    Route::get('/berita', [AdminController::class, 'manageBerita'])->name('berita');
    Route::post('/berita', [AdminController::class, 'addBerita'])->name('berita.store');
    Route::get('/berita/edit/{id}', [AdminController::class, 'editBerita'])->name('berita.edit');
    Route::put('/berita/{id}', [AdminController::class, 'updateBerita'])->name('berita.update');
    Route::delete('/berita/{id}', [AdminController::class, 'deleteBerita'])->name('berita.destroy');

    // EKSTRAKURIKULER
    Route::get('/ekstrakurikuler', [AdminController::class, 'manageEkstrakurikuler'])->name('ekstrakurikuler');
    Route::post('/ekstrakurikuler/add', [AdminController::class, 'addEkstra'])->name('ekstra.add');
    Route::get('/ekstrakurikuler/edit/{id}', [AdminController::class, 'editEkstra'])->name('ekstra.edit');
    Route::put('/ekstrakurikuler/update/{id}', [AdminController::class, 'updateEkstra'])->name('ekstra.update');
    Route::post('/ekstrakurikuler/delete/{id}', [AdminController::class, 'deleteEkstra'])->name('ekstra.delete');
          
    /*
    | MANAJEMEN PRESTASI (DIRA)
    */
    Route::post('/prestasi/add', [AdminController::class, 'addPrestasi'])->name('prestasi.add');
    Route::get('/prestasi/edit/{id}', [AdminController::class, 'editPrestasi'])->name('prestasi.edit');
    Route::put('/prestasi/update/{id}', [AdminController::class, 'updatePrestasi'])->name('prestasi.update');
    Route::delete('/prestasi/delete/{id}', [AdminController::class, 'deletePrestasi'])->name('prestasi.delete');
Route::get('/prestasi', [AdminController::class, 'managePrestasi'])->name('prestasi');
    // Update Akreditasi 
    Route::put('/prestasi/akreditasi', [AdminController::class, 'updateAkreditasi'])->name('akreditasi.update');;
    /*
    | SETTINGS (DIRA)
    */
    Route::get('/settings', [AdminController::class, 'manageSettings'])->name('settings');
    Route::post('/settings/update', [AdminController::class, 'updateSettings'])->name('settings.update');

    // PPDB
    Route::get('/ppdb', [AdminController::class, 'managePpdb'])->name('ppdb');
    Route::post('/ppdb/update', [AdminController::class, 'updatePpdb'])->name('ppdb.update');
    Route::post('/ppdb/delete/{id}', [AdminController::class, 'deletePpdb'])->name('ppdb.delete');

    // SEJARAH
    Route::prefix('sejarah')->name('sejarah.')->group(function () {
        Route::get('/', [AdminSejarahController::class, 'index'])->name('index');
        Route::post('/update', [AdminSejarahController::class, 'update'])->name('update');
        Route::delete('/delete-image', [AdminSejarahController::class, 'deleteImage'])->name('delete-image');
    });

    // VISI MISI
    Route::prefix('visi-misi')->name('visi-misi.')->group(function () {
        Route::get('/', [AdminVisiMisiController::class, 'index'])->name('index');
        Route::post('/update', [AdminVisiMisiController::class, 'update'])->name('update');
        Route::post('/reset', [AdminVisiMisiController::class, 'reset'])->name('reset');
    });

    // STRUKTUR & GURU
    Route::prefix('struktur')->name('struktur.')->group(function () {
        Route::get('/', [AdminStrukturController::class, 'index'])->name('index');
        Route::post('/upload', [AdminStrukturController::class, 'uploadStruktur'])->name('upload');
        Route::delete('/delete', [AdminStrukturController::class, 'deleteStruktur'])->name('delete');
        Route::post('/guru', [AdminStrukturController::class, 'storeGuru'])->name('guru.store');
        Route::get('/guru/{guru}/edit', [AdminStrukturController::class, 'editGuru'])->name('guru.edit');
        Route::put('/guru/{guru}', [AdminStrukturController::class, 'updateGuru'])->name('guru.update');
        Route::delete('/guru/{guru}', [AdminStrukturController::class, 'deleteGuru'])->name('guru.delete');
    });

    // KURIKULUM
    Route::get('/kurikulum', [AdminKurikulumController::class, 'index'])->name('kurikulum');
    Route::post('/kurikulum/update', [AdminKurikulumController::class, 'update'])->name('kurikulum.update');
    Route::delete('/kurikulum/delete', [AdminKurikulumController::class, 'delete'])->name('kurikulum.delete');

    // KALENDER PENDIDIKAN
    Route::prefix('kalender')->name('kalender.')->group(function () {
        Route::get('/', [AdminKalenderController::class, 'index'])->name('index');
        Route::get('/create', [AdminKalenderController::class, 'create'])->name('create');
        Route::post('/store', [AdminKalenderController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminKalenderController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminKalenderController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminKalenderController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle', [AdminKalenderController::class, 'toggleStatus'])->name('toggle');
    });

    // JADWAL PELAJARAN
    Route::prefix('jadwal')->name('jadwal.')->group(function () {
        Route::get('/', [AdminJadwalController::class, 'index'])->name('index');
        Route::get('/create', [AdminJadwalController::class, 'create'])->name('create');
        Route::post('/store', [AdminJadwalController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminJadwalController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminJadwalController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminJadwalController::class, 'destroy'])->name('destroy');
        Route::get('/duplicate', [AdminJadwalController::class, 'showDuplicate'])->name('duplicate.show');
        Route::post('/duplicate', [AdminJadwalController::class, 'duplicate'])->name('duplicate');
    });

    // GALERI
    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', [AdminGaleriController::class, 'index'])->name('index');
        Route::post('/add', [AdminGaleriController::class, 'store'])->name('add');
        Route::post('/upload', [AdminGaleriController::class, 'upload'])->name('upload');
        Route::post('/update/{id}', [AdminGaleriController::class, 'update'])->name('update');
        Route::post('/delete/{id}', [AdminGaleriController::class, 'destroy'])->name('delete');
    });

    // ============================
    // KELAS PROGRAM (NEW)
    // ============================
    Route::prefix('kelas-program')->name('kelas-program.')->group(function () {
        Route::get('/', [AdminKelasProgramController::class, 'index'])->name('index');
        Route::get('/create', [AdminKelasProgramController::class, 'create'])->name('create');
        Route::post('/store', [AdminKelasProgramController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminKelasProgramController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminKelasProgramController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminKelasProgramController::class, 'destroy'])->name('destroy');
    });

    // ============================
    // FASILITAS SEKOLAH (NEW)
    // ============================
    Route::prefix('fasilitas')->name('fasilitas.')->group(function () {
        Route::get('/', [AdminFasilitasController::class, 'index'])->name('index');
        Route::get('/create', [AdminFasilitasController::class, 'create'])->name('create');
        Route::post('/store', [AdminFasilitasController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [AdminFasilitasController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminFasilitasController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminFasilitasController::class, 'destroy'])->name('destroy');
        Route::patch('/{id}/toggle', [AdminFasilitasController::class, 'toggleStatus'])->name('toggle');
    });

    // LOGOUT
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/admin/login')->with('success', 'Berhasil logout.');
    })->name('logout');
});

Route::fallback(fn() => view('errors.404'));

require __DIR__ . '/auth.php';
