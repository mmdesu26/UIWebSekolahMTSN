@extends('layouts.app')

@section('title', 'PPDB - MTsN 1 Magetan')

@section('content')

<!-- Hero Section -->
<div class="ppdb-hero">
    <div class="container">
        <div class="ppdb-hero-content">
            <h1><i class="fas fa-graduation-cap" style="margin-right: 15px;"></i>Penerimaan Peserta Didik Baru</h1>
            <p>PPDB MTsN 1 Magetan Tahun Ajaran 2025/2026</p>
        </div>
    </div>
</div>

<!-- Content Section -->
<section class="ppdb-content-section">
    <div class="container">
        <!-- Section Header -->
        <div class="ppdb-section-header">
            <h2><i class="fas fa-info-circle" style="margin-right: 10px;"></i>Informasi Pendaftaran</h2>
            <p>Berikut adalah informasi lengkap mengenai penerimaan peserta didik baru di MTsN 1 Magetan</p>
        </div>

        <!-- Info Cards -->
        <div class="info-cards-grid">
            <div class="info-card">
                <h4>03 Feb - 06 Mei 2025</h4>
                <p>Gelombang Pertama Pendaftaran</p>
            </div>
            <div class="info-card">
                <h4>120 Siswa</h4>
                <p>Kuota Penerimaan</p>
            </div>
            <div class="info-card">
                <h4>Gratis</h4>
                <p>Biaya Pendaftaran</p>
            </div>
        </div>

        <!-- Timeline Section -->
        <div class="timeline-section">
            <div class="timeline-header">
                <h3><i class="fas fa-calendar-check"></i> Jadwal Pendaftaran Siswa Baru</h3>
            </div>
            <div class="timeline-grid">
                <div class="timeline-item">
                    <div class="timeline-date">03 Februari - 06 Mei 2025</div>
                    <div class="timeline-title"><i class="fas fa-pencil"></i> Gelombang Pertama</div>
                    <p class="timeline-desc">Pendaftaran online terbuka untuk calon siswa baru melalui portal PPDB</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">10 Mei 2025</div>
                    <div class="timeline-title"><i class="fas fa-pen-fancy"></i> Tes Akademik</div>
                    <p class="timeline-desc">Pelaksanaan tes akademik (Matematika, Bahasa Indonesia, IPA)</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">12 Mei 2025</div>
                    <div class="timeline-title"><i class="fas fa-file-check"></i> Pengumuman Hasil</div>
                    <p class="timeline-desc">Pengumuman hasil tes akademik melalui website dan SMS</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">14 - 16 Mei 2025</div>
                    <div class="timeline-title"><i class="fas fa-list"></i> Daftar Ulang</div>
                    <p class="timeline-desc">Daftar ulang bagi peserta yang diterima di sekolah atau online</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">19 Mei - 16 Juni 2025</div>
                    <div class="timeline-title"><i class="fas fa-door-open"></i> Gelombang Kedua</div>
                    <p class="timeline-desc">Pendaftaran gelombang kedua untuk sisa kuota yang tersedia</p>
                </div>
                <div class="timeline-item">
                    <div class="timeline-date">21 Juni - 26 Juni 2025</div>
                    <div class="timeline-title"><i class="fas fa-check"></i> Finalisasi PPDB</div>
                    <p class="timeline-desc">Proses finalisasi data siswa dan persiapan tahun ajaran baru</p>
                </div>
            </div>
        </div>

        <!-- Requirements Section -->
        <div class="requirements-section">
            <div class="requirements-header">
                <i class="fas fa-list-check"></i>
                <h3>Syarat Pendaftaran</h3>
            </div>
            <div class="requirements-grid">
                <div class="requirement-item">
                    <div class="requirement-number">1</div>
                    <div class="requirement-text">Lulus SD/MI dengan nilai rata-rata minimal 7.0</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">2</div>
                    <div class="requirement-text">Lulus UN/UAMBN dari sekolah asal</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">3</div>
                    <div class="requirement-text">Fotokopi rapor semester 1-5 yang dilegalisir (11 Lembar)</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">4</div>
                    <div class="requirement-text">Fotokopi akte kelahiran (1 Lembar)</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">5</div>
                    <div class="requirement-text">Fotokopi Kartu Keluarga (1 Lembar)</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">6</div>
                    <div class="requirement-text">Bagi uang memiliki piagam/sertifikat kejaruaan supaya dilampirkan</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">7</div>
                    <div class="requirement-text">Surat keterangan sehat dari dokter/puskesmas</div>
                </div>
                <div class="requirement-item">
                    <div class="requirement-number">8</div>
                    <div class="requirement-text">Pas foto 3x4 cm sebanyak 4 lembar</div>
                </div>
            </div>
        </div>

        <!-- Steps Section -->
        <div class="steps-section">
            <div class="steps-header">
                <h3><i class="fas fa-tasks"></i> Langkah-Langkah Pendaftaran</h3>
            </div>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <i class="fas fa-globe step-icon"></i>
                    <h4 class="step-title">Kunjungi Portal PPDB</h4>
                    <p class="step-desc">Akses website ppdb.mtsnmagetan.sch.id menggunakan browser</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <i class="fas fa-user-plus step-icon"></i>
                    <h4 class="step-title">Buat Akun</h4>
                    <p class="step-desc">Daftar dengan email dan nomor induk siswa dari sekolah asal</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <i class="fas fa-pen-fancy step-icon"></i>
                    <h4 class="step-title">Isi Data Diri</h4>
                    <p class="step-desc">Lengkapi data pribadi, data orang tua, dan alamat rumah</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <i class="fas fa-file-upload step-icon"></i>
                    <h4 class="step-title">Upload Dokumen</h4>
                    <p class="step-desc">Unggah semua dokumen yang diperlukan (scan/foto berwarna)</p>
                </div>
                <div class="step-card">
                    <div class="step-number">5</div>
                    <i class="fas fa-check-circle step-icon"></i>
                    <h4 class="step-title">Verifikasi Data</h4>
                    <p class="step-desc">Tunggu verifikasi dari pihak sekolah (1-2 hari kerja)</p>
                </div>
                <div class="step-card">
                    <div class="step-number">6</div>
                    <i class="fas fa-handshake step-icon"></i>
                    <h4 class="step-title">Daftar Ulang</h4>
                    <p class="step-desc">Daftar ulang jika diterima dan bayar biaya pendaftaran sekolah</p>
                </div>
            </div>
        </div>

        <!-- CTA Section -->
        <div class="cta-registration">
            <h3>Siap Melanjutkan Pendidikan ke MTsN 1 Magetan?</h3>
            <p>Daftarkan diri Anda sekarang dan jadilah bagian dari keluarga besar MTsN 1 Magetan</p>
            <a href="https://forms.gle/MPStnhGic42Xqa8n9" class="register-btn" target="_blank">
                <i class="fas fa-arrow-right"></i> Mulai Pendaftaran Online
            </a>
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <div class="faq-header">
                <h3><i class="fas fa-circle-question"></i> Pertanyaan Umum (FAQ)</h3>
            </div>
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Berapa biaya pendaftaran PPDB?
                    </div>
                    <p class="faq-answer">Biaya pendaftaran PPDB di MTsN 1 Magetan adalah GRATIS. Tidak ada biaya apapun untuk mendaftar melalui portal PPDB online.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Apa saja syarat pendaftaran PPDB?
                    </div>
                    <p class="faq-answer">Syarat pendaftaran meliputi: lulus SD/MI dengan nilai rata-rata minimal 7.0, lulus UN/UAMBN, fotokopi rapor, akte kelahiran, KK, KTP orang tua, surat sehat, dan pas foto 3x4. Lihat detail lengkap di atas.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Kapan pengumuman hasil seleksi?
                    </div>
                    <p class="faq-answer">Pengumuman hasil seleksi akan diumumkan pada tanggal 12 Mei 2025 melalui website, SMS, dan email yang terdaftar di portal PPDB.</p>
                </div>
                <div class="faq-item">
                    <div class="faq-question">
                        <i class="fas fa-chevron-right"></i> Bagaimana jika tidak diterima?
                    </div>
                    <p class="faq-answer">Jika tidak diterima di gelombang pertama, Anda dapat mendaftar kembali di gelombang kedua (19 Mei - 16 Juni 2025) atau mendaftar di sekolah lain yang masih membuka pendaftaran.</p>
                </div>
            </div>
        </div>
   </div>
</section>

<!-- Include CSS and JS Files -->
<link rel="stylesheet" href="{{ asset('css/ppdb.css') }}">
<script src="{{ asset('js/ppdb.js') }}"></script>

@endsection