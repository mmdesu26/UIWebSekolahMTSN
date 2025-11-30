<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendUserController;
use App\Http\Controllers\AdminController;

// ============================================
// HALAMAN UTAMA / HOME
// ============================================
Route::get('/', [FrontendUserController::class, 'index'])->name('welcome');
Route::get('/beranda', [FrontendUserController::class, 'index'])->name('home');
// ============================================
// PROFIL SEKOLAH
// ============================================
Route::get('/profil-sekolah', [FrontendUserController::class, 'profilIndex'])->name('profil.index');
Route::get('/profil-sekolah/sejarah', [FrontendUserController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil-sekolah/visi-misi', [FrontendUserController::class, 'visiMisi'])->name('profil.visi-misi');
Route::get('/profil-sekolah/struktur-organisasi', [FrontendUserController::class, 'struktur'])->name('profil.struktur');
Route::get('/profil-sekolah/guru', [FrontendUserController::class, 'guru'])->name('profil.guru');
Route::get('/profil-sekolah/fasilitas', [FrontendUserController::class, 'fasilitas'])->name('profil.fasilitas');

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
// FALLBACK ROUTE
// ============================================
Route::fallback(function () {
    return view('errors.404');
});

// Login routes (tanpa middleware)
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'doLogin'])->name('admin.login.submit'); // ← TAMBAHKAN INI
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin routes dengan middleware AdminAuth (tanpa Kernel)
Route::prefix('admin')->middleware('\App\Http\Middleware\AdminAuth')->group(function () {
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
});