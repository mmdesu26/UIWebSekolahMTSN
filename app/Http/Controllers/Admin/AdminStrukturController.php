<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AdminStrukturController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::getInstance();
        $strukturGambar = $struktur->gambar_path;

        $guru = Guru::orderBy('nama', 'asc')->get();
        $jumlah_guru = $guru->count();

        return view('admin.struktur-organisasi', compact('strukturGambar', 'guru', 'jumlah_guru'));
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

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('guru', 'public');
            $data['foto'] = $fotoPath;
            
            Log::info('Foto guru berhasil diupload', [
                'nama' => $data['nama'],
                'foto_path' => $fotoPath
            ]);
        }

        $guru = Guru::create($data);

        return back()->with('success', 'Guru "' . $guru->nama . '" berhasil ditambahkan!');
    }

    // ✅ METHOD BARU: Tampilkan halaman edit guru
    public function editGuru(Guru $guru)
    {
        return view('admin.edit-guru', compact('guru'));
    }

    public function updateGuru(Request $request, Guru $guru)
    {
        $request->validate([
            'nama'           => 'required|string|max:255',
            'mata_pelajaran' => 'required|string|max:255',
            'nip'            => 'nullable|string|max:30',
            'email'          => 'nullable|email|max:255',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ]);

        $data = $request->only(['nama', 'mata_pelajaran', 'nip', 'email']);

        // Handle upload foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
                Log::info('Foto lama dihapus', ['foto' => $guru->foto]);
            }
            
            // Upload foto baru
            $fotoPath = $request->file('foto')->store('guru', 'public');
            $data['foto'] = $fotoPath;
            
            Log::info('Foto guru berhasil diupdate', [
                'nama' => $data['nama'],
                'foto_path' => $fotoPath
            ]);
        }

        $guru->update($data);

        // ✅ Redirect ke halaman struktur organisasi (bukan back())
        return redirect()->route('admin.struktur.index')->with('success', 'Data guru "' . $guru->nama . '" berhasil diperbarui!');
    }

    public function deleteGuru(Guru $guru)
    {
        $namaGuru = $guru->nama;
        
        // Foto akan otomatis terhapus oleh Model::boot() deleting event
        $guru->delete();

        Log::info('Guru dihapus', ['nama' => $namaGuru]);

        return back()->with('success', 'Guru "' . $namaGuru . '" berhasil dihapus!');
    }
}