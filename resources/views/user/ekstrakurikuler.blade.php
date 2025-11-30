@extends('layouts.app')

@section('title', 'Ekstrakurikuler - MTsN 1 Magetan')

@section('content')
<section style="padding: 80px 0; background: var(--light-bg);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Ekstrakurikuler</h2>
            <p class="section-subtitle">Wadah pengembangan bakat dan minat siswa</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px; margin-top: 50px;">
            @php
            $ekstrakurikuler = [
                ['name' => 'Az-Zuhra Futsal', 'icon' => 'fas fa-futbol', 'jadwal' => 'Senin & Rabu, 15:30-17:00', 'pembina' => 'Iwan Setyawan', 'prestasi' => 'Juara 1 Turnamen Futsal Antar Sekolah 2023'],
                ['name' => 'Paskibraka', 'icon' => 'fas fa-flag', 'jadwal' => 'Selasa, 15:30-17:00', 'pembina' => 'Dewi Lestari', 'prestasi' => 'Juara Harapan 2 Paskibraka Se-Magetan 2023'],
                ['name' => 'Paduan Suara', 'icon' => 'fas fa-music', 'jadwal' => 'Kamis, 15:30-17:00', 'pembina' => 'Hendra Gunawan', 'prestasi' => 'Juara 1 Festival Paduan Suara 2023'],
                ['name' => 'Robotik', 'icon' => 'fas fa-microchip', 'jadwal' => 'Jumat, 15:30-17:30', 'pembina' => 'Tri Handoko', 'prestasi' => 'Juara 2 Kompetisi Robotik Nasional 2023'],
                ['name' => 'Tahfidz Quran', 'icon' => 'fas fa-book-quran', 'jadwal' => 'Senin-Jumat, 06:00-07:00', 'pembina' => 'Ustadz Ahmad', 'prestasi' => 'Hafiz Al-Quran 5 Siswa 2023'],
                ['name' => 'English Club', 'icon' => 'fas fa-language', 'jadwal' => 'Rabu, 15:30-17:00', 'pembina' => 'Siti Nurhaliza', 'prestasi' => 'Juara Kompetisi Pidato Bahasa Inggris']
            ];
            @endphp
            @foreach($ekstrakurikuler as $i => $ekstra)
            <div style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s; animation: fadeInUp 0.6s ease-out; animation-delay: {{ ($i * 0.1) }}s; cursor: pointer;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 40px rgba(26,95,58,0.2)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)'">
                <div style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); padding: 40px 20px; text-align: center;">
                    <i class="{{ $ekstra['icon'] }}" style="font-size: 50px; color: white; margin-bottom: 15px; display: block;"></i>
                    <h3 style="color: white; font-size: 22px; font-weight: 700; margin: 0;">{{ $ekstra['name'] }}</h3>
                </div>
                <div style="padding: 30px;">
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px; color: var(--text-muted);">
                        <i class="fas fa-clock"></i>
                        <span style="font-size: 14px;">{{ $ekstra['jadwal'] }}</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 15px; color: var(--text-muted);">
                        <i class="fas fa-user"></i>
                        <span style="font-size: 14px;"><strong>Pembina:</strong> {{ $ekstra['pembina'] }}</span>
                    </div>
                    <div style="background: var(--light-bg); padding: 15px; border-radius: 8px; margin-bottom: 15px;">
                        <p style="font-size: 13px; color: var(--text-muted); margin: 0; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-trophy" style="color: var(--accent-color);"></i>
                            <strong style="color: var(--dark-text);">{{ $ekstra['prestasi'] }}</strong>
                        </p>
                    </div>
                    <button class="btn btn-primary" style="width: 100%; text-align: center; padding: 10px;">Daftar Sekarang</button>
                </div>
            </div>
            @endforeach
        </div>

        <!-- MANFAAT MENGIKUTI EKSTRAKURIKULER -->
        <div style="margin-top: 80px; background: white; padding: 50px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
            <h3 style="font-size: 28px; font-weight: 700; color: var(--dark-text); margin-bottom: 40px; text-align: center;">
                <i class="fas fa-sparkles"></i> Manfaat Mengikuti Ekstrakurikuler
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
                <div style="text-align: center; animation: slideInUp 0.6s ease-out;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 32px;">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4 style="font-size: 18px; font-weight: 700; color: var(--dark-text); margin-bottom: 10px;">Mengembangkan Bakat</h4>
                    <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6;">Ekstrakurikuler membantu siswa mengembangkan bakat dan minat mereka secara maksimal.</p>
                </div>
                <div style="text-align: center; animation: slideInUp 0.6s ease-out; animation-delay: 0.1s;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #3498db, #2980b9); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 32px;">
                        <i class="fas fa-users"></i>
                    </div>
                    <h4 style="font-size: 18px; font-weight: 700; color: var(--dark-text); margin-bottom: 10px;">Membangun Karakter</h4>
                    <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6;">Melalui ekstrakurikuler, siswa belajar disiplin, kerja sama, dan tanggung jawab.</p>
                </div>
                <div style="text-align: center; animation: slideInUp 0.6s ease-out; animation-delay: 0.2s;">
                    <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #e74c3c, #c0392b); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; color: white; font-size: 32px;">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h4 style="font-size: 18px; font-weight: 700; color: var(--dark-text); margin-bottom: 10px;">Meraih Prestasi</h4>
                    <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6;">Siswa memiliki kesempatan untuk berkompetisi dan meraih prestasi di berbagai tingkat.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection