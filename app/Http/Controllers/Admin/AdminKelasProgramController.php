<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KelasProgram;
use Illuminate\Http\Request;

class AdminKelasProgramController extends Controller
{
    // Halaman utama - list semua program
    public function index()
    {
        $programs = KelasProgram::orderBy('kategori')->orderBy('urutan')->get();
        return view('admin.kelas_program.index', compact('programs'));
    }

    // Halaman create
    public function create()
    {
        $icons = $this->getAvailableIcons();
        $colors = $this->getAvailableColors();
        return view('admin.kelas_program.create', compact('icons', 'colors'));
    }

    // Store program baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'icon_class' => 'required',
            'warna' => 'required',
            'kategori' => 'required|in:unggulan,kelas',
            'urutan' => 'required|integer',
            'fitur' => 'nullable|array',
            'fitur.*' => 'nullable|string'
        ]);

        $data = $request->all();
        
        // Filter fitur yang kosong
        if ($request->has('fitur')) {
            $data['fitur'] = array_filter($request->fitur, function($value) {
                return !empty(trim($value));
            });
        }

        $data['is_active'] = $request->has('is_active');

        KelasProgram::create($data);

        return redirect()->route('admin.kelas-program.index')
            ->with('success', 'Program berhasil ditambahkan!');
    }

    // Halaman edit
    public function edit($id)
    {
        $program = KelasProgram::findOrFail($id);
        $icons = $this->getAvailableIcons();
        $colors = $this->getAvailableColors();
        return view('admin.kelas_program.edit', compact('program', 'icons', 'colors'));
    }

    // Update program
    public function update(Request $request, $id)
    {
        $program = KelasProgram::findOrFail($id);

        $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'required',
            'icon_class' => 'required',
            'warna' => 'required',
            'kategori' => 'required|in:unggulan,kelas',
            'urutan' => 'required|integer',
            'fitur' => 'nullable|array',
            'fitur.*' => 'nullable|string'
        ]);

        $data = $request->all();
        
        // Filter fitur yang kosong
        if ($request->has('fitur')) {
            $data['fitur'] = array_filter($request->fitur, function($value) {
                return !empty(trim($value));
            });
        }

        $data['is_active'] = $request->has('is_active');

        $program->update($data);

        return redirect()->route('admin.kelas-program.index')
            ->with('success', 'Program berhasil diperbarui!');
    }

    // Delete program
    public function destroy($id)
    {
        $program = KelasProgram::findOrFail($id);
        $program->delete();

        return redirect()->route('admin.kelas-program.index')
            ->with('success', 'Program berhasil dihapus!');
    }

    // Helper: Daftar icon yang tersedia
    private function getAvailableIcons()
    {
        return [
            'fa-flask' => 'Flask (Sains)',
            'fa-atom' => 'Atom (Sains)',
            'fa-microscope' => 'Mikroskop',
            'fa-dna' => 'DNA',
            'fa-language' => 'Bahasa',
            'fa-globe-americas' => 'Globe',
            'fa-book-open' => 'Buku Terbuka',
            'fa-quran' => 'Al-Quran',
            'fa-mosque' => 'Masjid',
            'fa-pray' => 'Doa',
            'fa-running' => 'Olahraga',
            'fa-trophy' => 'Trophy',
            'fa-medal' => 'Medal',
            'fa-futbol' => 'Sepak Bola',
            'fa-basketball-ball' => 'Basket',
            'fa-laptop-code' => 'Coding',
            'fa-microchip' => 'Chip IT',
            'fa-robot' => 'Robot',
            'fa-code' => 'Kode',
            'fa-graduation-cap' => 'Wisuda',
            'fa-chalkboard-teacher' => 'Guru',
            'fa-user-graduate' => 'Mahasiswa',
            'fa-star' => 'Bintang',
            'fa-lightbulb' => 'Lampu Ide',
            'fa-brain' => 'Otak',
            'fa-palette' => 'Seni',
            'fa-music' => 'Musik',
            'fa-camera' => 'Fotografi',
            'fa-video' => 'Video',
            'fa-pencil-alt' => 'Menulis',
        ];
    }

    // Helper: Daftar warna yang tersedia
    private function getAvailableColors()
    {
        return [
            '#9B59B6' => 'Ungu',
            '#3498DB' => 'Biru',
            '#1ABC9C' => 'Tosca',
            '#2ECC71' => 'Hijau',
            '#F39C12' => 'Oranye',
            '#E74C3C' => 'Merah',
            '#E91E63' => 'Pink',
            '#9C27B0' => 'Ungu Tua',
            '#673AB7' => 'Deep Purple',
            '#3F51B5' => 'Indigo',
            '#00BCD4' => 'Cyan',
            '#009688' => 'Teal',
            '#8BC34A' => 'Light Green',
            '#FF5722' => 'Deep Orange',
            '#795548' => 'Coklat',
        ];
    }
}