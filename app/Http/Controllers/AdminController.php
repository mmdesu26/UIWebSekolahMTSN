<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon; // Ditambahkan untuk logika tanggal PPDB
use App\Models\News;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\SiteSetting;
use App\Models\Ppdb;
use App\Models\Prestasi;

// ===== kode leni =====
use App\Models\Sejarah;
use App\Models\VisiMisi;
use App\Models\Kurikulum;
use App\Models\Galeri;

class AdminController extends Controller
{
    // ====================================================================
    // DASHBOARD
    // ====================================================================
    public function dashboard()
    {
        // ✅ Ambil dari database, bukan hardcoded
        $totalGuru            = Guru::count();
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalBerita          = News::count();
        $totalGaleri          = Galeri::count(); // kode leni digabung

        // ✅ Ambil guru terbaru dari database
        $guruTerbaru = Guru::orderBy('created_at', 'desc')->get()->toArray();

        // ✅ Ambil berita terbaru dari database
        $beritaTerbaru = News::latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'totalGuru',
            'totalEkstrakurikuler',
            'totalBerita',
            'totalGaleri',
            'guruTerbaru',
            'beritaTerbaru'
        ));
    }

    // ====================================================================
    // AUTHENTICATION ADMIN
    // ====================================================================
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function loginSubmit(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin == 1) {
                $request->session()->regenerate();
                return redirect()->route('admin.dashboard')->with('success', 'Selamat datang, Admin!');
            }

            Auth::logout();
            return back()->with('error', 'Akses ditolak! Anda bukan admin.');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login')->with('success', 'Berhasil logout.');
    }

    // ====================================================================
    // CRUD BERITA
    // ====================================================================
    public function manageBerita()
    {
        $berita = News::latest()->get();
        return view('admin.berita', compact('berita'));
    }

    public function addBerita(Request $request)
    {
        $validated = $request->validate([
            'judul'        => 'required|string|min:3|max:255',
            'tipe'         => 'required|in:berita,pengumuman,kegiatan',
            'konten'       => 'required|string|min:20',
            'image_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'image_url'    => 'nullable|url',
            'source'       => 'nullable|string|max:255',
            'news_date'    => 'nullable|date',
            'is_published' => 'sometimes|boolean',
        ]);

        $image = null;
        if ($request->hasFile('image_file')) {
            $path = $request->file('image_file')->store('berita', 'public');
            $image = asset('storage/' . $path);
        } elseif ($request->filled('image_url')) {
            $image = $validated['image_url'];
        }

        $slugBase = Str::slug($validated['judul']);
        $slug = $slugBase;
        $i = 1;
        while (News::where('slug', $slug)->exists()) {
            $slug = $slugBase . '-' . $i++;
        }

        News::create([
            'title'        => $validated['judul'],
            'slug'         => $slug,
            'content'      => $validated['konten'],
            'tipe'         => $validated['tipe'],
            'image'        => $image,
            'source'       => $validated['source'],
            'news_date'    => $validated['news_date'] ?? now(),
            'is_published' => $request->has('is_published'),
            'user_id'      => auth()->id(),
            'sentiment'    => 'netral',
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan!');
    }

    // === DITAMBAHKAN: Update Berita ===
    public function updateBerita($id, Request $request)
    {
        $berita = News::findOrFail($id);

        $validated = $request->validate([
            'judul'        => 'required|string|min:3|max:255',
            'tipe'         => 'required|in:berita,pengumuman,kegiatan',
            'konten'       => 'required|string|min:20',
            'image_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'image_url'    => 'nullable|url',
            'source'       => 'nullable|string|max:255',
            'news_date'    => 'nullable|date',
            'is_published' => 'sometimes|boolean',
        ]);

        // Prioritas: file > URL
        $image = $berita->image;
        if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
            // Hapus gambar lama jika ada
            if ($berita->image && str_starts_with($berita->image, asset('storage/'))) {
                Storage::disk('public')->delete(str_replace(asset('storage/'), '', $berita->image));
            }
            $path = $request->file('image_file')->store('berita', 'public');
            $image = asset('storage/' . $path);
        } elseif ($request->filled('image_url')) {
            $image = $validated['image_url'];
        }

        // Update slug jika judul berubah
        if ($berita->title !== $validated['judul']) {
            $baseSlug = Str::slug($validated['judul']);
            $slug = $baseSlug;
            $i = 1;
            while (News::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
                $slug = $baseSlug . '-' . $i++;
            }
            $berita->slug = $slug;
        }

        $berita->update([
            'title'        => $validated['judul'],
            'content'      => $validated['konten'],
            'tipe'         => $validated['tipe'],
            'image'        => $image,
            'source'       => $validated['source'] ?? null,
            'news_date'    => $validated['news_date'] ?? $berita->news_date,
            'is_published' => $request->has('is_published'),
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui!');
    }

    public function deleteBerita($id)
    {
        News::findOrFail($id)->delete();
        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus!');
    }

    // ====================================================================
    // CRUD EKSTRAKURIKULER
    // ====================================================================
    public function manageEkstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    public function deleteEkstra($id)
{
    $ekstra = Ekstrakurikuler::findOrFail($id);
    $ekstra->delete();

    return redirect()->route('admin.ekstrakurikuler')
                     ->with('success', 'Ekstrakurikuler berhasil dihapus!');
}
public function addEkstra(Request $request)
{
    $validated = $request->validate([
        'name'     => 'required|string|max:255|unique:ekstrakurikulers,name',
        'jadwal'   => 'required|string|max:255',
        'pembina'  => 'required|string|max:255',
        'prestasi' => 'required|string',
    ]);

    $slugBase = Str::slug($validated['name']);
    $slug = $slugBase;
    $i = 1;
    while (Ekstrakurikuler::where('slug', $slug)->exists()) {
        $slug = $slugBase . '-' . $i++;
    }

    Ekstrakurikuler::create([
        'name'     => $validated['name'],
        'slug'     => $slug,
        'jadwal'   => $validated['jadwal'],
        'pembina'  => $validated['pembina'],
        'prestasi' => $validated['prestasi'],
    ]);

    return redirect()->route('admin.ekstrakurikuler')
                     ->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
}
    // ====================================================================
    // CRUD SEJARAH
    // ====================================================================
    public function showSejarah()
    {
        $sejarah = Sejarah::firstOrCreate(['id' => 1], [
            'content' => '',
            'image' => null
        ]);

        return view('admin.sejarah', compact('sejarah'));
    }

    // ====================================================================
    // CRUD VISI & MISI
    // ====================================================================
    public function showVisiMisi()
    {
        $visiMisi = VisiMisi::first();
        return view('admin.visi-misi', compact('visiMisi'));
    }

    // ====================================================================
    // CRUD KURIKULUM
    // ====================================================================
    public function manageKurikulum()
    {
        $kurikulum = Kurikulum::first();
        return view('admin.kurikulum', compact('kurikulum'));
    }

    // ====================================================================
    // CRUD GALERI
    // ====================================================================
    public function manageGaleri()
    {
        $galeri = Galeri::all();
        return view('admin.galeri', compact('galeri'));
    }

    // ====================================================================
    // CRUD PPDB
    // ====================================================================
    public function managePpdb()
    {
        $ppdb = Ppdb::first();

        // === DITAMBAHKAN: Logika status PPDB ===
        $today = Carbon::today();
        $status = 'coming_soon';
        if ($ppdb && $ppdb->dibuka && $ppdb->ditutup) {
            if ($today->between(Carbon::parse($ppdb->dibuka), Carbon::parse($ppdb->ditutup))) {
                $status = 'open';
            } elseif ($today->gt(Carbon::parse($ppdb->ditutup))) {
                $status = 'closed';
            }
        }

        return view('admin.ppdb', compact('ppdb', 'status'));
    }

    // === DITAMBAHKAN: Update PPDB ===
    public function updatePpdb(Request $request)
{
    $validated = $request->validate([
        'judul' => 'required|string|max:255',
        'dibuka' => 'required|date',
        'ditutup' => 'required|date|after_or_equal:dibuka',
        'kuota' => 'required|integer|min:1',
        'persyaratan' => 'required|string',
        'konten' => 'required|string',
        'timeline' => 'nullable|array',
        'timeline.*.date' => 'required|string',
        'timeline.*.title' => 'required|string',
        'timeline.*.description' => 'required|string',
    ]);

    // Gunakan updateOrCreate untuk menyederhanakan logika
    $ppdb = Ppdb::updateOrCreate(
        ['id' => 1], // Asumsi hanya ada satu entri PPDB, sesuaikan jika perlu
        [
            'judul' => $validated['judul'],
            'dibuka' => $validated['dibuka'],
            'ditutup' => $validated['ditutup'],
            'kuota' => $validated['kuota'],
            'persyaratan' => $validated['persyaratan'],
            'konten' => $validated['konten'],
            'timeline' => json_encode($validated['timeline'] ?? []),
        ]
    );

    return redirect()->route('admin.ppdb')->with('success', 'Data PPDB berhasil diperbarui!');
}

    // === DITAMBAHKAN: Delete PPDB ===
    public function deletePpdb($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        $ppdb->delete();

        return redirect()->route('admin.ppdb')->with('success', 'Data PPDB berhasil dihapus!');
    }

    // ====================================================================
    // PENGATURAN SITUS (SETTINGS)
    // ====================================================================
    public function manageSettings()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->validate([
            // Hero Section
            'hero_title'    => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:500',

            // Quick Info
            'akreditasi'    => 'required|string|max:100',
            'jumlah_siswa'  => 'required|string|max:50',
            'jumlah_guru'   => 'required|string|max:50',
            'program_sks'   => 'required|string|max:200',

            // About
            'visi'   => 'required|string',
            'misi_1' => 'required|string|max:500',
            'misi_2' => 'required|string|max:500',
            'misi_3' => 'required|string|max:500',
            'misi_4' => 'required|string|max:500',

            // PPDB Section
            'ppdb_tahun'     => 'required|string|max:50',
            'ppdb_judul'     => 'required|string|max:255',
            'ppdb_deskripsi' => 'required|string',

            // Contact
            'contact_address' => 'required|string|max:255',
            'contact_phone'   => 'required|string|max:100',
            'contact_email'   => 'required|string|max:100',
            'contact_hours'   => 'required|string|max:255',

            // Images (dinaikkan jadi 10MB)
            'ppdb_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        // Upload PPDB Image
        if ($request->hasFile('ppdb_image')) {
            if ($old = SiteSetting::where('key', 'ppdb_image')->value('value')) {
                Storage::disk('public')->delete($old);
            }
            $path = $request->file('ppdb_image')->store('images', 'public');
            SiteSetting::updateOrCreate(['key' => 'ppdb_image'], ['value' => $path]);
        }

        // Upload About Image
        if ($request->hasFile('about_image')) {
            if ($old = SiteSetting::where('key', 'about_image')->value('value')) {
                Storage::disk('public')->delete($old);
            }
            $path = $request->file('about_image')->store('images', 'public');
            SiteSetting::updateOrCreate(['key' => 'about_image'], ['value' => $path]);
        }

        // Simpan semua field teks
        $textFields = [
            'hero_title', 'hero_subtitle', 'akreditasi', 'jumlah_siswa', 'jumlah_guru', 'program_sks',
            'visi', 'misi_1', 'misi_2', 'misi_3', 'misi_4',
            'ppdb_tahun', 'ppdb_judul', 'ppdb_deskripsi',
            'contact_address', 'contact_phone', 'contact_email', 'contact_hours'
        ];

        foreach ($textFields as $field) {
            SiteSetting::updateOrCreate(
                ['key' => $field],
                ['value' => $data[$field] ?? '']
            );
        }

        return redirect()->route('admin.settings')->with('success', 'Semua pengaturan beranda berhasil diperbarui!');
    } 

    // ====================================================================
// CRUD PRESTASI
// ====================================================================
public function managePrestasi()
{
    $prestasi = Prestasi::all();
    return view('admin.prestasi', compact('prestasi'));
}

// Tambah Prestasi
public function addPrestasi(Request $request)
{
    $validated = $request->validate([
        'nama_prestasi' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
    ]);

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('prestasi', 'public');
        $validated['gambar'] = $path;
    }

    Prestasi::create($validated);

    return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil ditambahkan!');
}

// Update Prestasi
public function updatePrestasi($id, Request $request)
{
    $prestasi = Prestasi::findOrFail($id);

    $validated = $request->validate([
        'nama_prestasi' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
    ]);

    if ($request->hasFile('gambar')) {
        if ($prestasi->gambar) {
            Storage::disk('public')->delete($prestasi->gambar);
        }
        $path = $request->file('gambar')->store('prestasi', 'public');
        $validated['gambar'] = $path;
    }

    $prestasi->update($validated);

    return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil diperbarui!');
}

// Delete Prestasi
public function deletePrestasi($id)
{
    $prestasi = Prestasi::findOrFail($id);
    if ($prestasi->gambar) {
        Storage::disk('public')->delete($prestasi->gambar);
    }
    $prestasi->delete();

    return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil dihapus!');
}
}