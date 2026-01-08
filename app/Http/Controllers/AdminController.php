<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\News;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\SiteSetting;
use App\Models\Ppdb;
use App\Models\Prestasi;
use App\Models\Sejarah;
use App\Models\VisiMisi;
use App\Models\Kurikulum;
use App\Models\Galeri;
use App\Models\Akreditasi;

class AdminController extends Controller
{
    // ====================================================================
    // DASHBOARD
    // ====================================================================
    public function dashboard()
    {
        $totalGuru            = Guru::count();
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalBerita          = News::count();
        $totalGaleri          = Galeri::count();

        $guruTerbaru = Guru::orderBy('created_at', 'desc')->get()->toArray();
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

    // Cukup flush session dan regenerate token
    $request->session()->flush(); 
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
        $request->validate([
            'judul'        => 'required|string|min:3|max:255',
            'tipe'         => 'required|in:berita,pengumuman',
            'konten'       => 'required|string|min:20',
            'image_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'image_url'    => 'nullable|url',
            'source'       => 'nullable|string|max:255',
            'news_date'    => 'nullable|date',
            'is_published' => 'sometimes|boolean',
        ], [
            'judul.required'    => 'Judul berita wajib diisi.',
            'judul.min'         => 'Judul minimal 3 karakter.',
            'tipe.required'     => 'Tipe berita wajib dipilih.',
            'konten.required'   => 'Konten berita wajib diisi.',
            'konten.min'        => 'Konten minimal 20 karakter.',
            'image_file.image'  => 'File harus berupa gambar.',
            'image_file.mimes'  => 'Format gambar harus jpeg, png, jpg, atau webp.',
            'image_file.max'    => 'Ukuran gambar maksimal 10MB.',
            'image_url.url'     => 'URL gambar tidak valid.',
        ]);

        try {
            $image = null;
            if ($request->hasFile('image_file')) {
                $path = $request->file('image_file')->store('berita', 'public');
                $image = asset('storage/' . $path);
            } elseif ($request->filled('image_url')) {
                $image = $request->image_url;
            }

            $slugBase = Str::slug($request->judul);
            $slug = $slugBase;
            $i = 1;
            while (News::where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }

            News::create([
                'title'        => $request->judul,
                'slug'         => $slug,
                'content'      => $request->konten,
                'tipe'         => $request->tipe,
                'image'        => $image,
                'source'       => $request->source,
                'news_date'    => $request->news_date ?? now(),
                'is_published' => $request->has('is_published'),
                'user_id'      => auth()->id(),
                'sentiment'    => 'netral',
            ]);

            return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan berita!');
        }
    }

    public function updateBerita($id, Request $request)
    {
        $berita = News::findOrFail($id);

        $request->validate([
            'judul'        => 'required|string|min:3|max:255',
            'tipe'         => 'required|in:berita,pengumuman',
            'konten'       => 'required|string|min:20',
            'image_file'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'image_url'    => 'nullable|url',
            'source'       => 'nullable|string|max:255',
            'news_date'    => 'nullable|date',
            'is_published' => 'sometimes|boolean',
        ], [
            'judul.required'    => 'Judul berita wajib diisi.',
            'konten.required'   => 'Konten berita wajib diisi.',
            'image_file.image'  => 'File harus berupa gambar.',
            'image_file.max'    => 'Ukuran gambar maksimal 10MB.',
        ]);

        try {
            $image = $berita->image;

            if ($request->hasFile('image_file') && $request->file('image_file')->isValid()) {
                // Hapus gambar lama jika dari storage lokal
                if ($berita->image && str_starts_with($berita->image, asset('storage/'))) {
                    $oldPath = str_replace(asset('storage/'), '', $berita->image);
                    Storage::disk('public')->delete($oldPath);
                }

                $path = $request->file('image_file')->store('berita', 'public');
                $image = asset('storage/' . $path);
            } elseif ($request->filled('image_url')) {
                $image = $request->image_url;
            }

            // Update slug jika judul berubah
            if ($berita->title !== $request->judul) {
                $baseSlug = Str::slug($request->judul);
                $slug = $baseSlug;
                $i = 1;
                while (News::where('slug', $slug)->where('id', '!=', $berita->id)->exists()) {
                    $slug = $baseSlug . '-' . $i++;
                }
                $berita->slug = $slug;
            }

            $berita->update([
                'title'        => $request->judul,
                'content'      => $request->konten,
                'tipe'         => $request->tipe,
                'image'        => $image,
                'source'       => $request->source ?? null,
                'news_date'    => $request->news_date ?? $berita->news_date,
                'is_published' => $request->has('is_published'),
            ]);

            return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui berita!');
        }
    }

