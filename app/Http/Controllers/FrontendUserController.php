<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;
use App\Models\VisiMisi;
use App\Models\Kurikulum;
use Illuminate\Support\Facades\Schema;

class FrontendUserController extends Controller
{
    protected $data = [];

    public function __construct()
    {
        // DATA VISI MISI - Fallback data
        $this->data['visi'] = "Menjadi institusi yang unggul dalam mengembangkan karakter, ilmu pengetahuan, dan iman.";

        $this->data['misi'] = [
            "Membangun budaya belajar yang mandiri dan berakhlak.",
            "Meningkatkan kualitas pembelajaran melalui inovasi kurikulum.",
            "Mengembangkan kepemimpinan, kerjasama, dan empati.",
        ];

        // DATA STRUKTUR ORGANISASI - KOSONG (Admin upload gambar)
        $this->data['struktur_organisasi_gambar'] = session('struktur_organisasi_gambar', null);

        // DATA GURU - KOSONG (Admin harus input dahulu)
        $this->data['guru'] = [];

        // DATA BERITA
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
            [
                "title" => "Libur Semester Genap",
                "content" => "Libur semester genap dilaksanakan mulai 1 Juni - 15 Juli 2024.",
                "gambar" => "https://arrahmahislamicschool.com/wp-content/uploads/2024/09/1667895469_910_580.jpg",
                "tanggal" => "2024-01-05",
                "tipe" => "pengumuman"
            ],
            [
                "title" => "Kegiatan Belajar Mengajar Tatap Muka",
                "content" => "Pembelajaran dilaksanakan dengan protokol kesehatan.",
                "gambar" => "https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800",
                "tanggal" => "2024-01-03",
                "tipe" => "berita"
            ],
            [
                "title" => "Workshop Guru: Metode Pembelajaran Inovatif",
                "content" => "Workshop untuk guru tentang metode digital & inovatif.",
                "gambar" => "https://images.unsplash.com/photo-1524178232363-1fb2b075b655?w=800",
                "tanggal" => "2023-12-28",
                "tipe" => "kegiatan"
            ],
            [
                "title" => "Peringatan Hari Guru Nasional",
                "content" => "Berbagai kegiatan apresiasi terhadap guru.",
                "gambar" => "https://www.infojambi.com/image/uploads/2025/11/hari-guru-batanghari-1.jpg",
                "tanggal" => "2023-11-25",
                "tipe" => "kegiatan"
            ],
        ];

        // PPDB Info
        $this->data['ppdb_info'] = "Pendaftaran peserta didik baru dibuka setiap awal semester.";

        // EKSTRAKURIKULER
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

