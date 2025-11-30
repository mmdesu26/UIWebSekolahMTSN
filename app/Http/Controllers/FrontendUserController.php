<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendUserController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        // Data statis (dummy)
        $this->data['sejarah'] = "MTsN 1 Magetan memiliki sejarah panjang sebagai lembaga pendidikan islam terpadu...";
        $this->data['visi'] = "Menjadi institusi yang unggul dalam mengembangkan karakter, ilmu pengetahuan, dan iman.";
        $this->data['misi'] = [
            "Membangun budaya belajar yang mandiri dan berakhlak.",
            "Meningkatkan kualitas pembelajaran melalui inovasi kurikulum.",
            "Mengembangkan kepemimpinan, kerjasama, dan empati.",
        ];
        $this->data['struktur'] = "Kepala Sekolah -> Wakil Kepala -> Kepala Bidang -> Staf Pengajar.";
        $this->data['struktur_organisasi'] = $this->data['struktur'];

        $this->data['berita'] = [
            ["title" => "Sekolah mengikuti lomba sains", "content" => "MTsN 1 Magetan meraih juara 2..."],
            ["title" => "PPDB 2025 terbuka", "content" => "Pendaftaran dibuka mulai tanggal..."],
        ];

        $this->data['ppdb_info'] = "Pendaftaran peserta didik baru dibuka setiap awal semester. Persyaratan:...";

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

        // DATA GALERI
        $this->data['galeri'] = [
            ['id' => 1, 'judul' => 'Upacara Bendera Senin', 'gambar' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800', 'tanggal' => '2024-01-15'],
            ['id' => 2, 'judul' => 'Kegiatan Ekstrakurikuler Robotik', 'gambar' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800', 'tanggal' => '2024-01-14'],
            ['id' => 3, 'judul' => 'Lomba Futsal Antar Kelas', 'gambar' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=800', 'tanggal' => '2024-01-13'],
            ['id' => 4, 'judul' => 'Kegiatan Pramuka', 'gambar' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800', 'tanggal' => '2024-01-12'],
            ['id' => 5, 'judul' => 'Pembelajaran di Laboratorium', 'gambar' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=800', 'tanggal' => '2024-01-11'],
            ['id' => 6, 'judul' => 'Kegiatan Paduan Suara', 'gambar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800', 'tanggal' => '2024-01-10'],
            ['id' => 7, 'judul' => 'Praktek Sholat Berjamaah', 'gambar' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800', 'tanggal' => '2024-01-09'],
            ['id' => 8, 'judul' => 'Pelatihan Komputer', 'gambar' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800', 'tanggal' => '2024-01-08'],
        ];

        $this->data['sosial'] = [
            ["name" => "Instagram", "link" => "https://instagram.com/mtsn1magetan"],
            ["name" => "Facebook", "link" => "https://facebook.com/mtsn1magetan"],
        ];
    }

    // =============================
    // HALAMAN UTAMA
    // =============================
    public function index()
    {
        return view('home', [
            'title' => 'Beranda - MTsN 1 Magetan',
            'description' => 'Madrasah Tsanawiyah Negeri 1 Magetan',
            'data' => $this->data
        ]);
    }

    public function home()
    {
        return view('user.home', ['data' => $this->data]);
    }

    // =============================
    // PROFIL
    // =============================
    public function profilIndex()
    {
        return view('user.sejarah', [
            'title' => 'Profil Sekolah - MTsN 1 Magetan',
            'description' => 'Profil lengkap MTsN 1 Magetan',
            'data' => $this->data
        ]);
    }

    public function profil()
    {
        return view('user.profil', ['data' => $this->data]);
    }

    public function sejarah()
    {
        return view('user.sejarah', [
            'title' => 'Sejarah Sekolah - MTsN 1 Magetan',
            'description' => 'Perjalanan sejarah MTsN 1 Magetan',
            'data' => $this->data
        ]);
    }

    public function visiMisi()
    {
        return view('user.visi_misi', [
            'title' => 'Visi & Misi - MTsN 1 Magetan',
            'description' => 'Visi dan misi MTsN 1 Magetan',
            'data' => $this->data
        ]);
    }

    public function struktur()
    {
        return view('user.struktur', [
            'title' => 'Struktur Organisasi - MTsN 1 Magetan',
            'description' => 'Struktur organisasi sekolah',
            'data' => $this->data
        ]);
    }

    public function strukturOrganisasi()
    {
        return view('user.struktur', ['data' => $this->data]);
    }

    public function guru()
    {
        return view('user.profil-guru', [
            'title' => 'Data Guru - MTsN 1 Magetan',
            'data' => $this->data
        ]);
    }

    public function fasilitas()
    {
        return view('user.profil-fasilitas', [
            'title' => 'Fasilitas MTsN 1 Magetan',
            'data' => $this->data
        ]);
    }

    // =============================
    // BERITA
    // =============================
    public function berita()
    {
        return view('user.berita', [
            'title' => 'Berita & Pengumuman',
            'data' => $this->data
        ]);
    }

    public function beritaDetail($slug)
    {
        return view('user.berita-detail', [
            'title' => 'Detail Berita',
            'slug' => $slug,
            'data' => $this->data
        ]);
    }

    // =============================
    // PPDB
    // =============================
    public function ppdb()
    {
        return view('user.ppdb', [
            'title' => 'PPDB',
            'data' => $this->data
        ]);
    }

    public function ppdbPendaftaran()
    {
        return view('user.ppdb-pendaftaran');
    }

    public function ppdbSubmit(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telepon' => 'required|numeric',
            'tanggal_lahir' => 'required|date',
            'nama_sekolah_asal' => 'required|string',
            'rata_rata_rapor' => 'required|numeric',
        ]);

        $no_registrasi = 'REG-' . date('YmdHis') . rand(100, 999);

        session([
            'ppdb_data' => $validated,
            'no_registrasi' => $no_registrasi
        ]);

        return redirect()->route('ppdb.status', ['no_registrasi' => $no_registrasi])
            ->with('success', 'Pendaftaran berhasil! No Registrasi: ' . $no_registrasi);
    }

    public function ppdbStatus($no_registrasi)
    {
        return view('user.ppdb-status', [
            'no_registrasi' => $no_registrasi,
            'data' => $this->data
        ]);
    }

    // =============================
    // EKSTRAKURIKULER
    // =============================
    public function ekstrakurikuler()
    {
        return view('user.ekstrakurikuler', ['data' => $this->data]);
    }

    public function ekstrakurikulerDetail($slug)
    {
        $item = collect($this->data['ekstrakurikuler'])->firstWhere('name', $slug);

        return view('user.ekstrakurikuler-detail', [
            'item' => $item,
            'data' => $this->data
        ]);
    }

    public function detailEkstrakurikuler($ekstra)
    {
        $item = collect($this->data['ekstrakurikuler'])->firstWhere('name', $ekstra);
        return view('user.ekstrakurikuler_detail', ['data' => $this->data, 'item' => $item]);
    }

    // =============================
    // GALERI
    // =============================
    public function galeri()
    {
        // Ambil data galeri dari property $data
        $galeri = $this->data['galeri'];

        return view('user.galeri', [
            'title' => 'Galeri - MTsN 1 Magetan',
            'galeri' => $galeri,
            'data' => $this->data
        ]);
    }

    public function galeriKategori($kategori)
    {
        // Filter galeri berdasarkan kategori (jika diperlukan di masa depan)
        $galeri = $this->data['galeri'];

        return view('user.galeri', [
            'title' => 'Galeri ' . ucfirst($kategori) . ' - MTsN 1 Magetan',
            'kategori' => $kategori,
            'galeri' => $galeri,
            'data' => $this->data
        ]);
    }

    // =============================
    // KONTAK
    // =============================
    public function kontak()
    {
        return view('user.kontak', ['data' => $this->data]);
    }

    public function kontakKirim(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'subjek' => 'required',
            'pesan' => 'required|min:10',
        ]);

        return back()->with('success', 'Pesan berhasil dikirim.');
    }
}