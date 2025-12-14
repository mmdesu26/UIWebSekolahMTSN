<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| =========================
| KODE DIRA - USE STATEMENT
| =========================
|--------------------------------------------------------------------------
*/
use App\Models\News;
use App\Models\Ekstrakurikuler;
use App\Models\SiteSetting;
use App\Models\Ppdb;

/*
|--------------------------------------------------------------------------
| =========================
| KODE LENI - USE STATEMENT
| =========================
|--------------------------------------------------------------------------
*/
use App\Models\Sejarah;
use App\Models\VisiMisi;
use App\Models\Kurikulum;
use Illuminate\Support\Facades\Schema;

class FrontendUserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | =========================
    | KODE LENI - PROPERTY
    | =========================
    |--------------------------------------------------------------------------
    */
    protected $data = [];

    /*
    |--------------------------------------------------------------------------
    | =========================
    | KODE LENI - CONSTRUCTOR
    | =========================
    |--------------------------------------------------------------------------
    */
    public function __construct()
    {
        $this->data['visi'] = "Menjadi institusi yang unggul dalam mengembangkan karakter, ilmu pengetahuan, dan iman.";

        $this->data['misi'] = [
            "Membangun budaya belajar yang mandiri dan berakhlak.",
            "Meningkatkan kualitas pembelajaran melalui inovasi kurikulum.",
            "Mengembangkan kepemimpinan, kerjasama, dan empati.",
        ];

        $this->data['struktur_organisasi_gambar'] = session('struktur_organisasi_gambar', null);
        $this->data['guru'] = [];

        $this->data['berita'] = [
            [
                "title" => "Pengumuman PPDB Tahun 2024",
                "content" => "Pendaftaran PPDB MTsN 1 Magetan tahun ajaran 2024/2025 telah dibuka.",
                "gambar" => "https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800",
                "tanggal" => "2024-01-15",
                "tipe" => "pengumuman"
            ],
            [
                "title" => "Prestasi Terbaru: Tim Robotik Raih Juara 2 Nasional",
                "content" => "Tim robotik MTsN 1 Magetan berhasil meraih juara 2 dalam kompetisi robotik nasional.",
                "gambar" => "https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800",
                "tanggal" => "2024-01-10",
                "tipe" => "berita"
            ],
        ];

        $this->data['ppdb_info'] = "Pendaftaran peserta didik baru dibuka setiap awal semester.";

        $this->data['ekstrakurikuler'] = [
            [
                "name" => "Az-Zuhra Futsal",
                "jadwal" => "Senin & Rabu Pukul 15:00",
                "pembina" => "Iwan Setiawan",
                "prestasi" => "Juara 1 lomba antar sekolah"
            ],
            [
                "name" => "Paskibraka",
                "jadwal" => "Selasa 16:00",
                "pembina" => "Dewi Lestari",
                "prestasi" => "Juara harapan 2"
            ],
        ];

        $this->data['galeri'] = [
            ['id' => 1, 'judul' => 'Upacara Bendera', 'gambar' => 'https://mtsn8kebumen.sch.id/wp-content/uploads/2023/07/photo_845@17-08-2022_07-31-47-1.jpg', 'tanggal' => '2024-01-15'],
            ['id' => 2, 'judul' => 'Robotik', 'gambar' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800', 'tanggal' => '2024-01-14'],
        ];

        $this->data['sosial'] = [
            ["name" => "Instagram", "link" => "https://instagram.com/mtsn1magetan"],
            ["name" => "Facebook", "link" => "https://facebook.com/mtsn1magetan"],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | =========================
    | KODE DIRA - HOME / INDEX
    | =========================
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $beritaTerbaru = News::latest()->take(6)->get();
        $settings = SiteSetting::pluck('value', 'key');

        return view('home', compact('beritaTerbaru', 'settings'));
    }

    /*
    |--------------------------------------------------------------------------
    | =========================
    | KODE LENI - HOME
    | =========================
    |--------------------------------------------------------------------------
    */
    public function home()
    {
        return view('user.home', ['data' => $this->data]);
    }

    /*
    |--------------------------------------------------------------------------
    | =========================
    | KODE LENI - PROFIL
    | =========================
    |--------------------------------------------------------------------------
    */
    public function profilIndex()
    {
        return view('user.profil.sejarah', ['data' => $this->data]);
    }

    public function profil()
    {
        return view('user.profil', ['data' => $this->data]);
    }

    public function sejarah()
    {
        $sejarah = Sejarah::first();
        return view('user.profil.sejarah', compact('sejarah'));
    }

    public function visiMisi()
    {
        $visiMisi = ['visi' => $this->data['visi'], 'misi' => $this->data['misi']];
        return view('user.profil.visi_misi', compact('visiMisi'));
    }

    public function kurikulum()
    {
        $kurikulum = Kurikulum::first();
        return view('user.akademik.kurikulum', compact('kurikulum'));
    }

    /*
    |--------------------------------------------------------------------------
    | =========================
    | KODE DIRA - EKSTRAKURIKULER
    | =========================
    |--------------------------------------------------------------------------
    */
    public function ekstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('user.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    public function ekstrakurikulerDetail($slug)
    {
        $ekstra = Ekstrakurikuler::where('slug', $slug)->firstOrFail();
        return view('user.ekstrakurikuler-detail', compact('ekstra'));
    }

    /*
    |--------------------------------------------------------------------------
    | =========================
    | KODE DIRA - PPDB (DATABASE)
    | =========================
    |--------------------------------------------------------------------------
    */
    public function ppdb()
    {
        $ppdb = Ppdb::first();
        return view('user.ppdb', compact('ppdb'));
    }

    /*
    |--------------------------------------------------------------------------
    | =========================
    | KODE LENI - GALERI
    | =========================
    |--------------------------------------------------------------------------
    */
    public function galeri()
    {
        return view('user.galeri', ['galeri' => $this->data['galeri'], 'data' => $this->data]);
    }
}