    public function editBerita($id)
{
    $berita = News::findOrFail($id);
    return view('admin.berita-edit', compact('berita'));
}

    public function deleteBerita($id)
    {
        try {
            $berita = News::findOrFail($id);

            // Hapus gambar jika dari storage lokal
            if ($berita->image && str_starts_with($berita->image, asset('storage/'))) {
                $oldPath = str_replace(asset('storage/'), '', $berita->image);
                Storage::disk('public')->delete($oldPath);
            }

            $berita->delete();

            return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus berita!');
        }
    }

    // ====================================================================
    // CRUD EKSTRAKURIKULER
    // ====================================================================
    public function manageEkstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    public function addEkstra(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255|unique:ekstrakurikulers,name',
            'jadwal'   => 'required|string|max:255',
            'pembina'  => 'required|string|max:255',
            'prestasi' => 'nullable|string',
        ], [
            'name.required'     => 'Nama ekstrakurikuler wajib diisi.',
            'name.unique'       => 'Nama ekstrakurikuler sudah digunakan.',
            'jadwal.required'   => 'Jadwal wajib diisi.',
            'pembina.required'  => 'Nama pembina wajib diisi.',
        ]);

        try {
            $slugBase = Str::slug($request->name);
            $slug = $slugBase;
            $i = 1;
            while (Ekstrakurikuler::where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }

            Ekstrakurikuler::create([
                'name'     => $request->name,
                'slug'     => $slug,
                'jadwal'   => $request->jadwal,
                'pembina'  => $request->pembina,
                'prestasi' => $request->filled('prestasi')
    ? $request->prestasi
    : 'Belum ada prestasi',
            ]);

            return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan ekstrakurikuler!');
        }
    }

    public function editEkstra($id)
{
    $ekstra = Ekstrakurikuler::findOrFail($id);
    return view('admin.ekstrakurikuler-edit', compact('ekstra'));
}

