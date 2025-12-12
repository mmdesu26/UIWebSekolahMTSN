<?php

namespace App\Http\Controllers\Profil;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use App\Models\Guru;

class UserStrukturController extends Controller
{
    public function index()
    {
        // Ambil gambar struktur organisasi (hanya 1 record)
        $struktur = StrukturOrganisasi::getInstance();
        $strukturGambar = $struktur->gambar_path;

        // Ambil semua guru yang aktif
        $guru = Guru::active()->orderBy('nama', 'asc')->get();
        $jumlah_guru = $guru->count();

        return view('user.profil.struktur-organisasi', compact('strukturGambar', 'guru', 'jumlah_guru'));
    }
}