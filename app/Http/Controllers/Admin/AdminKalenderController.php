<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KalenderPendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminKalenderController extends Controller
{
    /**
     * Tampilkan halaman daftar kalender pendidikan
     */
    public function index()
    {
        $kalenders = KalenderPendidikan::orderBy('tanggal_mulai', 'asc')->get();
        
        return view('admin.kalender', compact('kalenders'));
    }

    /**
     * Tampilkan halaman form tambah kalender
     */
    public function create()
    {
        return view('admin.create-kalender');
    }

    /**
     * Simpan kalender baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'semester' => 'required|in:ganjil,genap',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:akademik,libur,kegiatan,ujian,penting',
        ], [
            'semester.required' => 'Semester wajib dipilih',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai',
            'judul.required' => 'Judul kegiatan wajib diisi',
            'keterangan.required' => 'Keterangan wajib diisi',
            'kategori.required' => 'Kategori wajib dipilih',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan kalender. Periksa kembali inputan Anda.');
        }

        try {
            KalenderPendidikan::create([
                'semester' => $request->semester,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'kategori' => $request->kategori,
                'is_active' => true
            ]);

            return redirect()->route('admin.kalender.index')
                ->with('success', 'Kalender pendidikan berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Tampilkan halaman form edit kalender
     */
    public function edit($id)
    {
        $kalender = KalenderPendidikan::findOrFail($id);
        
        return view('admin.edit-kalender', compact('kalender'));
    }

    /**
     * Update kalender yang ada
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'semester' => 'required|in:ganjil,genap',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'judul' => 'required|string|max:255',
            'keterangan' => 'required|string',
            'kategori' => 'required|in:akademik,libur,kegiatan,ujian,penting',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Gagal mengupdate kalender. Periksa kembali inputan Anda.');
        }

        try {
            $kalender = KalenderPendidikan::findOrFail($id);
            
            $kalender->update([
                'semester' => $request->semester,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'judul' => $request->judul,
                'keterangan' => $request->keterangan,
                'kategori' => $request->kategori,
            ]);

            return redirect()->route('admin.kalender.index')
                ->with('success', 'Kalender pendidikan berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Hapus kalender
     */
    public function destroy($id)
    {
        try {
            $kalender = KalenderPendidikan::findOrFail($id);
            $kalender->delete();

            return redirect()->route('admin.kalender.index')
                ->with('success', 'Kalender pendidikan berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle status aktif/nonaktif
     */
    public function toggleStatus($id)
    {
        try {
            $kalender = KalenderPendidikan::findOrFail($id);
            $kalender->is_active = !$kalender->is_active;
            $kalender->save();

            $status = $kalender->is_active ? 'diaktifkan' : 'dinonaktifkan';

            return redirect()->route('admin.kalender.index')
                ->with('success', "Kalender pendidikan berhasil {$status}!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}