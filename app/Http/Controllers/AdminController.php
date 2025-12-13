<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Models
|--------------------------------------------------------------------------
*/
// ===== kode dira =====
use App\Models\News;
use App\Models\Ekstrakurikuler;
use App\Models\SiteSetting;
use App\Models\Ppdb;

// ===== kode leni =====
use App\Models\Sejarah;
use App\Models\VisiMisi;
use App\Models\Kurikulum;
use App\Models\Galeri;

/*
|--------------------------------------------------------------------------
| Laravel Support
|--------------------------------------------------------------------------
*/
// ===== kode dira =====
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    // ====================================================================
    // DASHBOARD
    // ====================================================================
    // ===== kode dira (dipakai sebagai utama, database-based) =====
    public function dashboard()
    {
        $totalGuru            = 85;
        $totalEkstrakurikuler = Ekstrakurikuler::count();
        $totalBerita          = News::count();
        $totalGaleri          = Galeri::count(); // kode leni digabung

        $guruTerbaru = [
            ['nama' => 'Dr. Hj. Siti Aminah, M.Pd', 'mata_pelajaran' => 'Pendidikan Agama Islam'],
            ['nama' => 'Drs. Ahmad Subandi', 'mata_pelajaran' => 'Matematika'],
            ['nama' => 'Siti Nurhaliza, S.Pd', 'mata_pelajaran' => 'Bahasa Indonesia'],
        ];

        $beritaTerbaru = News::latest()->take(5)->get();

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
    // ===== kode dira =====
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    // ===== kode dira =====
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

    // ===== kode dira =====
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
    // ===== kode dira =====
    public function manageBerita()
    {
        $berita = News::latest()->get();
        return view('admin.berita', compact('berita'));
    }

    // ===== kode dira =====
    public function addBerita(Request $request)
    {
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

    // ===== kode dira =====
    public function deleteBerita($id)
    {
        News::findOrFail($id)->delete();
        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus!');
    }

    // ====================================================================
    // CRUD EKSTRAKURIKULER
    // ====================================================================
    // ===== kode dira =====
    public function manageEkstrakurikuler()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler', compact('ekstrakurikuler'));
    }

    // ====================================================================
    // CRUD SEJARAH
    // ====================================================================
    // ===== kode leni =====
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
    // ===== kode leni =====
    public function showVisiMisi()
    {
        $visiMisi = VisiMisi::first();
        return view('admin.visi-misi', compact('visiMisi'));
    }

    // ====================================================================
    // CRUD KURIKULUM
    // ====================================================================
    // ===== kode leni =====
    public function manageKurikulum()
    {
        $kurikulum = Kurikulum::first();
        return view('admin.kurikulum', compact('kurikulum'));
    }

    // ====================================================================
    // CRUD GALERI
    // ====================================================================
    // ===== kode leni =====
    public function manageGaleri()
    {
        $galeri = Galeri::all();
        return view('admin.galeri', compact('galeri'));
    }

    // ====================================================================
    // CRUD PPDB
    // ====================================================================
    // ===== kode dira =====
    public function managePpdb()
    {
        $ppdb = Ppdb::first();
        return view('admin.ppdb', compact('ppdb'));
    }

    // ====================================================================
    // SITE SETTINGS
    // ====================================================================
    // ===== kode dira =====
    public function manageSettings()
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        return view('admin.settings', compact('settings'));
    }
}
