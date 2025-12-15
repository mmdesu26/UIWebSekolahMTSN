<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminFasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitasUtama = Fasilitas::kategori('utama')->ordered()->get();
        $fasilitasPendukung = Fasilitas::kategori('pendukung')->ordered()->get();

        return view('admin.fasilitas.index', compact('fasilitasUtama', 'fasilitasPendukung'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'required|string|max:100',
            'kategori' => 'required|in:utama,pendukung',
            'fitur' => 'nullable|array',
            'fitur.*' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Filter fitur yang tidak kosong
        $fitur = array_filter($request->fitur ?? [], function($item) {
            return !empty(trim($item));
        });

        Fasilitas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon,
            'kategori' => $request->kategori,
            'fitur' => array_values($fitur), // Reset array keys
            'urutan' => $request->urutan ?? 0,
            'is_active' => $request->has('is_active') ? true : false
        ]);

        return redirect()->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        return view('admin.fasilitas.edit', compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'icon' => 'required|string|max:100',
            'kategori' => 'required|in:utama,pendukung',
            'fitur' => 'nullable|array',
            'fitur.*' => 'nullable|string|max:255',
            'urutan' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $fasilitas = Fasilitas::findOrFail($id);

        // Filter fitur yang tidak kosong
        $fitur = array_filter($request->fitur ?? [], function($item) {
            return !empty(trim($item));
        });

        $fasilitas->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'icon' => $request->icon,
            'kategori' => $request->kategori,
            'fitur' => array_values($fitur),
            'urutan' => $request->urutan ?? 0,
            'is_active' => $request->has('is_active') ? true : false
        ]);

        return redirect()->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();

        return redirect()->route('admin.fasilitas.index')
            ->with('success', 'Fasilitas berhasil dihapus!');
    }

    /**
     * Toggle active status
     */
    public function toggleStatus($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->update([
            'is_active' => !$fasilitas->is_active
        ]);

        return redirect()->route('admin.fasilitas.index')
            ->with('success', 'Status fasilitas berhasil diubah!');
    }
}