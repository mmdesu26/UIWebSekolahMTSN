<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua jadwal dan kelompokkan
        $jadwal = JadwalPelajaran::orderBy('kelas')
            ->orderBy('urutan')
            ->get()
            ->groupBy(['kelas', 'hari']);

        $hariList = JadwalPelajaran::getHariList();
        $kelasList = JadwalPelajaran::getKelasList();

        return view('admin.jadwal', compact('jadwal', 'hariList', 'kelasList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required|in:7,8,9',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'mata_pelajaran' => 'required|string|max:100',
            'is_istirahat' => 'nullable',
            'urutan' => 'nullable|integer'
        ], [
            'kelas.required' => 'Kelas harus dipilih',
            'kelas.in' => 'Kelas tidak valid',
            'hari.required' => 'Hari harus dipilih',
            'hari.in' => 'Hari tidak valid',
            'jam_mulai.required' => 'Jam mulai harus diisi',
            'jam_selesai.required' => 'Jam selesai harus diisi',
            'mata_pelajaran.required' => 'Mata pelajaran harus diisi',
            'mata_pelajaran.max' => 'Mata pelajaran maksimal 100 karakter'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validasi gagal! Periksa kembali input Anda.');
        }

        try {
            // Jika urutan tidak diisi, ambil urutan terakhir + 1
            $urutan = $request->urutan;
            if (!$urutan) {
                $lastUrutan = JadwalPelajaran::where('kelas', $request->kelas)
                    ->where('hari', $request->hari)
                    ->max('urutan');
                $urutan = $lastUrutan ? $lastUrutan + 1 : 1;
            }

            JadwalPelajaran::create([
                'kelas' => $request->kelas,
                'hari' => $request->hari,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'mata_pelajaran' => $request->mata_pelajaran,
                'is_istirahat' => $request->has('is_istirahat') ? 1 : 0,
                'urutan' => $urutan
            ]);

            return redirect()->route('admin.jadwal.index')
                ->with('success', 'Jadwal pelajaran berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required|in:7,8,9',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'mata_pelajaran' => 'required|string|max:100',
            'is_istirahat' => 'nullable',
            'urutan' => 'nullable|integer'
        ], [
            'kelas.required' => 'Kelas harus dipilih',
            'kelas.in' => 'Kelas tidak valid',
            'hari.required' => 'Hari harus dipilih',
            'hari.in' => 'Hari tidak valid',
            'jam_mulai.required' => 'Jam mulai harus diisi',
            'jam_selesai.required' => 'Jam selesai harus diisi',
            'mata_pelajaran.required' => 'Mata pelajaran harus diisi',
            'mata_pelajaran.max' => 'Mata pelajaran maksimal 100 karakter'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Validasi gagal! Periksa kembali input Anda.');
        }

        try {
            $jadwal = JadwalPelajaran::findOrFail($id);
            
            $jadwal->update([
                'kelas' => $request->kelas,
                'hari' => $request->hari,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
                'mata_pelajaran' => $request->mata_pelajaran,
                'is_istirahat' => $request->has('is_istirahat') ? 1 : 0,
                'urutan' => $request->urutan ?? $jadwal->urutan
            ]);

            return redirect()->route('admin.jadwal.index')
                ->with('success', 'Jadwal pelajaran berhasil diperbarui!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Jadwal tidak ditemukan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $jadwal = JadwalPelajaran::findOrFail($id);
            $jadwal->delete();

            return redirect()->route('admin.jadwal.index')
                ->with('success', 'Jadwal pelajaran berhasil dihapus!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()
                ->with('error', 'Jadwal tidak ditemukan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Duplicate jadwal from one class to another
     */
    public function duplicate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from_kelas' => 'required|in:7,8,9',
            'to_kelas' => 'required|in:7,8,9|different:from_kelas'
        ], [
            'from_kelas.required' => 'Kelas sumber harus dipilih',
            'to_kelas.required' => 'Kelas tujuan harus dipilih',
            'to_kelas.different' => 'Kelas tujuan harus berbeda dengan kelas sumber'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Validasi gagal! Pilih kelas yang berbeda.');
        }

        try {
            // Cek apakah kelas sumber punya jadwal
            $jadwalSource = JadwalPelajaran::where('kelas', $request->from_kelas)->get();
            
            if ($jadwalSource->isEmpty()) {
                return redirect()->back()
                    ->with('error', "Kelas {$request->from_kelas} tidak memiliki jadwal untuk disalin!");
            }

            // Hapus jadwal kelas tujuan jika ada
            JadwalPelajaran::where('kelas', $request->to_kelas)->delete();

            // Salin jadwal
            foreach ($jadwalSource as $jadwal) {
                JadwalPelajaran::create([
                    'kelas' => $request->to_kelas,
                    'hari' => $jadwal->hari,
                    'jam_mulai' => $jadwal->jam_mulai,
                    'jam_selesai' => $jadwal->jam_selesai,
                    'mata_pelajaran' => $jadwal->mata_pelajaran,
                    'is_istirahat' => $jadwal->is_istirahat,
                    'urutan' => $jadwal->urutan
                ]);
            }

            return redirect()->route('admin.jadwal.index')
                ->with('success', "Jadwal kelas {$request->from_kelas} berhasil disalin ke kelas {$request->to_kelas}!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}