@extends('layouts.app')

@section('title', 'PPDB - MTsN 1 Magetan')

@section('content')
<section style="padding: 80px 0; background: white;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Penerimaan Peserta Didik Baru</h2>
            <p class="section-subtitle">Tahun Ajaran 2026/2027</p>
        </div>

        <!-- INFORMASI UTAMA -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px; margin-top: 50px;">
            <div style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white; padding: 30px; border-radius: 12px; text-align: center; animation: slideInUp 0.6s ease-out;">
                <h4 style="font-size: 32px; font-weight: 700; margin-bottom: 10px;">1 Jan - 28 Feb</h4>
                <p style="font-size: 16px;">Periode Pendaftaran</p>
            </div>
            <div style="background: linear-gradient(135deg, var(--accent-color) 0%, #e67e22 100%); color: white; padding: 30px; border-radius: 12px; text-align: center; animation: slideInUp 0.6s ease-out; animation-delay: 0.1s;">
                <h4 style="font-size: 32px; font-weight: 700; margin-bottom: 10px;">120 Siswa</h4>
                <p style="font-size: 16px;">Kuota Penerimaan</p>
            </div>
            <div style="background: linear-gradient(135deg, #3498db 0%, #2980b9 100%); color: white; padding: 30px; border-radius: 12px; text-align: center; animation: slideInUp 0.6s ease-out; animation-delay: 0.2s;">
                <h4 style="font-size: 32px; font-weight: 700; margin-bottom: 10px;">Gratis</h4>
                <p style="font-size: 16px;">Biaya Pendaftaran</p>
            </div>
        </div>

        <!-- PERSYARATAN -->
        <div style="background: var(--light-bg); padding: 50px; border-radius: 15px; margin-top: 50px;">
            <h3 style="font-size: 28px; font-weight: 700; color: var(--dark-text); margin-bottom: 30px; display: flex; align-items: center; gap: 15px;">
                <i class="fas fa-list-check"></i> Persyaratan Pendaftaran
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 25px;">
                @php
                $requirements = [
                    'Lulus SD/MI dengan nilai rata-rata minimal 7.0',
                    'Lulus UN/UAMBN dari sekolah asal',
                    'Fotokopi rapor semester 1-5 yang dilegalisir',
                    'Akte kelahiran (fotokopi yang dilegalisir)',
                    'Kartu Keluarga (fotokopi)',
                    'Fotokopi KTP orang tua/wali',
                    'Surat keterangan sehat dari dokter',
                    'Pas foto 3x4 cm sebanyak 4 lembar'
                ];
                @endphp
                @foreach($requirements as $i => $req)
                <div style="display: flex; gap: 15px; animation: slideInLeft 0.6s ease-out backwards; animation-delay: {{ ($i * 0.05) }}s;">
                    <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">
                        {{ $i + 1 }}
                    </div>
                    <p style="color: var(--text-muted); font-size: 15px; display: flex; align-items: center;">{{ $req }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- LANGKAH-LANGKAH PENDAFTARAN -->
        <div style="margin-top: 60px;">
            <h3 style="font-size: 28px; font-weight: 700; color: var(--dark-text); margin-bottom: 40px; text-align: center;">
                <i class="fas fa-tasks"></i> Langkah-Langkah Pendaftaran
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                @php
                $steps = [
                    ['icon' => 'fas fa-browser', 'title' => 'Akses Portal PPDB', 'desc' => 'Buka website ppdb.mtsnmagetan.sch.id'],
                    ['icon' => 'fas fa-user-plus', 'title' => 'Buat Akun', 'desc' => 'Daftar dengan email dan nomor induk siswa'],
                    ['icon' => 'fas fa-pen-to-square', 'title' => 'Isi Data Diri', 'desc' => 'Lengkapi data pribadi dan data orang tua'],
                    ['icon' => 'fas fa-file-upload', 'title' => 'Upload Berkas', 'desc' => 'Unggah semua dokumen yang diperlukan'],
                    ['icon' => 'fas fa-check-circle', 'title' => 'Verifikasi', 'desc' => 'Tunggu konfirmasi dan verifikasi data'],
                    ['icon' => 'fas fa-handshake', 'title' => 'Daftar Ulang', 'desc' => 'Daftar ulang jika diterima di sekolah']
                ];
                @endphp
                @foreach($steps as $i => $step)
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); text-align: center; animation: fadeInUp 0.6s ease-out; animation-delay: {{ ($i * 0.1) }}s; position: relative;">
                    <div style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); width: 50px; height: 50px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-size: 24px;">
                        <i class="{{ $step['icon'] }}"></i>
                    </div>
                    <h4 style="font-size: 18px; font-weight: 700; color: var(--dark-text); margin-top: 20px; margin-bottom: 10px;">{{ $step['title'] }}</h4>
                    <p style="color: var(--text-muted); font-size: 14px; margin-bottom: 0;">{{ $step['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <!-- TOMBOL DAFTAR -->
        <div style="text-align: center; margin-top: 60px;">
            <a href="#" class="btn btn-primary btn-large" style="padding: 15px 50px; font-size: 18px;">
                <i class="fas fa-arrow-right"></i> Mulai Pendaftaran PPDB
            </a>
        </div>

        <!-- FAQ -->
        <div style="margin-top: 80px; background: var(--light-bg); padding: 50px; border-radius: 15px;">
            <h3 style="font-size: 28px; font-weight: 700; color: var(--dark-text); margin-bottom: 40px; text-align: center;">
                <i class="fas fa-circle-question"></i> Pertanyaan Umum (FAQ)
            </h3>
            <div style="max-width: 800px; margin: 0 auto;">
                @php
                $faqs = [
                    ['q' => 'Berapa biaya pendaftaran PPDB?', 'a' => 'Biaya pendaftaran PPDB di MTsN 1 Magetan adalah GRATIS. Tidak ada biaya apapun untuk mendaftar.'],
                    ['q' => 'Apa saja syarat pendaftaran PPDB?', 'a' => 'Syarat pendaftaran meliputi: lulus SD/MI, memiliki raport, akte kelahiran, KK, dan KTP orang tua. Lihat detail di atas.'],
                    ['q' => 'Kapan pengumuman hasil seleksi?', 'a' => 'Pengumuman hasil seleksi akan diumumkan pada akhir Februari 2026 melalui website dan SMS.'],
                    ['q' => 'Bagaimana jika tidak diterima?', 'a' => 'Jika tidak diterima, Anda dapat mendaftar di sekolah lain yang masih membuka pendaftaran.']
                ];
                @endphp
                @foreach($faqs as $i => $faq)
                <div style="background: white; padding: 25px; border-radius: 12px; margin-bottom: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); animation: slideInUp 0.6s ease-out; animation-delay: {{ ($i * 0.1) }}s;">
                    <h5 style="font-weight: 700; color: var(--primary-color); margin-bottom: 12px; display: flex; align-items: center; gap: 10px;">
                        <i class="fas fa-chevron-right"></i> {{ $faq['q'] }}
                    </h5>
                    <p style="color: var(--text-muted); font-size: 14px; margin-left: 35px; margin: 0;">{{ $faq['a'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection