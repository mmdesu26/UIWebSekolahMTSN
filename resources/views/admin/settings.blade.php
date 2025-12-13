@extends('layouts.admin')

@section('title', 'Settings Beranda')
@section('page-title', 'Settings Beranda')

@section('content')
<div class="card">
    <div class="card-header"><h3>Edit Konten Beranda</h3></div>
    <div class="card-body">
        <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- HERO SECTION -->
            <h4 class="mt-4 mb-3 text-primary">Hero Section</h4>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label>Judul Hero</label>
                        <input type="text" name="hero_title" class="form-control" value="{{ $settings['hero_title'] ?? 'Selamat Datang di MTsN 1 Magetan' }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label>Subjudul Hero</label>
                        <textarea name="hero_subtitle" class="form-control" rows="3" required>{{ $settings['hero_subtitle'] ?? 'TERWUJUDNYA SISWA YANG BERPRESTASI, MANDIRI, DAN BERAKHLAQUL KARIMAH' }}</textarea>
                    </div>
                </div>
            </div>

            <!-- QUICK INFO -->
            <h4 class="mt-5 mb-3 text-primary">Quick Info (4 Kotak)</h4>
            <div class="row">
                <div class="col-md-3"><input type="text" name="akreditasi" class="form-control mb-3" placeholder="Akreditasi A" value="{{ $settings['akreditasi'] ?? 'Akreditasi A' }}" required></div>
                <div class="col-md-3"><input type="text" name="jumlah_siswa" class="form-control mb-3" placeholder="1200+ Siswa" value="{{ $settings['jumlah_siswa'] ?? '1200+ Siswa' }}" required></div>
                <div class="col-md-3"><input type="text" name="jumlah_guru" class="form-control mb-3" placeholder="80+ Guru" value="{{ $settings['jumlah_guru'] ?? '80+ Guru' }}" required></div>
                <div class="col-md-3"><input type="text" name="program_sks" class="form-control mb-3" placeholder="Program SKS 2 Tahun" value="{{ $settings['program_sks'] ?? 'Program SKS 2 Tahun' }}" required></div>
            </div>

            <!-- ABOUT SECTION -->
            <h4 class="mt-5 mb-3 text-primary">Tentang Kami</h4>
            <div class="row">
                <div class="col-md-6">
                    <label>Visi</label>
                    <textarea name="visi" class="form-control" rows="3" required>{{ $settings['visi'] ?? 'Terwujudnya Madrasah yang Islami, Berprestasi, dan Berwawasan Lingkungan' }}</textarea>
                </div>
                <div class="col-md-6">
                    <label>Gambar Tentang Kami</label>
                    <input type="file" name="about_image" class="form-control">
                    @if(isset($settings['about_image']))
                        <img src="{{ asset('storage/' . $settings['about_image']) }}" class="img-thumbnail mt-2" width="200">
                    @endif
                </div>
            </div>

            <h5 class="mt-4">Misi (4 poin)</h5>
            @for($i = 1; $i <= 4; $i++)
                <div class="form-group mb-3">
                    <label>Misi {{ $i }}</label>
                    <textarea name="misi_{{ $i }}" class="form-control" rows="2" required>{{ $settings["misi_{$i}"] ?? '' }}</textarea>
                </div>
            @endfor

            <!-- PPDB SECTION -->
            <h4 class="mt-5 mb-3 text-primary">PPDB Section</h4>
            <div class="row">
                <div class="col-md-4"><input type="text" name="ppdb_tahun" class="form-control mb-3" value="{{ $settings['ppdb_tahun'] ?? '2026/2027' }}" placeholder="Tahun Ajaran"></div>
                <div class="col-md-8"><input type="text" name="ppdb_judul" class="form-control mb-3" value="{{ $settings['ppdb_judul'] ?? 'Penerimaan Peserta Didik Baru' }}" required></div>
                <div class="col-12">
                    <textarea name="ppdb_deskripsi" class="form-control" rows="3" required>{{ $settings['ppdb_deskripsi'] ?? 'Bergabunglah dengan MTsN 1 Magetan dan wujudkan masa depan gemilang bersama kami!' }}</textarea>
                </div>
            </div>
            <!-- GAMBAR PPDB (untuk icon di homepage) -->
<h4 class="mt-5 mb-3 text-primary">Gambar PPDB (di halaman utama)</h4>
<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label>Gambar PPDB Icon/Banner Kecil</label>
            <input type="file" name="ppdb_image" class="form-control" accept="image/*">
            @if(isset($settings['ppdb_image']) && $settings['ppdb_image'])
                <div class="mt-2">
                    <p>Preview saat ini:</p>
                    <img src="{{ asset('storage/' . $settings['ppdb_image']) }}" class="img-thumbnail" width="300">
                </div>
            @endif
        </div>
    </div>
</div>

            <!-- KONTAK -->
            <h4 class="mt-5 mb-3 text-primary">Informasi Kontak</h4>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="contact_address" class="form-control mb-3" value="{{ $settings['contact_address'] ?? '' }}" required>
                    <input type="text" name="contact_phone" class="form-control mb-3" value="{{ $settings['contact_phone'] ?? '' }}" required>
                </div>
                <div class="col-md-6">
                    <input type="email" name="contact_email" class="form-control mb-3" value="{{ $settings['contact_email'] ?? '' }}" required>
                    <input type="text" name="contact_hours" class="form-control mb-3" value="{{ $settings['contact_hours'] ?? '' }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-success btn-lg mt-4">Simpan Semua Perubahan</button>
        </form>
    </div>
</div>

<!-- Link to the external CSS file -->
<link rel="stylesheet" href="{{ asset('css/admin-settings.css') }}">
@endsection