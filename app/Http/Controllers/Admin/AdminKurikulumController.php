<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use Illuminate\Http\Request;

class AdminKurikulumController extends Controller
{
    /**
     * Tampilkan halaman kelola kurikulum
     */
    public function index()
    {
        // Ambil data kurikulum pertama atau null jika belum ada
        $kurikulum = Kurikulum::first();
        
        return view('admin.kurikulum', compact('kurikulum'));
    }

    /**
     * Update atau create data kurikulum
     */
    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_kurikulum' => 'required|string|max:255',
            'deskripsi_kurikulum' => 'required|string',
            'tujuan_kurikulum' => 'required|string',
            'projek_penguatan' => 'required|string',
        ], [
            'nama_kurikulum.required' => 'Nama kurikulum wajib diisi',
            'deskripsi_kurikulum.required' => 'Deskripsi kurikulum wajib diisi',
            'tujuan_kurikulum.required' => 'Tujuan kurikulum wajib diisi',
            'projek_penguatan.required' => 'Projek penguatan wajib diisi',
        ]);

        try {
            // Cek apakah sudah ada data kurikulum
            $kurikulum = Kurikulum::first();

            if ($kurikulum) {
                // Update data yang sudah ada
                $kurikulum->update($validated);
                $message = 'Data kurikulum berhasil diperbarui!';
            } else {
                // Buat data baru jika belum ada
                Kurikulum::create($validated);
                $message = 'Data kurikulum berhasil ditambahkan!';
            }

            return redirect()->route('admin.kurikulum.index')
                ->with('success', $message);

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete data kurikulum (opsional, jika perlu)
     */
    public function delete()
    {
        $kurikulum = Kurikulum::first();
        if ($kurikulum) {
            $kurikulum->delete();
            return redirect()->route('admin.kurikulum.index')
                ->with('success', 'Data kurikulum berhasil dihapus!');
        }

        return redirect()->back()->with('error', 'Tidak ada data kurikulum untuk dihapus.');
    }
}