@extends('layouts.admin')

@section('title', 'Settings Beranda')
@section('page-title', 'Settings Beranda')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 mx-auto">
            <!-- Main Settings Card -->
            <div class="settings-card">
                <div class="settings-card-header">
                    <i class="fas fa-cog"></i> Edit Konten Beranda
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <!-- HERO SECTION -->
                        <div class="settings-section">
                            <h4 class="section-title">
                                <i class="fas fa-image"></i> Hero Section
                            </h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Judul Hero <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="hero_title"
                                               class="form-control @error('hero_title') is-invalid @enderror"
                                               value="{{ old('hero_title', $settings['hero_title'] ?? 'Selamat Datang di MTsN 1 Magetan') }}"
                                               required>
                                        @error('hero_title')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Subjudul Hero <span class="text-danger">*</span></label>
                                        <textarea name="hero_subtitle"
                                                  class="form-control @error('hero_subtitle') is-invalid @enderror"
                                                  rows="3"
                                                  required>{{ old('hero_subtitle', $settings['hero_subtitle'] ?? 'TERWUJUDNYA SISWA YANG BERPRESTASI, MANDIRI, DAN BERAKHLAQUL KARIMAH') }}</textarea>
                                        @error('hero_subtitle')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- QUICK INFO -->
                        <div class="settings-section">
                            <h4 class="section-title">
                                <i class="fas fa-th"></i> Quick Info (4 Kotak)
                            </h4>
                            <div class="row g-3">
                                <div class="col-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Akreditasi <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="akreditasi"
                                               class="form-control @error('akreditasi') is-invalid @enderror"
                                               value="{{ old('akreditasi', $settings['akreditasi'] ?? 'Akreditasi A') }}"
                                               required>
                                        @error('akreditasi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Jumlah Siswa <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="jumlah_siswa"
                                               class="form-control @error('jumlah_siswa') is-invalid @enderror"
                                               value="{{ old('jumlah_siswa', $settings['jumlah_siswa'] ?? '1200+ Siswa') }}"
                                               required>
                                        @error('jumlah_siswa')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Jumlah Guru <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="jumlah_guru"
                                               class="form-control @error('jumlah_guru') is-invalid @enderror"
                                               value="{{ old('jumlah_guru', $settings['jumlah_guru'] ?? '80+ Guru') }}"
                                               required>
                                        @error('jumlah_guru')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="form-group">
                                        <label class="form-label">Program SKS <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="program_sks"
                                               class="form-control @error('program_sks') is-invalid @enderror"
                                               value="{{ old('program_sks', $settings['program_sks'] ?? 'Program SKS 2 Tahun') }}"
                                               required>
                                        @error('program_sks')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ABOUT SECTION -->
                        <div class="settings-section">
                            <h4 class="section-title">
                                <i class="fas fa-info-circle"></i> Tentang Kami
                            </h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Visi <span class="text-danger">*</span></label>
                                        <textarea name="visi"
                                                  class="form-control @error('visi') is-invalid @enderror"
                                                  rows="3"
                                                  required>{{ old('visi', $settings['visi'] ?? 'Terwujudnya Madrasah yang Islami, Berprestasi, dan Berwawasan Lingkungan') }}</textarea>
                                        @error('visi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mission-group">
                                        <h5 class="mission-title">Misi (4 poin)</h5>
                                        @for($i = 1; $i <= 4; $i++)
                                            <div class="form-group">
                                                <label class="form-label">Misi {{ $i }} <span class="text-danger">*</span></label>
                                                <textarea name="misi_{{ $i }}"
                                                          class="form-control @error("misi_{$i}") is-invalid @enderror"
                                                          rows="2"
                                                          required>{{ old("misi_{$i}", $settings["misi_{$i}"] ?? '') }}</textarea>
                                                @error("misi_{$i}")
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        @endfor
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Gambar Tentang Kami (opsional)</label>
                                        <div class="file-input-wrapper">
                                            <input type="file" name="about_image" class="form-control" accept="image/*">
                                            <span class="file-input-hint"><i class="fas fa-cloud-upload-alt"></i> Pilih Gambar</span>
                                        </div>
                                        @if(!empty($settings['about_image']))
                                            <div class="image-preview">
                                                <p><i class="fas fa-check-circle"></i> Gambar saat ini:</p>
                                                <img src="{{ asset('storage/' . $settings['about_image']) }}"
                                                     class="img-thumbnail"
                                                     style="max-height: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PPDB SECTION -->
                        <div class="settings-section">
                            <h4 class="section-title">
                                <i class="fas fa-graduation-cap"></i> PPDB Section
                            </h4>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Tahun Ajaran <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="ppdb_tahun"
                                               class="form-control @error('ppdb_tahun') is-invalid @enderror"
                                               value="{{ old('ppdb_tahun', $settings['ppdb_tahun'] ?? '2026/2027') }}"
                                               required>
                                        @error('ppdb_tahun')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="form-label">Judul PPDB <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="ppdb_judul"
                                               class="form-control @error('ppdb_judul') is-invalid @enderror"
                                               value="{{ old('ppdb_judul', $settings['ppdb_judul'] ?? 'Penerimaan Peserta Didik Baru') }}"
                                               required>
                                        @error('ppdb_judul')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Deskripsi PPDB <span class="text-danger">*</span></label>
                                        <textarea name="ppdb_deskripsi"
                                                  class="form-control @error('ppdb_deskripsi') is-invalid @enderror"
                                                  rows="3"
                                                  required>{{ old('ppdb_deskripsi', $settings['ppdb_deskripsi'] ?? 'Bergabunglah dengan MTsN 1 Magetan dan wujudkan masa depan gemilang bersama kami!') }}</textarea>
                                        @error('ppdb_deskripsi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- GAMBAR PPDB -->
                            <h5 class="subsection-title">
                                <i class="fas fa-image"></i> Gambar PPDB (Icon/Banner di Beranda)
                            </h5>
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Upload Gambar PPDB (opsional)</label>
                                        <div class="file-input-wrapper">
                                            <input type="file" name="ppdb_image" class="form-control" accept="image/*">
                                            <span class="file-input-hint"><i class="fas fa-cloud-upload-alt"></i> Pilih Gambar</span>
                                        </div>
                                        @if(!empty($settings['ppdb_image']))
                                            <div class="image-preview">
                                                <p><i class="fas fa-check-circle"></i> Gambar saat ini:</p>
                                                <img src="{{ asset('storage/' . $settings['ppdb_image']) }}"
                                                     class="img-thumbnail"
                                                     style="max-height: 250px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- KONTAK -->
                        <div class="settings-section">
                            <h4 class="section-title">
                                <i class="fas fa-phone"></i> Informasi Kontak
                            </h4>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Alamat <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="contact_address"
                                               class="form-control @error('contact_address') is-invalid @enderror"
                                               value="{{ old('contact_address', $settings['contact_address'] ?? '') }}"
                                               required>
                                        @error('contact_address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Telepon <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="contact_phone"
                                               class="form-control @error('contact_phone') is-invalid @enderror"
                                               value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}"
                                               required>
                                        @error('contact_phone')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email <span class="text-danger">*</span></label>
                                        <input type="email"
                                               name="contact_email"
                                               class="form-control @error('contact_email') is-invalid @enderror"
                                               value="{{ old('contact_email', $settings['contact_email'] ?? '') }}"
                                               required>
                                        @error('contact_email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Jam Operasional <span class="text-danger">*</span></label>
                                        <input type="text"
                                               name="contact_hours"
                                               class="form-control @error('contact_hours') is-invalid @enderror"
                                               value="{{ old('contact_hours', $settings['contact_hours'] ?? '') }}"
                                               required>
                                        @error('contact_hours')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SUBMIT BUTTON -->
                        <div class="mt-5 text-end">
                            <button type="submit" class="btn btn-primary btn-save">
                                <i class="fas fa-save"></i> Simpan Semua Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/admin-settings.css') }}">
<script src="{{ asset('js/admin-settings.js') }}"></script>

@endsection