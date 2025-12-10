<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendUserController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA / HOME
|--------------------------------------------------------------------------
*/
Route::get('/', [FrontendUserController::class, 'index'])->name('home');
Route::get('/beranda', [FrontendUserController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| PROFIL SEKOLAH
|--------------------------------------------------------------------------
*/
Route::prefix('profil-sekolah')->group(function () {

    Route::get('/', [FrontendUserController::class, 'profilIndex'])->name('profil.index');
    Route::get('/sejarah', [FrontendUserController::class, 'sejarah'])->name('profil.sejarah');
    Route::get('/visi-misi', [FrontendUserController::class, 'visiMisi'])->name('profil.visi-misi');
    Route::get('/struktur-organisasi', [FrontendUserController::class, 'struktur'])->name('profil.struktur');
    Route::get('/guru', [FrontendUserController::class, 'guru'])->name('profil.guru');

    // Fasilitas & Akreditasi
    Route::get('/fasilitas', fn() => view('user.profil.fasilitas_sekolah'))->name('profil.fasilitas');
    Route::get('/akreditasi', fn() => view('user.profil.akreditasi'))->name('profil.akreditasi');
});


/*
|--------------------------------------------------------------------------
| BERITA & PENGUMUMAN
|--------------------------------------------------------------------------
*/
Route::get('/berita', [FrontendUserController::class, 'berita'])->name('berita');
Route::get('/berita/{slug}', [FrontendUserController::class, 'beritaDetail'])->name('berita.detail');


/*
|--------------------------------------------------------------------------
| PPDB - PENERIMAAN PESERTA DIDIK BARU
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
Route::get('/ekstrakurikuler', [FrontendUserController::class, 'ekstrakurikuler'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{slug}', [FrontendUserController::class, 'ekstrakurikulerDetail'])->name('ekstrakurikuler.detail');


/*
|--------------------------------------------------------------------------
| GALERI
|--------------------------------------------------------------------------
*/
Route::get('/galeri', [FrontendUserController::class, 'galeri'])->name('galeri');
Route::get('/galeri/{kategori}', [FrontendUserController::class, 'galeriKategori'])->name('galeri.kategori');


/*
|--------------------------------------------------------------------------
| KONTAK
|--------------------------------------------------------------------------
*/
Route::get('/kontak', [FrontendUserController::class, 'kontak'])->name('kontak');
Route::post('/kontak/kirim', [FrontendUserController::class, 'kontakKirim'])->name('kontak.kirim');


/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'doLogin'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES (DILINDUNGI MIDDLEWARE)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | SEJARAH
    |--------------------------------------------------------------------------
    */
    Route::get('/sejarah', [AdminController::class, 'showSejarah'])->name('admin.sejarah');
    Route::post('/sejarah/update', [AdminController::class, 'updateSejarah'])->name('admin.sejarah.update');
    Route::delete('/sejarah/delete-image', [AdminController::class, 'deleteGambarSejarah'])->name('admin.sejarah.delete-image');

    /*
    |--------------------------------------------------------------------------
    | VISI & MISI
    |--------------------------------------------------------------------------
    */
    Route::get('/visi-misi', [AdminController::class, 'showVisiMisi'])->name('admin.visi-misi');
    Route::post('/visi-misi/update', [AdminController::class, 'updateVisiMisi'])->name('admin.visi-misi.update');

    /*
    |--------------------------------------------------------------------------
    | STRUKTUR ORGANISASI (UPLOAD GAMBAR)
    |--------------------------------------------------------------------------
    */
    Route::get('/struktur-organisasi', [AdminController::class, 'manageStrukturOrganisasi'])->name('admin.struktur-organisasi');
    Route::post('/struktur-organisasi/upload', [AdminController::class, 'uploadStrukturOrganisasi'])->name('admin.struktur.upload');
    Route::delete('/struktur-organisasi/delete', [AdminController::class, 'deleteStrukturOrganisasi'])->name('admin.struktur.delete');

    /*
    |--------------------------------------------------------------------------
    | GURU
    |--------------------------------------------------------------------------
    */
    Route::get('/guru', [AdminController::class, 'manageGuru'])->name('admin.guru');
    Route::post('/guru/add', [AdminController::class, 'addGuru'])->name('admin.guru.add');
    Route::post('/guru/update/{id}', [AdminController::class, 'updateGuru'])->name('admin.guru.update');
    Route::post('/guru/delete/{id}', [AdminController::class, 'deleteGuru'])->name('admin.guru.delete');

    /*
    |--------------------------------------------------------------------------
    | EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */
    Route::get('/ekstrakurikuler', [AdminController::class, 'manageEkstrakurikuler'])->name('admin.ekstrakurikuler');
    Route::post('/ekstrakurikuler/add', [AdminController::class, 'addEkstra'])->name('admin.ekstrakurikuler.add');
    Route::post('/ekstrakurikuler/update/{id}', [AdminController::class, 'updateEkstra'])->name('admin.ekstrakurikuler.update');
    Route::post('/ekstrakurikuler/delete/{id}', [AdminController::class, 'deleteEkstra'])->name('admin.ekstrakurikuler.delete');

    /*
    |--------------------------------------------------------------------------
    | BERITA
    |--------------------------------------------------------------------------
    */
    Route::get('/berita', [AdminController::class, 'manageBerita'])->name('admin.berita');
    Route::post('/berita/add', [AdminController::class, 'addBerita'])->name('admin.berita.add');
    Route::post('/berita/update/{id}', [AdminController::class, 'updateBerita'])->name('admin.berita.update');
    Route::post('/berita/delete/{id}', [AdminController::class, 'deleteBerita'])->name('admin.berita.delete');

    /*
    |--------------------------------------------------------------------------
    | PPDB
    |--------------------------------------------------------------------------
    */
    Route::get('/ppdb', [AdminController::class, 'managePpdb'])->name('admin.ppdb');
    Route::post('/ppdb/update', [AdminController::class, 'updatePpdb'])->name('admin.ppdb.update');

    /*
    |--------------------------------------------------------------------------
    | SOSIAL MEDIA
    |--------------------------------------------------------------------------
    */
    Route::get('/sosial-media', [AdminController::class, 'manageSosialMedia'])->name('admin.sosial-media');
    Route::post('/sosial-media/update', [AdminController::class, 'updateSosialMedia'])->name('admin.sosial-media.update');

    Route::delete('/sosial-media/{id}', [AdminController::class, 'deleteSosmed'])->name('admin.sosmed.delete');
    Route::post('/sosial-media/update/{id}', [AdminController::class, 'updateSosmed'])->name('admin.sosmed.update');

    /*
    |--------------------------------------------------------------------------
    | GALERI
    |--------------------------------------------------------------------------
    */
    Route::get('/galeri', [AdminController::class, 'manageGaleri'])->name('admin.galeri');
    Route::post('/galeri/add', [AdminController::class, 'addGaleri'])->name('admin.galeri.add');
    Route::post('/galeri/update/{id}', [AdminController::class, 'updateGaleri'])->name('admin.galeri.update');
    Route::post('/galeri/delete/{id}', [AdminController::class, 'deleteGaleri'])->name('admin.galeri.delete');
    Route::post('/galeri/upload', [AdminController::class, 'uploadGaleri'])->name('admin.galeri.upload');

});


/*
|--------------------------------------------------------------------------
| AKADEMIK
|--------------------------------------------------------------------------
*/
Route::prefix('akademik')->name('akademik.')->group(function () {

    Route::get('/kurikulum', fn() => view('user.akademik.kurikulum'))->name('kurikulum');
    Route::get('/kelas-program', fn() => view('user.akademik.kelas_program'))->name('kelas-program');
    Route::get('/kalender-pendidikan', fn() => view('user.akademik.kalender'))->name('kalender');
    Route::get('/jadwal-pelajaran', fn() => view('user.akademik.jadwal'))->name('jadwal');

});


/*
|--------------------------------------------------------------------------
| FALLBACK ROUTE (404)
|--------------------------------------------------------------------------
*/
Route::fallback(fn() => view('errors.404'));