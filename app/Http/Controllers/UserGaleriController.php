<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class UserGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::latest()->get();
        
        // Convert to array format untuk kompatibilitas dengan view
        $galeriArray = $galeri->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'gambar' => $item->gambar,
                'tanggal' => $item->created_at->format('Y-m-d'),
                'tipe' => $item->tipe,
                'embed_link' => $item->embed_link
            ];
        })->toArray();

        return view('user.galeri', ['galeri' => $galeriArray]);
    }

    /**
     * Display galeri by category/type
     */
    public function kategori($kategori)
    {
        // Map kategori ke tipe
        $tipeMap = [
            'foto' => 'image',
            'video' => 'video',
            'embed' => 'embed'
        ];

        $tipe = $tipeMap[$kategori] ?? 'image';

        $galeri = Galeri::where('tipe', $tipe)->latest()->get();
        
        $galeriArray = $galeri->map(function($item) {
            return [
                'id' => $item->id,
                'judul' => $item->judul,
                'gambar' => $item->gambar, // Gambar sudah berisi thumbnail untuk semua tipe
                'tanggal' => $item->created_at->format('Y-m-d'),
                'tipe' => $item->tipe,
                'embed_link' => $item->embed_link
            ];
        })->toArray();

        return view('user.galeri', [
            'galeri' => $galeriArray,
            'kategori' => $kategori
        ]);
    }
}