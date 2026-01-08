@extends('layouts.admin')

@section('title', 'PPDB')
@section('page-title', 'Kelola PPDB')

@section('content')

<!-- Main Container -->
<div class="ppdb-container">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">

            <!-- Status Info -->
            <div class="alert alert-info" role="alert">
    <i class="fas fa-info-circle"></i>
    <div class="alert-content">
        <strong>Status PPDB Saat Ini:</strong> 
        @if($status == 'open')
            Dibuka (Pendaftaran sedang berlangsung)
        @elseif($status == 'closed')
            Ditutup (Periode pendaftaran telah berakhir)
        @else
            Akan Segera Dibuka
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
                    <form class="ppdb-form" action="{{ route('admin.ppdb.update') }}" method="POST" novalidate>
                        @csrf
                        @method('POST')

                        <!-- Judul -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-heading"></i>
                                <span>Judul PPDB</span>
                            </label>
                            <input type="text" 
                                   name="judul" 
                                   class="form-control @error('judul') is-invalid @enderror" 
                                   value="{{ old('judul', $ppdb->judul ?? 'Penerimaan Siswa Baru Gelombang Pertama') }}" 
                                   placeholder="Masukkan judul PPDB..." 
                                   required>
                            @error('judul')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text">Judul utama untuk program penerimaan peserta didik baru</small>
                        </div>

                        <!-- Tanggal Dibuka -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-calendar-check"></i>
                                <span>Tanggal Dibuka</span>
                            </label>
                            <input type="date" 
                                   name="dibuka" 
                                   class="form-control dibuka-input @error('dibuka') is-invalid @enderror" 
                                   value="{{ old('dibuka', $ppdb->dibuka ?? '') }}" 
                                   required>
                            @error('dibuka')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text">Tanggal pembukaan pendaftaran</small>
                        </div>

                        <!-- Tanggal Ditutup -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-calendar-times"></i>
                                <span>Tanggal Ditutup</span>
                            </label>
                            <input type="date" 
                                   name="ditutup" 
                                   class="form-control ditutup-input @error('ditutup') is-invalid @enderror" 
                                   value="{{ old('ditutup', $ppdb->ditutup ?? '') }}" 
                                   required>
                            @error('ditutup')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text">Tanggal penutupan pendaftaran</small>
                        </div>

                        <!-- Kuota -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-users"></i>
                                <span>Kuota Siswa</span>
                            </label>
                            <input type="number" 
                                   name="kuota" 
                                   class="form-control @error('kuota') is-invalid @enderror" 
                                   value="{{ old('kuota', $ppdb->kuota ?? '300') }}" 
                                   min="1" 
                                   placeholder="Masukkan jumlah kuota..." 
                                   required>
                            @error('kuota')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text">Total jumlah siswa yang akan diterima</small>
                        </div>

                        <div class="form-divider"></div>

                        <!-- Persyaratan -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-list-ul"></i>
                                <span>Persyaratan</span>
                            </label>
                            <textarea name="persyaratan" 
                                      class="form-control persyaratan-textarea @error('persyaratan') is-invalid @enderror" 
                                      placeholder="Tuliskan persyaratan pendaftaran..." 
                                      rows="6" 
                                      required>{{ old('persyaratan', $ppdb->persyaratan ?? "Foto copy Akte (1 Lembar)\nFoto copy KK (1 Lembar)\nFoto copy KIP/KKS/PKH/SKTM (jika ada)\nPas Foto 3x4 (2 Lembar)\nMengisi Formulir Pendaftaran\nNorek Bank (jika ada)") }}</textarea>
                            @error('persyaratan')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text">Persyaratan akan ditampilkan sebagai daftar terpisah pada halaman PPDB</small>
                        </div>

                        <!-- Konten Deskripsi -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-file-alt"></i>
                                <span>Link PPDB</span>
                            </label>
                            <textarea name="konten" 
                                      class="form-control konten-textarea @error('konten') is-invalid @enderror" 
                                      placeholder="Tuliskan link lengkap untuk pendaftaran program PPDB..." 
                                      rows="8" 
                                      required>{{ old('konten', $ppdb->konten ?? "Ayo Bergabung Bersama Kami! Pendaftaran Online: https://forms.gle/MP5nhGic4Zxga8n8. Hubungi: Ibu Emy Lathifah 0856 4618 0815") }}</textarea>
                            @error('konten')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            <small class="form-text">Link untuk pendaftaran</small>
                        </div>

                        <!-- Timeline (Jadwal) -->
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-calendar-check"></i>
                                <span>Jadwal Pendaftaran (Timeline)</span>
                            </label>
                            <div id="timeline-items">
                                @php
                                    $timelineItems = old('timeline', json_decode($ppdb->timeline ?? '[]', true));
                                    $timelineItems = is_array($timelineItems) ? $timelineItems : [];
                                @endphp

                                @if(empty($timelineItems))
                                    <div class="timeline-item-input mb-3 p-3 border rounded">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <input type="text" class="form-control @error('timeline.0.date') is-invalid @enderror" name="timeline[0][date]" placeholder="Contoh: Gelombang Pertama atau 10 Mei 2025" required>
                                            @error('timeline.0.date') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" class="form-control @error('timeline.0.title') is-invalid @enderror" name="timeline[0][title]" placeholder="Contoh: Pendaftaran Online" required>
                                            @error('timeline.0.title') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control @error('timeline.0.description') is-invalid @enderror" name="timeline[0][description]" placeholder="Deskripsi singkat" required></textarea>
                                            @error('timeline.0.description') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <button type="button" class="btn btn-danger btn-sm remove-timeline-item">Hapus</button>
                                    </div>
                                @else
                                    @foreach($timelineItems as $index => $item)
                                        <div class="timeline-item-input mb-3 p-3 border rounded">
                                            <div class="form-group">
                                                <label>Tanggal</label>
                                                <input type="text" 
                                                       class="form-control @error("timeline.{$index}.date") is-invalid @enderror" 
                                                       name="timeline[{{ $index }}][date]" 
                                                       value="{{ $item['date'] ?? '' }}" 
                                                       placeholder="Contoh: Gelombang Pertama atau 10 Mei 2025" 
                                                       required>
                                                @error("timeline.{$index}.date")
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Judul</label>
                                                <input type="text" 
                                                       class="form-control @error("timeline.{$index}.title") is-invalid @enderror" 
                                                       name="timeline[{{ $index }}][title]" 
                                                       value="{{ $item['title'] ?? '' }}" 
                                                       placeholder="Contoh: Pendaftaran Online" 
                                                       required>
                                                @error("timeline.{$index}.title")
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control @error("timeline.{$index}.description") is-invalid @enderror" 
                                                          name="timeline[{{ $index }}][description]" 
                                                          placeholder="Deskripsi singkat" 
                                                          required>{{ $item['description'] ?? '' }}</textarea>
                                                @error("timeline.{$index}.description")
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <button type="button" class="btn btn-danger btn-sm remove-timeline-item">Hapus</button>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <button type="button" id="add-timeline-item" class="btn btn-secondary mt-2">
                                <i class="fas fa-plus"></i> Tambah Jadwal
                            </button>
                            <small class="form-text">Tambahkan jadwal seperti gelombang, tes, atau pengumuman.</small>
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

<!-- CSS & JS -->
<link rel="stylesheet" href="{{ asset('css/admin-ppdb.css') }}">
<script src="{{ asset('js/admin-ppdb.js') }}"></script>

@endsection