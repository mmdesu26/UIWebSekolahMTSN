<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sejarah;
use Illuminate\Support\Facades\Storage;

class AdminSejarahController extends Controller
{
    /**
     * Display the sejarah management page
     */
    public function index()
    {
        $sejarah = Sejarah::first();
        
        // Create default record if not exists
        if (!$sejarah) {
            $sejarah = Sejarah::create([
                'image' => null,
                'content' => ''
            ]);
        }

        return view('admin.sejarah', compact('sejarah'));
    }

    /**
     * Update sejarah content and image
     */
    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'content.required' => 'Konten sejarah tidak boleh kosong!',
            'image.image' => 'File harus berupa gambar!',
            'image.mimes' => 'Format gambar harus: jpeg, png, jpg, atau gif!',
            'image.max' => 'Ukuran gambar maksimal 2MB!'
        ]);

        $sejarah = Sejarah::first();

        if (!$sejarah) {
            $sejarah = new Sejarah();
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($sejarah->image && Storage::disk('public')->exists($sejarah->image)) {
                Storage::disk('public')->delete($sejarah->image);
            }

            // Store new image
            $imagePath = $request->file('image')->store('sejarah', 'public');
            $sejarah->image = $imagePath;
        }

        // Update content
        $sejarah->content = $request->content;
        $sejarah->save();

        return redirect()->route('admin.sejarah.index')
            ->with('success', 'Sejarah berhasil diperbarui!');
    }

    /**
     * Delete sejarah image via AJAX
     */
    public function deleteImage(Request $request)
    {
        try {
            $sejarah = Sejarah::first();

            if ($sejarah && $sejarah->image) {
                // Delete image from storage
                if (Storage::disk('public')->exists($sejarah->image)) {
                    Storage::disk('public')->delete($sejarah->image);
                }

                // Update database
                $sejarah->image = null;
                $sejarah->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Gambar berhasil dihapus!'
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Gambar tidak ditemukan!'
            ], 404);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}