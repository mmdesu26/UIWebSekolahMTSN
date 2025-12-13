<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe'  => 'required|in:berita,pengumuman,kegiatan',
            'konten'=> 'required|string',
        ]);

        News::create([
            'title'   => $request->judul,
            'slug'    => Str::slug($request->judul),
            'tipe'    => $request->tipe,
            'content' => $request->konten,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function update(Request $request, News $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe'  => 'required|in:berita,pengumuman,kegiatan',
            'konten'=> 'required|string',
        ]);

        $berita->update([
            'title'   => $request->judul,
            'slug'    => Str::slug($request->judul),
            'tipe'    => $request->tipe,
            'content' => $request->konten,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(News $berita)
    {
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }

    // Untuk user frontend
public function showUserNews()
{
    $berita = News::latest()->paginate(9); // Pakai pagination biar rapi
    return view('user.berita', compact('berita'));
}

public function index()
{
    $berita = News::published()->latest('news_date')->latest()->paginate(12);
    return view('user.berita', compact('berita'));
}

public function show($slug)
{
    $berita = News::published()->where('slug', $slug)->firstOrFail();
    return view('user.berita-detail', compact('berita'));
}
}