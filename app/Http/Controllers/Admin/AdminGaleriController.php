<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::latest()->get();
        
        // Convert to array format untuk kompatibilitas dengan view yang ada
        $galeriArray = $galeri->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'gambar' => $item->gambar,
                'embed_link' => $item->embed_link,
                'tipe' => $item->tipe
            ];
        })->toArray();

        return view('admin.galeri', ['galeri' => $galeriArray]);
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,mp4,webm,ogg,mov|max:51200',
            'embed_link' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        }

        try {
            $data = [
                'judul' => $request->judul,
                'embed_link' => $request->embed_link,
            ];

            // Prioritas: embed_link > file upload
            if ($request->filled('embed_link')) {
                // Jika ada embed link, set tipe embed dan generate thumbnail
                $data['tipe'] = 'embed';
                $data['gambar'] = $this->extractThumbnail($request->embed_link);
            } elseif ($request->hasFile('gambar')) {
                // Jika tidak ada embed, process file upload
                $file = $request->file('gambar');
                $extension = $file->getClientOriginalExtension();
                
                // Tentukan tipe media
                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                $videoExtensions = ['mp4', 'webm', 'ogg', 'mov'];
                
                if (in_array(strtolower($extension), $imageExtensions)) {
                    $data['tipe'] = 'image';
                    $folder = 'galeri/images';
                } elseif (in_array(strtolower($extension), $videoExtensions)) {
                    $data['tipe'] = 'video';
                    $folder = 'galeri/videos';
                } else {
                    return redirect()->back()
                        ->with('error', 'Format file tidak didukung.');
                }

                // Generate unique filename
                $filename = time() . '_' . uniqid() . '.' . $extension;
                
                // Store file
                $path = $file->storeAs($folder, $filename, 'public');
                $data['gambar'] = '/storage/' . $path;
            } else {
                return redirect()->back()
                    ->with('error', 'Harap upload gambar/video atau masukkan embed link.');
            }

            Galeri::create($data);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Media berhasil ditambahkan!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menambahkan media: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|string|max:500',
            'embed_link' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('error', 'Validasi gagal. Periksa kembali input Anda.');
        }

        try {
            $galeri = Galeri::findOrFail($id);
            
            $data = [
                'judul' => $request->judul,
                'embed_link' => $request->embed_link,
            ];

            // Prioritas: embed_link > gambar URL
            if ($request->filled('embed_link')) {
                $data['tipe'] = 'embed';
                $data['gambar'] = $this->extractThumbnail($request->embed_link);
            } elseif ($request->filled('gambar')) {
                // Update gambar URL jika diisi
                $data['gambar'] = $request->gambar;
                
                // Tentukan tipe berdasarkan ekstensi
                if (preg_match('/\.(mp4|webm|ogg|mov)$/i', $request->gambar)) {
                    $data['tipe'] = 'video';
                } else {
                    $data['tipe'] = 'image';
                }
            }

            $galeri->update($data);

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Media berhasil diperbarui!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal memperbarui media: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $galeri = Galeri::findOrFail($id);
            
            // Hapus file jika ada dan bukan URL eksternal
            if ($galeri->gambar && str_starts_with($galeri->gambar, '/storage/')) {
                $filePath = str_replace('/storage/', '', $galeri->gambar);
                Storage::disk('public')->delete($filePath);
            }
            
            $galeri->delete();

            return redirect()->route('admin.galeri.index')
                ->with('success', 'Media berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Gagal menghapus media: ' . $e->getMessage());
        }
    }

    /**
     * Extract thumbnail from embed link
     */
    private function extractThumbnail($url)
    {
        // YouTube thumbnail
        if (preg_match('/youtube\.com\/watch\?v=([^&]+)/', $url, $matches)) {
            return 'https://img.youtube.com/vi/' . $matches[1] . '/maxresdefault.jpg';
        }
        
        if (preg_match('/youtu\.be\/([^?]+)/', $url, $matches)) {
            return 'https://img.youtube.com/vi/' . $matches[1] . '/maxresdefault.jpg';
        }

        // TikTok - extract video ID and use placeholder
        if (preg_match('/tiktok\.com\/@[^\/]+\/video\/(\d+)/', $url, $matches)) {
            // TikTok doesn't provide direct thumbnail API, use placeholder with video ID
            return 'https://www.tiktok.com/oembed?url=' . urlencode($url);
        }

        // Instagram - extract post ID
        if (preg_match('/instagram\.com\/p\/([^\/\?]+)/', $url, $matches)) {
            return 'https://www.instagram.com/p/' . $matches[1] . '/media/?size=l';
        }

        // Default placeholder
        return 'https://via.placeholder.com/400x300/2d6a4f/ffffff?text=Media+Embed';
    }
}