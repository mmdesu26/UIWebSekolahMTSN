<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendUserController;
use App\Http\Controllers\AdminController;

// ============================================
// HALAMAN UTAMA / HOME
// ============================================
Route::get('/', [FrontendUserController::class, 'index'])->name('home');
Route::get('/beranda', [FrontendUserController::class, 'index'])->name('home');

// ============================================
// PROFIL SEKOLAH
// ============================================
Route::get('/profil-sekolah', [FrontendUserController::class, 'profilIndex'])->name('profil.index');
Route::get('/profil-sekolah/sejarah', [FrontendUserController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil-sekolah/visi-misi', [FrontendUserController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil-sekolah/struktur-organisasi', [FrontendUserController::class, 'struktur'])->name('profil.struktur');
Route::get('/profil-sekolah/guru', [FrontendUserController::class, 'guru'])->name('profil.guru');

// ROUTE FASILITAS DAN AKREDITASI (DIPINDAHKAN KE SINI - TANPA MIDDLEWARE)
Route::get('/profil-sekolah/fasilitas', function () {
    return view('user.fasilitas_sekolah');
})->name('profil.fasilitas');

Route::get('/profil-sekolah/akreditasi', function () {
    return view('user.akreditasi');
})->name('profil.akreditasi');

// ============================================
// BERITA & PENGUMUMAN
// ============================================
Route::get('/berita', [FrontendUserController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [FrontendUserController::class, 'beritaDetail'])->name('berita.detail');

// ============================================
// PPDB - PENERIMAAN PESERTA DIDIK BARU
// ============================================
Route::get('/ppdb', [FrontendUserController::class, 'ppdb'])->name('ppdb');
Route::get('/ppdb/pendaftaran', [FrontendUserController::class, 'ppdbPendaftaran'])->name('ppdb.pendaftaran');
Route::post('/ppdb/submit', [FrontendUserController::class, 'ppdbSubmit'])->name('ppdb.submit');
Route::get('/ppdb/status/{no_registrasi}', [FrontendUserController::class, 'ppdbStatus'])->name('ppdb.status');

// ============================================
// EKSTRAKURIKULER
// ============================================
Route::get('/ekstrakurikuler', [FrontendUserController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{slug}', [FrontendUserController::class, 'ekstrakurikulerDetail'])->name('ekstrakurikuler.detail');

// ============================================
// GALERI
// ============================================
Route::get('/galeri', [FrontendUserController::class, 'galeri'])->name('galeri');
Route::get('/galeri/{kategori}', [FrontendUserController::class, 'galeriKategori'])->name('galeri.kategori');

// ============================================
// KONTAK
// ============================================
Route::get('/kontak', [FrontendUserController::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim', [FrontendUserController::class, 'kontakKirim'])->name('kontak.kirim');

// ============================================
// LOGIN & LOGOUT ADMIN
// ============================================
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'doLogin'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// ============================================
// ADMIN ROUTES (DENGAN MIDDLEWARE)
// ============================================
Route::prefix('admin')->middleware('\App\Http\Middleware\AdminAuth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Master Data - Sejarah Sekolah
    Route::get('/sejarah', [AdminController::class, 'showSejarah'])->name('admin.sejarah');
    Route::post('/sejarah/update', [AdminController::class, 'updateSejarah'])->name('admin.sejarah.update');

    // Master Data - Visi & Misi
    Route::get('/visi-misi', [AdminController::class, 'showVisiMisi'])->name('admin.visi-misi');
    Route::post('/visi-misi/update', [AdminController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');

    // Master Data - Guru
    Route::get('/guru', [AdminController::class, 'manageGuru'])->name('admin.guru');
    Route::post('/guru/add', [AdminController::class, 'addGuru'])->name('admin.guru.add');
    Route::post('/guru/update/{id}', [AdminController::class, 'updateGuru'])->name('admin.guru.update');
    Route::post('/guru/delete/{id}', [AdminController::class, 'deleteGuru'])->name('admin.guru.delete');

    // Master Data - Ekstrakurikuler
    Route::get('/ekstrakurikuler', [AdminController::class, 'manageEkstrakurikuler'])->name('admin.ekstrakurikuler');
    Route::post('/ekstrakurikuler/add', [AdminController::class, 'addEkstra'])->name('admin.ekstrakurikuler.add');
    Route::post('/ekstrakurikuler/update/{id}', [AdminController::class, 'updateEkstra'])->name('admin.ekstrakurikuler.update');
    Route::post('/ekstrakurikuler/delete/{id}', [AdminController::class, 'deleteEkstra'])->name('admin.ekstrakurikuler.delete');

    // Master Data - Berita & Pengumuman
    Route::get('/berita', [AdminController::class, 'manageBerita'])->name('admin.berita');
    Route::post('/berita/add', [AdminController::class, 'addBerita'])->name('admin.berita.add');
    Route::post('/berita/update/{id}', [AdminController::class, 'updateBerita'])->name('admin.berita.update');
    Route::post('/berita/delete/{id}', [AdminController::class, 'deleteBerita'])->name('admin.berita.delete');

    // Master Data - PPDB
    Route::get('/ppdb', [AdminController::class, 'managePpdb'])->name('admin.ppdb');
    Route::post('/ppdb/update', [AdminController::class, 'updatePpdb'])->name('admin.ppdb.update');

    // Master Data - Sosial Media
    Route::get('/sosial-media', [AdminController::class, 'manageSosialMedia'])->name('admin.sosial-media');
    Route::post('/sosial-media/update', [AdminController::class, 'updateSosialMedia'])->name('admin.sosial-media.update');
Route::delete('/admin/sosial-media/{id}', 
    [AdminController::class, 'deleteSosmed']
)->name('admin.sosmed.delete');
Route::post('/admin/sosial-media/update/{id}', 
    [AdminController::class, 'updateSosmed']
)->name('admin.sosmed.update');

    // Master Data - Galeri
    Route::get('/galeri', [AdminController::class, 'manageGaleri'])->name('admin.galeri');
    Route::post('/galeri/add', [AdminController::class, 'addGaleri'])->name('admin.galeri.add');
    Route::post('/galeri/update/{id}', [AdminController::class, 'updateGaleri'])->name('admin.galeri.update');
    Route::post('/galeri/delete/{id}', [AdminController::class, 'deleteGaleri'])->name('admin.galeri.delete');
Route::post('/admin/galeri/upload', 
    [AdminController::class, 'uploadGaleri']
)->name('admin.galeri.upload');
});

    // ============================================
    // ROUTE AKADEMIK
    // ============================================
    Route::prefix('akademik')->name('akademik.')->group(function () {
        Route::get('/kurikulum', function () {
            return view('user.akademik.kurikulum');
        })->name('kurikulum');
        
        // KELAS PROGRAM - SATU HALAMAN
        Route::get('/kelas-program', function () {
            return view('user.akademik.kelas_program');
        })->name('kelas-program');
        
        Route::get('/kalender-pendidikan', function () {
            return view('user.akademik.kalender');
        })->name('kalender');
        
        Route::get('/jadwal-pelajaran', function () {
            return view('user.akademik.jadwal');
        })->name('jadwal');
    });
// ============================================
// FALLBACK ROUTE (404)
// ============================================
Route::fallback(function () {
    return view('errors.404');
});