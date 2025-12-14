@extends('layouts.admin')

@section('title', 'PPDB')
@section('page-title', 'Kelola PPDB')

@section('content')

<!-- Main Container -->
<div class="ppdb-container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">

            <!-- Success Message -->
            @if(session('success'))
            <div class="alert alert-success" role="alert">
                <i class="fas fa-check-circle"></i>
                <div class="alert-content">
                    <strong>Berhasil!</strong> Pengaturan PPDB telah diperbarui.
                </div>
                <span class="alert-close" onclick="this.parentElement.style.display='none';">
                    <i class="fas fa-times"></i>
                </span>
            </div>
            @endif

            <!-- Status Info (Tambah ini untuk admin tahu status otomatis) -->
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle"></i>
                <div class="alert-content">
                    <strong>Status PPDB Saat Ini:</strong> 
                    @if($status == 'open')
                        Buka (Pendaftaran sedang berlangsung)
                    @elseif($status == 'closed')
                        Tutup (Periode telah berakhir)
                    @else
                        Coming Soon (Belum dibuka)
                    @endif
                </div>
            </div>

            <!-- Main Card -->
            <div class="ppdb-card">
                <div class="ppdb-card-header">
                    <i class="fas fa-user-tie ppdb-card-header-icon"></i>
                    <h3>Pengaturan PPDB MTsN 1 Magetan</h3>
                </div>

                <div class="ppdb-card-body">
                    <form class="ppdb-form" action="{{ route('admin.ppdb.update') }}" method="POST">
                        @csrf
                        @method('POST')

                        <!-- Judul -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-heading"></i>
                                <span>Judul PPDB</span>
                            </label>
                            <input type="text" class="form-control" name="judul" value="{{ old('judul', $ppdb->judul ?? 'Penerimaan Siswa Baru Gelombang Pertama') }}" placeholder="Masukkan judul PPDB..." required>
                            @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                            <small class="form-text">📝 Judul utama untuk program penerimaan peserta didik baru</small>
                        </div>

                        <!-- Tanggal Dibuka & Ditutup -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-calendar-check"></i>
                                <span>Tanggal Dibuka</span>
                            </label>
                            <input type="date" class="form-control dibuka-input" name="dibuka" value="{{ old('dibuka', $ppdb->dibuka ?? '2026-02-03') }}" required>
                            @error('dibuka') <small class="text-danger">{{ $message }}</small> @enderror
                            <small class="form-text">📅 Tanggal pembukaan pendaftaran</small>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-calendar-times"></i>
                                <span>Tanggal Ditutup</span>
                            </label>
                            <input type="date" class="form-control ditutup-input" name="ditutup" value="{{ old('ditutup', $ppdb->ditutup ?? '2026-06-26') }}" required>
                            @error('ditutup') <small class="text-danger">{{ $message }}</small> @enderror
                            <small class="form-text">📅 Tanggal penutupan pendaftaran</small>
                        </div>

                        <!-- Kuota -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-users"></i>
                                <span>Kuota Siswa</span>
                            </label>
                            <input type="number" class="form-control" name="kuota" value="{{ old('kuota', $ppdb->kuota ?? '300') }}" min="1" placeholder="Masukkan jumlah kuota..." required>
                            @error('kuota') <small class="text-danger">{{ $message }}</small> @enderror
                            <small class="form-text">👥 Total jumlah siswa yang akan diterima</small>
                        </div>

                        <div class="form-divider"></div>

                        <!-- Persyaratan -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-list-ul"></i>
                                <span>Persyaratan</span>
                            </label>
                            <textarea class="form-control persyaratan-textarea" name="persyaratan" placeholder="Tuliskan persyaratan pendaftaran..." required>{{ old('persyaratan', $ppdb->persyaratan ?? "Foto copy Akte (1 Lembar)\nFoto copy KK (1 Lembar)\nFoto copy KIP/KKS/PKH/SKTM (jika ada)\nPas Foto 3x4 (2 Lembar)\nMengisi Formulir Pendaftaran\nNorek Bank (jika ada)") }}</textarea>
                            @error('persyaratan') <small class="text-danger">{{ $message }}</small> @enderror
                            <small class="form-text">📋 Persyaratan akan ditampilkan sebagai daftar terpisah pada halaman PPDB</small>
                        </div>

                        <!-- Konten Deskripsi -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                <span>Konten Deskripsi PPDB</span>
                            </label>
                            <textarea class="form-control konten-textarea" name="konten" placeholder="Tuliskan deskripsi lengkap tentang program PPDB..." required>{{ old('konten', $ppdb->konten ?? "Ayo Bergabung Bersama Kami! Media Sosial: Instagram @humasmtsn1magetan, Facebook MTs Negeri 1 Magetan. Lokasi: MTsN 1 Magetan, Desa Baluk, Kec. Karangrejo, Kab. Magetan. Syarat Pendaftaran: Foto copy Akte (1 Lembar), dll. Ekstrakurikuler: Pramuka, PMR, Banjari, Drumband, Volly, Futsal, Karate, Taekwondo, Seni Musik, Seni Tari. Pendaftaran Online: https://forms.gle/MP5nhGic4Zxga8n8. Hubungi: Ibu Emy Lathifah 0856 4618 0815") }}</textarea>
                            @error('konten') <small class="text-danger">{{ $message }}</small> @enderror
                            <small class="form-text">📝 Deskripsi akan ditampilkan di halaman utama PPDB</small>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">
                            <div class="btn-content">
                                <i class="fas fa-save"></i>
                                <span>Simpan Perubahan</span>
                            </div>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<!-- Link to the external CSS file -->
<link rel="stylesheet" href="{{ asset('css/admin-ppdb.css') }}">
<!-- Link to the external JavaScript file -->
<script src="{{ asset('js/admin-ppdb.js') }}"></script>

@endsection