        // GALERI
        $this->data['galeri'] = [
            ['id' => 1, 'judul' => 'Upacara Bendera Senin', 'gambar' => 'https://mtsn8kebumen.sch.id/wp-content/uploads/2023/07/photo_845@17-08-2022_07-31-47-1.jpg', 'tanggal' => '2024-01-15'],
            ['id' => 2, 'judul' => 'Kegiatan Ekstrakurikuler Robotik', 'gambar' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800', 'tanggal' => '2024-01-14'],
            ['id' => 3, 'judul' => 'Lomba Futsal Antar Kelas', 'gambar' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=800', 'tanggal' => '2024-01-13'],
            ['id' => 4, 'judul' => 'Kegiatan Pramuka', 'gambar' => 'https://mtssb-suryalaya.sch.id/media_library/posts/post-image-1692183026655.jpg', 'tanggal' => '2024-01-12'],
            ['id' => 5, 'judul' => 'Pembelajaran di Laboratorium', 'gambar' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=800', 'tanggal' => '2024-01-11'],
            ['id' => 6, 'judul' => 'Kegiatan Paduan Suara', 'gambar' => 'https://i.ytimg.com/vi/_Zn_WNLHds8/maxresdefault.jpg', 'tanggal' => '2024-01-10'],
            ['id' => 7, 'judul' => 'Praktek Sholat Berjamaah', 'gambar' => 'https://tse4.mm.bing.net/th/id/OIP.Zf3tvc1x0yPCfrzulK060gHaEK?rs=1&pid=ImgDetMain&o=7&rm=3', 'tanggal' => '2024-01-09'],
            ['id' => 8, 'judul' => 'Pelatihan Komputer', 'gambar' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800', 'tanggal' => '2024-01-08'],
        ];

        // SOSIAL MEDIA
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
        return view('user.profil.sejarah', [
            'title' => 'Profil Sekolah - MTsN 1 Magetan',
            'description' => 'Profil lengkap MTsN 1 Magetan',
            'data' => $this->data
        ]);
    }

    public function profil()
    {
        return view('user.profil', ['data' => $this->data]);
    }

    // ================================================
    // SEJARAH — MENGGUNAKAN DATABASE
    // ================================================
    public function sejarah()
    {
        $sejarah = Sejarah::first();

        return view('user.profil.sejarah', compact('sejarah'));
    }

    // ================================================
    // VISI & MISI — DENGAN FALLBACK JIKA TABEL BELUM ADA
    // ================================================
    public function visiMisi()
    {
        $visiMisi = [
            'visi' => 'Visi belum diatur',
            'misi' => 'Misi belum diatur',
        ];

        try {
            if (Schema::hasTable('visi_misi')) {
                $visiMisiData = VisiMisi::first();
                
                if ($visiMisiData) {
                    $visiMisi = [
                        'visi' => $visiMisiData->visi,
                        'misi' => $visiMisiData->misi,
                    ];
                }
            } else {
                $visiMisi = [
                    'visi' => 'Menjadi sekolah unggul yang menghasilkan peserta didik berkualitas, berakhlak mulia, dan berdaya saing global.',
                    'misi' => "Menyelenggarakan pendidikan berkualitas dengan standar internasional\nMembina peserta didik yang berkarakter dan berintegritas\nMengembangkan potensi peserta didik di bidang akademik dan non-akademik\nMempersiapkan peserta didik untuk melanjutkan ke jenjang pendidikan yang lebih tinggi"
                ];
            }
        } catch (\Exception $e) {
            $visiMisi = [
                'visi' => 'Menjadi sekolah unggul yang menghasilkan peserta didik berkualitas, berakhlak mulia, dan berdaya saing global.',
                'misi' => "Menyelenggarakan pendidikan berkualitas dengan standar internasional\nMembina peserta didik yang berkarakter dan berintegritas\nMengembangkan potensi peserta didik di bidang akademik dan non-akademik\nMempersiapkan peserta didik untuk melanjutkan ke jenjang pendidikan yang lebih tinggi"
            ];
        }

        return view('user.profil.visi_misi', [
            'title' => 'Visi & Misi - MTsN 1 Magetan',
            'description' => 'Visi dan misi MTsN 1 Magetan',
            'visiMisi' => $visiMisi,
            'data' => $this->data
        ]);
    }

    // =============================
    // KURIKULUM
    // =============================
    public function kurikulum()
    {
        $kurikulum = null;

        try {
            if (Schema::hasTable('kurikulum')) {
                $kurikulum = Kurikulum::first();
                
                if (!$kurikulum) {
                    $kurikulum = (object)[
                        'nama_kurikulum' => 'Kurikulum Merdeka',
                        'deskripsi_kurikulum' => 'MTsN 1 Magetan menerapkan Kurikulum Merdeka yang memberikan keleluasaan kepada satuan pendidikan dan guru untuk mengembangkan potensi serta kreatifitas peserta didik sesuai dengan kebutuhan belajar mereka.',
                        'tujuan_kurikulum' => "Mengembangkan pengetahuan, keterampilan, dan sikap peserta didik\nMenumbuhkan karakter Profil Pelajar Pancasila\nMempersiapkan siswa menghadapi tantangan abad 21\nMengintegrasikan nilai-nilai Islam dalam pembelajaran",
                        'projek_penguatan' => 'Pembelajaran berbasis projek yang dilaksanakan untuk menguatkan karakter dan kompetensi siswa melalui tema-tema yang kontekstual dan relevan dengan kehidupan sehari-hari.',
                    ];
                }
            } else {
                $kurikulum = (object)[
                    'nama_kurikulum' => 'Kurikulum Merdeka',
                    'deskripsi_kurikulum' => 'MTsN 1 Magetan menerapkan Kurikulum Merdeka yang memberikan keleluasaan kepada satuan pendidikan dan guru untuk mengembangkan potensi serta kreatifitas peserta didik sesuai dengan kebutuhan belajar mereka.',
                    'tujuan_kurikulum' => "Mengembangkan pengetahuan, keterampilan, dan sikap peserta didik\nMenumbuhkan karakter Profil Pelajar Pancasila\nMempersiapkan siswa menghadapi tantangan abad 21\nMengintegrasikan nilai-nilai Islam dalam pembelajaran",
                    'projek_penguatan' => 'Pembelajaran berbasis projek yang dilaksanakan untuk menguatkan karakter dan kompetensi siswa melalui tema-tema yang kontekstual dan relevan dengan kehidupan sehari-hari.',
                ];
            }
        } catch (\Exception $e) {
            $kurikulum = (object)[
                'nama_kurikulum' => 'Kurikulum Merdeka',
                'deskripsi_kurikulum' => 'MTsN 1 Magetan menerapkan Kurikulum Merdeka yang memberikan keleluasaan kepada satuan pendidikan dan guru untuk mengembangkan potensi serta kreatifitas peserta didik sesuai dengan kebutuhan belajar mereka.',
                'tujuan_kurikulum' => "Mengembangkan pengetahuan, keterampilan, dan sikap peserta didik\nMenumbuhkan karakter Profil Pelajar Pancasila\nMempersiapkan siswa menghadapi tantangan abad 21\nMengintegrasikan nilai-nilai Islam dalam pembelajaran",
                'projek_penguatan' => 'Pembelajaran berbasis projek yang dilaksanakan untuk menguatkan karakter dan kompetensi siswa melalui tema-tema yang kontekstual dan relevan dengan kehidupan sehari-hari.',
            ];
        }

        return view('user.akademik.kurikulum', compact('kurikulum'));
    }


    // =============================
    // STRUKTUR ORGANISASI (GAMBAR)
    // =============================
    public function struktur()
    {
        $strukturGambar = $this->data['struktur_organisasi_gambar'];
        
        return view('user.profil.struktur_organisasi.struktur', [
            'title' => 'Struktur Organisasi - MTsN 1 Magetan',
            'description' => 'Struktur organisasi sekolah',
            'data' => $this->data,
            'strukturGambar' => $strukturGambar
        ]);
    }

    public function strukturOrganisasi()
    {
        return $this->struktur();
    }

    // =============================
    // GURU
    // =============================
    public function guru()
    {
        $guru = $this->data['guru'];
        $jumlah_guru = count($guru);
        
        return view('user.profil.guru', [
            'title' => 'Data Guru - MTsN 1 Magetan',
            'data' => $this->data,
            'guru' => $guru,
            'jumlah_guru' => $jumlah_guru
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
        $galeri = $this->data['galeri'];

        return view('user.galeri', [
            'title' => 'Galeri - MTsN 1 Magetan',
            'galeri' => $galeri,
            'data' => $this->data
        ]);
    }

    public function galeriKategori($kategori)
    {
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