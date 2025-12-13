<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Ekstrakurikuler;
use App\Models\SiteSetting;
use App\Models\Ppdb;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // ====================================================================
    // DASHBOARD
    // ====================================================================
    public function dashboard()
    {
        $totalGuru            = 85;
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalBerita          = News::count();

        $guruTerbaru = [
            ['nama' => 'Dr. Hj. Siti Aminah, M.Pd', 'mata_pelajaran' => 'Pendidikan Agama Islam'],
            ['nama' => 'Drs. Ahmad Subandi',         'mata_pelajaran' => 'Matematika'],
            ['nama' => 'Siti Nurhaliza, S.Pd',       'mata_pelajaran' => 'Bahasa Indonesia'],
        ];

        $beritaTerbaru = News::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalGuru', 'totalEkstrakurikuler', 'totalBerita', 'guruTerbaru', 'beritaTerbaru'));
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
    // MANAJEMEN BERITA
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
        'konten'       => 'required|string|min:20', // unlimited max
        'image_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image_url'    => 'nullable|url',
        'source'       => 'nullable|string|max:255',
        'news_date'    => 'nullable|date',
        'is_published' => 'sometimes|boolean',
    ]);

    // Prioritas: file > URL
    $image = null;
    if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
        $path = $request->file('image_file')->store('berita', 'public');
        $image = asset('storage/' . $path);
    } elseif ($request->filled('image_url')) {
        $image = $validated['image_url'];
    }

    // Slug unik
    $baseSlug = Str::slug($validated['judul']);
    $slug = $baseSlug;
    $i = 1;
    while (News::where('slug', $slug)->exists()) {
        $slug = $baseSlug . '-' . $i++;
    }

    News::create([
        'title'        => $validated['judul'],
        'slug'         => $slug,
        'content'      => $validated['konten'],
        'tipe'         => $validated['tipe'],
        'image'        => $image,
        'source'       => $validated['source'] ?? null,
        'news_date'    => $validated['news_date'] ?? now(),
        'is_published' => $request->has('is_published'),
        'user_id'      => auth()->id(),
        'sentiment'    => 'netral',
    ]);

    return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan!');
}

public function updateBerita($id, Request $request)
{
    $berita = News::findOrFail($id);

    $validated = $request->validate([
        'judul'        => 'required|string|min:3|max:255',
        'tipe'         => 'required|in:berita,pengumuman,kegiatan',
        'konten'       => 'required|string|min:20',
        'image_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'image_url'    => 'nullable|url',
        'source'       => 'nullable|string|max:255',
        'news_date'    => 'nullable|date',
        'is_published' => 'sometimes|boolean',
    ]);

    // Prioritas: file > URL
    $image = $berita->image;
    if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
        // Hapus lama kalau upload
        if ($berita->image && str_starts_with($berita->image, asset('storage/'))) {
            Storage::disk('public')->delete(str_replace(asset('storage/'), '', $berita->image));
        }
        $path = $request->file('image_file')->store('berita', 'public');
        $image = asset('storage/' . $path);
    } elseif ($request->filled('image_url')) {
        $image = $validated['image_url'];
    }

    // Update slug kalau judul berubah
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
        $berita = News::findOrFail($id);
        $berita->delete();

        return redirect()->route('admin.berita')
                         ->with('success', 'Berita berhasil dihapus!');
    }

    // ====================================================================
    // MANAJEMEN EKSTRAKURIKULER
    // ====================================================================
    public function manageEkstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler', ['ekstrakurikuler' => $ekstrakurikuler]);
    }

    public function addEkstra(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'jadwal'   => 'required|string|max:255',
            'pembina'  => 'required|string|max:255',
            'prestasi' => 'required|string',
        ]);

        $slug = Str::slug($request->name);

        Ekstrakurikuler::create([
            'name'     => $request->name,
            'jadwal'   => $request->jadwal,
            'pembina'  => $request->pembina,
            'prestasi' => $request->prestasi,
            'slug'     => $slug,
        ]);

        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function updateEkstra($id, Request $request)
    {
        $ekstra = Ekstrakurikuler::findOrFail($id);

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'jadwal'   => 'required|string|max:255',
            'pembina'  => 'required|string|max:255',
            'prestasi' => 'required|string',
        ]);

        $ekstra->update([
            'name'     => $request->name,
            'jadwal'   => $request->jadwal,
            'pembina'  => $request->pembina,
            'prestasi' => $request->prestasi,
            'slug'     => Str::slug($request->name),
        ]);

        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil diperbarui');
    }

    public function deleteEkstra($id)
    {
        $ekstra = Ekstrakurikuler::findOrFail($id);
        $ekstra->delete();

        return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil dihapus');
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

            // Images
            'ppdb_image'  => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'about_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
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
    // MANAJEMEN PPDB (Single Record)
    // ====================================================================
    public function managePpdb()
    {
        $ppdb = Ppdb::first();
        return view('admin.ppdb', compact('ppdb'));
    }

    public function updatePpdb(Request $request)
    {
        $validated = $request->validate([
            'judul'       => 'required|string|max:255',
            'dibuka'      => 'required|date',
            'ditutup'     => 'required|date|after_or_equal:dibuka',
            'kuota'       => 'required|integer|min:1',
            'persyaratan' => 'required|string',
            'konten'      => 'required|string',
        ]);

        Ppdb::updateOrCreate(['id' => 1], $validated);

        return redirect()->route('admin.ppdb')->with('success', 'Data PPDB berhasil diperbarui!');
    }

    public function deletePpdb($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        $ppdb->delete();

        return redirect()->route('admin.ppdb')->with('success', 'Data PPDB berhasil dihapus!');
    }
}