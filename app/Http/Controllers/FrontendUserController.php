<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Ekstrakurikuler;
use App\Models\SiteSetting;
use App\Models\Ppdb;

class FrontendUserController extends Controller
{
    // ====================================================================
    // HALAMAN UTAMA (HOME / BERANDA)
    // ====================================================================
    public function index()
    {
        // Ambil 6 berita terbaru untuk ditampilkan di homepage
        $beritaTerbaru = News::latest()->take(6)->get();

        // Ambil semua pengaturan situs dari database
        $settings = SiteSetting::pluck('value', 'key');

        return view('home', compact('beritaTerbaru', 'settings'));
    }

    // ====================================================================
    // EKSTRAKURIKULER - DAFTAR SEMUA
    // ====================================================================
    public function ekstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();

        return view('user.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    // ====================================================================
    // EKSTRAKURIKULER - DETAIL BERDASARKAN SLUG
    // ====================================================================
    public function ekstrakurikulerDetail($slug)
    {
        $ekstra = Ekstrakurikuler::where('slug', $slug)->firstOrFail();

        return view('user.ekstrakurikuler-detail', compact('ekstra'));
    }

    // ====================================================================
    // HALAMAN PPDB (PENERIMAAN PESERTA DIDIK BARU)
    // ====================================================================
    public function ppdb()
    {
        $ppdb = Ppdb::first(); // Ambil data PPDB (single record)

        return view('user.ppdb', compact('ppdb'));
    }
}