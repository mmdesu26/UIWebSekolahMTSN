<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminVisiMisiController extends Controller
{
    /**
     * Display the visi misi management page
     */
    public function index()
    {
        $visiMisi = VisiMisi::getFirst();
        
        return view('admin.visi-misi', [
            'visiMisi' => [
                'visi' => $visiMisi->visi,
                'misi' => $visiMisi->misi
            ]
        ]);
    }

    /**
     * Update visi and misi
     */
    public function update(Request $request)
    {
        // Validation
        $validator = Validator::make($request->all(), [
            'visi' => 'required|string|max:500',
            'misi' => 'required|string|max:1000',
        ], [
            'visi.required' => 'Visi wajib diisi',
            'visi.max' => 'Visi maksimal 500 karakter',
            'misi.required' => 'Misi wajib diisi',
            'misi.max' => 'Misi maksimal 1000 karakter',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $visiMisi = VisiMisi::getFirst();
            
            $visiMisi->update([
                'visi' => trim($request->visi),
                'misi' => trim($request->misi)
            ]);

            return redirect()
                ->route('admin.visi-misi.index')
                ->with('success', 'Data visi & misi berhasil diperbarui');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Reset to default values
     */
    public function reset()
    {
        try {
            $visiMisi = VisiMisi::getFirst();
            
            $visiMisi->update([
                'visi' => 'Menjadi lembaga pendidikan Islam yang unggul dalam prestasi, berakhlak mulia, dan berwawasan global.',
                'misi' => "1. Menyelenggarakan pendidikan yang berkualitas berdasarkan nilai-nilai Islam\n2. Mengembangkan potensi peserta didik secara optimal\n3. Menciptakan lingkungan belajar yang kondusif dan inspiratif\n4. Membangun karakter peserta didik yang berakhlak mulia\n5. Mempersiapkan generasi yang kompeten dan berdaya saing global"
            ]);

            return redirect()
                ->route('admin.visi-misi.index')
                ->with('success', 'Data visi & misi berhasil direset ke default');

        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}