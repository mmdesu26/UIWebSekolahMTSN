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
        return view('user.galeri', ['data' => $this->data]);
    }

    public function galeriKategori($kategori)
    {
        return view('user.galeri', [
            'kategori' => $kategori,
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
