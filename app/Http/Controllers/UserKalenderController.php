<?php

namespace App\Http\Controllers;

use App\Models\KalenderPendidikan;
use Illuminate\Http\Request;

class UserKalenderController extends Controller
{
    /**
     * Tampilkan halaman kalender pendidikan untuk user
     */
    public function index()
    {
        // Ambil kalender yang aktif dan urutkan berdasarkan tanggal
        $kalenderGanjil = KalenderPendidikan::where('semester', 'ganjil') // Menggunakan query langsung
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        $kalenderGenap = KalenderPendidikan::where('semester', 'genap') // Menggunakan query langsung
            ->orderBy('tanggal_mulai', 'asc')
            ->get();

        return view('user.akademik.kalender', compact('kalenderGanjil', 'kalenderGenap'));
    }
}