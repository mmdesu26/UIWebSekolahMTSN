<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    protected $adminUser = [
        'username' => 'admin',
        'password' => 'secret'
    ];

    // ============ DATA SEJARAH SEKOLAH ============
    protected $sejarah = [
        'content' => 'MTsN 1 Magetan didirikan pada tahun 1975 sebagai salah satu lembaga pendidikan menengah pertama di Kabupaten Magetan. Sekolah ini telah berkembang menjadi salah satu sekolah terkemuka di daerah ini dengan fasilitas modern dan tenaga pengajar yang berpengalaman.'
    ];

    // ============ DATA VISI & MISI ============
    protected $visiMisi = [
        'visi' => 'Menjadi sekolah unggul yang menghasilkan peserta didik berkualitas, berakhlak mulia, dan berdaya saing global.',
        'misi' => 'Menyelenggarakan pendidikan berkualitas dengan standar internasional; Membina peserta didik yang berkarakter dan berintegritas; Mengembangkan potensi peserta didik di bidang akademik dan non-akademik; Mempersiapkan peserta didik untuk melanjutkan ke jenjang pendidikan yang lebih tinggi.'
    ];

    // ============ DATA GURU ============
    protected $guru = [
        ['id' => 1, 'nama' => 'Budi Santoso', 'mata_pelajaran' => 'Matematika', 'nip' => '1975010110000001'],
        ['id' => 2, 'nama' => 'Rina Winarni', 'mata_pelajaran' => 'Bahasa Indonesia', 'nip' => '1978050220000002'],
        ['id' => 3, 'nama' => 'Ahmad Wijaya', 'mata_pelajaran' => 'Bahasa Inggris', 'nip' => '1980030305000003'],
        ['id' => 4, 'nama' => 'Siti Nurhaliza', 'mata_pelajaran' => 'IPA', 'nip' => '1982070415000004'],
    ];

    // ============ DATA EKSTRAKURIKULER ============
    protected $ekstrakurikuler = [
        ['id' => 1, 'name' => 'Az-Zuhra Futsal', 'jadwal' => 'Senin & Rabu, 15:30-17:00', 'pembina' => 'Iwan Setyawan', 'prestasi' => 'Juara 1 Turnamen Futsal Antar Sekolah 2023'],
        ['id' => 2, 'name' => 'Paskibraka', 'jadwal' => 'Selasa, 15:30-17:00', 'pembina' => 'Dewi Lestari', 'prestasi' => 'Juara Harapan 2 Paskibraka Se-Magetan 2023'],
        ['id' => 3, 'name' => 'Paduan Suara', 'jadwal' => 'Kamis, 15:30-17:00', 'pembina' => 'Hendra Gunawan', 'prestasi' => 'Juara 1 Festival Paduan Suara 2023'],
        ['id' => 4, 'name' => 'Robotik', 'jadwal' => 'Jumat, 15:30-17:30', 'pembina' => 'Tri Handoko', 'prestasi' => 'Juara 2 Kompetisi Robotik Nasional 2023'],
    ];

    // ============ DATA BERITA & PENGUMUMAN ============
    protected $berita = [
        ['id' => 1, 'judul' => 'Pengumuman PPDB Tahun 2024', 'konten' => 'Pendaftaran PPDB MTsN 1 Magetan tahun ajaran 2024/2025 telah dibuka. Silakan kunjungi halaman PPDB untuk informasi lebih lanjut.', 'tanggal' => '2024-01-15', 'tipe' => 'pengumuman', 'gambar' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800'],
        ['id' => 2, 'judul' => 'Prestasi Terbaru: Tim Robotik Raih Juara 2 Nasional', 'konten' => 'Tim robotik MTsN 1 Magetan berhasil meraih juara 2 dalam kompetisi robotik nasional yang diselenggarakan di Jakarta.', 'tanggal' => '2024-01-10', 'tipe' => 'berita', 'gambar' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800'],
        ['id' => 3, 'judul' => 'Libur Semester Genap', 'konten' => 'Libur semester genap tahun ajaran 2023/2024 akan dimulai tanggal 1 Juni 2024 sampai dengan 15 Juli 2024.', 'tanggal' => '2024-01-05', 'tipe' => 'pengumuman', 'gambar' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800'],
    ];

    // ============ DATA PPDB ============
    protected $ppdb = [
        'judul' => 'Penerimaan Peserta Didik Baru MTsN 1 Magetan 2024/2025',
        'dibuka' => '1 Januari 2024',
        'ditutup' => '28 Februari 2024',
        'kuota' => '120 siswa',
        'persyaratan' => 'Lulus SD/MI dengan nilai rata-rata minimal 7.0; Lulus UN/UAMBN; Fotokopi rapor semester 1-5; Akte kelahiran; Kartu keluarga; Fotokopi KTP orang tua',
        'konten' => 'PPDB MTsN 1 Magetan dibuka untuk menerima peserta didik baru. Pendaftaran dilakukan secara online melalui website sekolah. Calon peserta didik harus memenuhi persyaratan yang telah ditentukan.'
    ];

    // ============ DATA SOSIAL MEDIA ============
    protected $sosialMedia = [
        ['platform' => 'Facebook', 'handle' => 'MTsN 1 Magetan Official', 'link' => 'https://facebook.com/mtsn1magetan'],
        ['platform' => 'Instagram', 'handle' => '@mtsn1magetan', 'link' => 'https://instagram.com/mtsn1magetan'],
        ['platform' => 'YouTube', 'handle' => 'MTsN 1 Magetan', 'link' => 'https://youtube.com/@mtsn1magetan'],
        ['platform' => 'WhatsApp', 'handle' => '0812-3456-7890', 'link' => '#'],
    ];

    // ============ DATA GALERI ============
    protected $galeri = [
        ['id' => 1, 'judul' => 'Upacara Bendera Senin', 'gambar' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=800', 'tanggal' => '2024-01-15'],
        ['id' => 2, 'judul' => 'Kegiatan Ekstrakurikuler Robotik', 'gambar' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?w=800', 'tanggal' => '2024-01-14'],
        ['id' => 3, 'judul' => 'Lomba Futsal Antar Kelas', 'gambar' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=800', 'tanggal' => '2024-01-13'],
        ['id' => 4, 'judul' => 'Kegiatan Pramuka', 'gambar' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=800', 'tanggal' => '2024-01-12'],
        ['id' => 5, 'judul' => 'Pembelajaran di Laboratorium', 'gambar' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=800', 'tanggal' => '2024-01-11'],
        ['id' => 6, 'judul' => 'Kegiatan Paduan Suara', 'gambar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800', 'tanggal' => '2024-01-10'],
        ['id' => 7, 'judul' => 'Praktek Sholat Berjamaah', 'gambar' => 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800', 'tanggal' => '2024-01-09'],
        ['id' => 8, 'judul' => 'Pelatihan Komputer', 'gambar' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=800', 'tanggal' => '2024-01-08'],
    ];

    // ============ LOGIN ============
    public function showLogin()
    {
        return view('admin.login');
    }

    public function doLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === $this->adminUser['username'] && $password === $this->adminUser['password']) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    }

    // ============ DASHBOARD ============
    public function dashboard()
    {
        $data = [
            'total_guru' => count($this->guru),
            'total_ekstrakurikuler' => count($this->ekstrakurikuler),
            'total_berita' => count($this->berita),
            'total_galeri' => count($this->galeri),
            'guru_terbaru' => array_slice($this->guru, -3),
            'berita_terbaru' => array_slice($this->berita, -3),
        ];

        return view('admin.dashboard', compact('data'));
    }

    // =====================================================
    // ============ CRUD SEJARAH (MENGGUNAKAN MODEL) =======
    // =====================================================

    public function showSejarah()
    {
        $sejarah = Sejarah::first();
        return view('admin.sejarah', compact('sejarah'));
    }

    public function updateSejarah(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $sejarah = Sejarah::first();
        
        if (!$sejarah) {
            $sejarah = new Sejarah();
        }

        $sejarah->content = $request->input('content');

        if ($request->hasFile('gambar')) {
            if ($sejarah->gambar && Storage::exists('public/sejarah/' . $sejarah->gambar)) {
                Storage::delete('public/sejarah/' . $sejarah->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/sejarah', $filename);
            $sejarah->gambar = $filename;
        }

        $sejarah->save();

        return redirect()->route('admin.sejarah')->with('success', 'Sejarah sekolah berhasil diperbarui');
    }

    public function deleteGambarSejarah()
    {
        $sejarah = Sejarah::first();
        
        if ($sejarah && $sejarah->gambar) {
            if (Storage::exists('public/sejarah/' . $sejarah->gambar)) {
                Storage::delete('public/sejarah/' . $sejarah->gambar);
            }
            $sejarah->gambar = null;
            $sejarah->save();
        }

        return redirect()->route('admin.sejarah')->with('success', 'Gambar berhasil dihapus');
    }

    // ============ VISI & MISI ============
    public function showVisiMisi()
    {
        return view('admin.visi-misi', ['visiMisi' => $this->visiMisi]);
    }

    public function updateVisiMisi(Request $request)
    {
        $this->visiMisi['visi'] = $request->input('visi');
        $this->visiMisi['misi'] = $request->input('misi');
        return redirect()->route('admin.visi-misi')->with('success', 'Visi & Misi berhasil diperbarui');
    }

    // ============ GURU ============
    public function manageGuru()
    {
        return view('admin.guru', ['guru' => $this->guru]);
    }

    public function addGuru(Request $request)
    {
        $this->guru[] = [
            'id' => count($this->guru) + 1,
            'nama' => $request->input('nama'),
            'mata_pelajaran' => $request->input('mata_pelajaran'),
            'nip' => $request->input('nip'),
        ];

        return redirect()->route('admin.guru')->with('success', 'Guru berhasil ditambahkan');
    }

    public function updateGuru($id, Request $request)
    {
        foreach ($this->guru as &$guru) {
            if ($guru['id'] == $id) {
                $guru['nama'] = $request->input('nama');
                $guru['mata_pelajaran'] = $request->input('mata_pelajaran');
                $guru['nip'] = $request->input('nip');
                break;
            }
        }

        return redirect()->route('admin.guru')->with('success', 'Guru berhasil diperbarui');
    }

    public function deleteGuru($id)
    {
        $this->guru = array_filter($this->guru, function ($guru) use ($id) {
            return $guru['id'] != $id;
        });

        return redirect()->route('admin.guru')->with('success', 'Guru berhasil dihapus');
    }

    // ============ EKSTRAKURIKULER ============
    public function manageEkstrakurikuler()
    {
        return view('admin.ekstrakurikuler', ['ekstrakurikuler' => $this->ekstrakurikuler]);
    }

    public function addEkstra(Request $request)
    {
        $this->ekstrakurikuler[] = [
            'id' => count($this->ekstrakurikuler) + 1,
            'name' => $request->input('name'),
            'jadwal' => $request->input('jadwal'),
            'pembina' => $request->input('pembina'),
            'prestasi' => $request->input('prestasi'),
        ];

        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function updateEkstra($id, Request $request)
    {
        foreach ($this->ekstrakurikuler as &$ekstra) {
            if ($ekstra['id'] == $id) {
                $ekstra['name'] = $request->input('name');
                $ekstra['jadwal'] = $request->input('jadwal');
                $ekstra['pembina'] = $request->input('pembina');
                $ekstra['prestasi'] = $request->input('prestasi');
                break;
            }
        }

        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil diperbarui');
    }

    public function deleteEkstra($id)
    {
        $this->ekstrakurikuler = array_filter($this->ekstrakurikuler, function ($ekstra) use ($id) {
            return $ekstra['id'] != $id;
        });

        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil dihapus');
    }

    // ============ BERITA ============
    public function manageBerita()
    {
        return view('admin.berita', ['berita' => $this->berita]);
    }

    public function addBerita(Request $request)
    {
        $this->berita[] = [
            'id' => count($this->berita) + 1,
            'judul' => $request->input('judul'),
            'konten' => $request->input('konten'),
            'tanggal' => date('Y-m-d'),
            'tipe' => $request->input('tipe'),
            'gambar' => $request->input('gambar'),
        ];

        return redirect()->route('admin.berita')->with('success', 'Berita/Pengumuman berhasil ditambahkan');
    }

    public function updateBerita($id, Request $request)
    {
        foreach ($this->berita as &$b) {
            if ($b['id'] == $id) {
                $b['judul'] = $request->input('judul');
                $b['konten'] = $request->input('konten');
                $b['tipe'] = $request->input('tipe');
                $b['gambar'] = $request->input('gambar');
                break;
            }
        }

        return redirect()->route('admin.berita')->with('success', 'Berita/Pengumuman berhasil diperbarui');
    }

    public function deleteBerita($id)
    {
        $this->berita = array_filter($this->berita, function ($b) use ($id) {
            return $b['id'] != $id;
        });

        return redirect()->route('admin.berita')->with('success', 'Berita/Pengumuman berhasil dihapus');
    }

    // ============ PPDB ============
    public function managePpdb()
    {
        return view('admin.ppdb', ['ppdb' => $this->ppdb]);
    }

    public function updatePpdb(Request $request)
    {
        $this->ppdb = [
            'judul' => $request->input('judul'),
            'dibuka' => $request->input('dibuka'),
            'ditutup' => $request->input('ditutup'),
            'kuota' => $request->input('kuota'),
            'persyaratan' => $request->input('persyaratan'),
            'konten' => $request->input('konten'),
        ];

        return redirect()->route('admin.ppdb')->with('success', 'Data PPDB berhasil diperbarui');
    }

    // ============ SOSIAL MEDIA ============
    public function manageSosialMedia()
    {
        return view('admin.sosial-media', ['sosialMedia' => $this->sosialMedia]);
    }

    public function updateSosialMedia(Request $request)
    {
        return redirect()->route('admin.sosial-media')->with('success', 'Sosial Media berhasil diperbarui');
    }

    // ============ GALERI ============
    public function manageGaleri()
    {
        return view('admin.galeri', ['galeri' => $this->galeri]);
    }

    public function addGaleri(Request $request)
    {
        $this->galeri[] = [
            'id' => count($this->galeri) + 1,
            'judul' => $request->input('judul'),
            'gambar' => $request->input('gambar'),
            'tanggal' => date('Y-m-d'),
        ];

        return redirect()->route('admin.galeri')->with('success', 'Foto berhasil ditambahkan');
    }

    public function updateGaleri($id, Request $request)
    {
        foreach ($this->galeri as &$g) {
            if ($g['id'] == $id) {
                $g['judul'] = $request->input('judul');
                $g['gambar'] = $request->input('gambar');
                break;
            }
        }

        return redirect()->route('admin.galeri')->with('success', 'Foto berhasil diperbarui');
    }

    public function deleteGaleri($id)
    {
        $this->galeri = array_filter($this->galeri, function ($g) use ($id) {
            return $g['id'] != $id;
        });

        return redirect()->route('admin.galeri')->with('success', 'Foto berhasil dihapus');
    }
}