public function updateEkstra($id, Request $request)
{
    $ekstra = Ekstrakurikuler::findOrFail($id);

    $request->validate([
        'name'     => 'required|string|max:255|unique:ekstrakurikulers,name,' . $id,
        'jadwal'   => 'required|string|max:255',
        'pembina'  => 'required|string|max:255',
        'prestasi' => 'nullable|string',
    ]);

    $ekstra->update([
        'name'     => $request->name,
        'jadwal'   => $request->jadwal,
        'pembina'  => $request->pembina,
        'prestasi' => $request->filled('prestasi')
    ? $request->prestasi
    : 'Belum ada prestasi',
    ]);

    return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil diperbarui!');
}

    public function deleteEkstra($id)
    {
        try {
            $ekstra = Ekstrakurikuler::findOrFail($id);
            $ekstra->delete();

            return redirect()->route('admin.ekstrakurikuler')->with('success', 'Ekstrakurikuler berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus ekstrakurikuler!');
        }
    }

    // ====================================================================
    // CRUD PPDB
    // ====================================================================
    public function managePpdb()
    {
        $ppdb = Ppdb::first();

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

    public function updatePpdb(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'dibuka'      => 'required|date',
            'ditutup'     => 'required|date|after_or_equal:dibuka',
            'kuota'       => 'required|integer|min:1',
            'persyaratan' => 'required|string',
            'konten'      => 'required|string',
            'timeline'    => 'nullable|array',
            'timeline.*.date'        => 'required|string',
            'timeline.*.title'       => 'required|string',
            'timeline.*.description' => 'required|string',
        ], [
            'judul.required'       => 'Judul PPDB wajib diisi.',
            'dibuka.required'      => 'Tanggal dibuka wajib diisi.',
            'ditutup.required'     => 'Tanggal ditutup wajib diisi.',
            'ditutup.after_or_equal'=> 'Tanggal ditutup harus sama atau setelah tanggal dibuka.',
            'kuota.required'       => 'Kuota siswa wajib diisi.',
            'persyaratan.required' => 'Persyaratan wajib diisi.',
            'konten.required'      => 'Konten deskripsi PPDB wajib diisi.',
        ]);

        try {
            Ppdb::updateOrCreate(
                ['id' => 1],
                [
                    'judul'       => $request->judul,
                    'dibuka'      => $request->dibuka,
                    'ditutup'     => $request->ditutup,
                    'kuota'       => $request->kuota,
                    'persyaratan' => $request->persyaratan,
                    'konten'      => $request->konten,
                    'timeline'    => json_encode($request->timeline ?? []),
                ]
            );

            return redirect()->route('admin.ppdb')->with('success', 'Data PPDB berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui data PPDB!');
        }
    }

    public function deletePpdb($id)
    {
        try {
            $ppdb = Ppdb::findOrFail($id);
            $ppdb->delete();

            return redirect()->route('admin.ppdb')->with('success', 'Data PPDB berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data PPDB!');
        }
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
        $request->validate([
            'hero_title'    => 'required|string|max:255',
            'hero_subtitle' => 'required|string|max:500',
            'akreditasi'    => 'required|string|max:100',
            'jumlah_siswa'  => 'required|string|max:50',
            'jumlah_guru'   => 'required|string|max:50',
            'program_sks'   => 'required|string|max:200',
            'visi'          => 'required|string',
            'misi_1'        => 'required|string|max:500',
            'misi_2'        => 'required|string|max:500',
            'misi_3'        => 'required|string|max:500',
            'misi_4'        => 'required|string|max:500',
            'ppdb_tahun'    => 'required|string|max:50',
            'ppdb_judul'    => 'required|string|max:255',
            'ppdb_deskripsi'=> 'required|string',
            'contact_address'=> 'required|string|max:255',
            'contact_phone' => 'required|string|max:100',
            'contact_email' => 'required|string|max:100',
            'contact_hours' => 'required|string|max:255',
            'ppdb_image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'about_image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ], [
            'hero_title.required' => 'Judul hero wajib diisi.',
            'hero_subtitle.required' => 'Subtitle hero wajib diisi.',
            // Tambahkan pesan lain jika diperlukan
        ]);

        try {
            // Upload PPDB Image
            if ($request->hasFile('ppdb_image')) {
                $old = SiteSetting::where('key', 'ppdb_image')->value('value');
                if ($old) Storage::disk('public')->delete($old);

                $path = $request->file('ppdb_image')->store('images', 'public');
                SiteSetting::updateOrCreate(['key' => 'ppdb_image'], ['value' => $path]);
            }

            // Upload About Image
            if ($request->hasFile('about_image')) {
                $old = SiteSetting::where('key', 'about_image')->value('value');
                if ($old) Storage::disk('public')->delete($old);

                $path = $request->file('about_image')->store('images', 'public');
                SiteSetting::updateOrCreate(['key' => 'about_image'], ['value' => $path]);
            }

            $textFields = [
                'hero_title', 'hero_subtitle', 'akreditasi', 'jumlah_siswa', 'jumlah_guru', 'program_sks',
                'visi', 'misi_1', 'misi_2', 'misi_3', 'misi_4',
                'ppdb_tahun', 'ppdb_judul', 'ppdb_deskripsi',
                'contact_address', 'contact_phone', 'contact_email', 'contact_hours'
            ];

            foreach ($textFields as $field) {
                SiteSetting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $request->$field ?? '']
                );
            }

            return redirect()->route('admin.settings')->with('success', 'Semua pengaturan beranda berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui pengaturan!');
        }
    }

    // ====================================================================
    // CRUD PRESTASI
    // ====================================================================
public function addPrestasi(Request $request)
{
    $request->validate([
        'nama_prestasi' => 'required|string|max:255',
        'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        'gambar_url'    => 'nullable|url',
    ], [
        'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
        'gambar.image'           => 'File harus berupa gambar.',
        'gambar.mimes'           => 'Format gambar harus jpeg, png, jpg, atau webp.',
        'gambar.max'             => 'Ukuran gambar maksimal 10MB.',
        'gambar_url.url'         => 'URL gambar tidak valid.',
    ]);

    try {
        $gambar = null;

        // Prioritas: upload file > URL > null
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('prestasi', 'public');
            $gambar = asset('storage/' . $path);
        } elseif ($request->filled('gambar_url')) {
            $gambar = $request->gambar_url;
        }

        Prestasi::create([
            'nama_prestasi' => $request->nama_prestasi,
            'gambar'        => $gambar,
        ]);

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menambahkan prestasi!');
    }
}

