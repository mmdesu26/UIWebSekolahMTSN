<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminStrukturController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::getInstance();
        $strukturGambar = $struktur->gambar_path;

        $guru = Guru::orderBy('nama', 'asc')->get();

        return view('admin.struktur-organisasi', compact('strukturGambar', 'guru'));
    }

    // ========================
    // GAMBAR STRUKTUR ORGANISASI
    // ========================

    public function uploadStruktur(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $struktur = StrukturOrganisasi::getInstance();

        // Hapus gambar lama
        if ($struktur->gambar_path) {
            Storage::disk('public')->delete($struktur->gambar_path);
        }

        $path = $request->file('gambar')->store('struktur-organisasi', 'public');
        $struktur->update(['gambar_path' => $path]);

        return back()->with('success', 'Gambar struktur organisasi berhasil diupload!');
    }

    public function deleteStruktur()
    {
        $struktur = StrukturOrganisasi::getInstance();
        if ($struktur->gambar_path) {
            Storage::disk('public')->delete($struktur->gambar_path);
        }
        $struktur->update(['gambar_path' => null]);

        return back()->with('success', 'Gambar struktur organisasi berhasil dihapus!');
    }

    // ========================
    // CRUD GURU (dengan foto!)
    // ========================

    public function storeGuru(Request $request)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'nip'            => 'nullable|string|max:30',
            'email'          => 'nullable|email|max:255',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = $request->only(['nama', 'mata_pelajaran', 'nip', 'email']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        Guru::create($data);

        return back()->with('success', 'Guru berhasil ditambahkan!');
    }

    public function updateGuru(Request $request, Guru $guru) // Route Model Binding!
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'nip'            => 'nullable|string|max:30',
            'email'          => 'nullable|email|max:255',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = $request->only(['nama', 'mata_pelajaran', 'nip', 'email']);

        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($guru->foto) {
                Storage::disk('public')->delete($guru->foto);
            }
            $data['foto'] = $request->file('foto')->store('guru', 'public');
        }

        $guru->update($data);

        return back()->with('success', 'Data guru berhasil diperbarui!');
    }

    public function deleteGuru(Guru $guru) // Route Model Binding lagi!
    {
        if ($guru->foto) {
            Storage::disk('public')->delete($guru->foto);
        }

        $guru->delete();

        return back()->with('success', 'Guru berhasil dihapus!');
    }
}