public function updatePrestasi($id, Request $request)
{
    $prestasi = Prestasi::findOrFail($id);

    $request->validate([
        'nama_prestasi' => 'required|string|max:255',
        'gambar'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        'gambar_url'    => 'nullable|url',
    ], [
        'nama_prestasi.required' => 'Nama prestasi wajib diisi.',
        'gambar.image'           => 'File harus berupa gambar.',
        'gambar.max'             => 'Ukuran gambar maksimal 10MB.',
        'gambar_url.url'         => 'URL gambar tidak valid.',
    ]);

    try {
        $gambar = $prestasi->gambar;

        // Jika upload file baru
        if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
            // Hapus gambar lama jika dari storage lokal
            if ($prestasi->gambar && str_starts_with($prestasi->gambar, asset('storage/'))) {
                $oldPath = str_replace(asset('storage/'), '', $prestasi->gambar);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('gambar')->store('prestasi', 'public');
            $gambar = asset('storage/' . $path);
        } elseif ($request->filled('gambar_url')) {
            // Hapus gambar lama jika ada
            if ($prestasi->gambar && str_starts_with($prestasi->gambar, asset('storage/'))) {
                $oldPath = str_replace(asset('storage/'), '', $prestasi->gambar);
                Storage::disk('public')->delete($oldPath);
            }
            $gambar = $request->gambar_url;
        }

        $prestasi->update([
            'nama_prestasi' => $request->nama_prestasi,
            'gambar'        => $gambar,
        ]);

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal memperbarui prestasi!');
    }
}

public function editPrestasi($id)
{
    $prestasi = Prestasi::findOrFail($id);
    return view('admin.prestasi-edit', compact('prestasi'));
}

public function deletePrestasi($id)
{
    try {
        $prestasi = Prestasi::findOrFail($id);

        // Hapus gambar jika dari storage lokal
        if ($prestasi->gambar && str_starts_with($prestasi->gambar, asset('storage/'))) {
            $oldPath = str_replace(asset('storage/'), '', $prestasi->gambar);
            Storage::disk('public')->delete($oldPath);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi')->with('success', 'Prestasi berhasil dihapus!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menghapus prestasi!');
    }
}
public function managePrestasi()
{
    $akreditasi = Akreditasi::firstOrCreate(
        ['id' => 1], 
        [
            'peringkat'   => 'A',
            'nomor_sk'    => '1179/BAN-SM/SK/2021',
            'tanggal_sk'  => '2021-11-16',
            'keterangan'  => 'Terakreditasi A (Sangat Baik) oleh BAN-S/M',
        ]
    );

    $prestasi = Prestasi::latest()->get();

    return view('admin.prestasi', compact('akreditasi', 'prestasi'));
}

public function updateAkreditasi(Request $request)
{
    $request->validate([
        'peringkat'   => 'required|string|max:10',
        'nomor_sk'     => 'required|string|max:255',
        'tanggal_sk'  => 'required|date',
        'keterangan'  => 'nullable|string',
    ]);

    $akreditasi = Akreditasi::first(); 
    $akreditasi->update($request->only(['peringkat', 'nomor_sk', 'tanggal_sk', 'keterangan']));

    return back()->with('success', 'Data akreditasi berhasil diperbarui!');
}

    // ====================================================================
    // HALAMAN LAIN (Sejarah, Visi Misi, Kurikulum, Galeri) 
    // ====================================================================
    public function showSejarah()
    {
        $sejarah = Sejarah::firstOrCreate(['id' => 1], [
            'content' => '',
            'image' => null
        ]);

        return view('admin.sejarah', compact('sejarah'));
    }

    public function showVisiMisi()
    {
        $visiMisi = VisiMisi::first();
        return view('admin.visi-misi', compact('visiMisi'));
    }

    public function manageKurikulum()
    {
        $kurikulum = Kurikulum::first();
        return view('admin.kurikulum', compact('kurikulum'));
    }

    public function manageGaleri()
    {
        $galeri = Galeri::all();
        return view('admin.galeri', compact('galeri'));
    }
}