@extends('layouts.app')

@section('title', 'Struktur Organisasi - MTsN 1 Magetan')

@section('content')
<section style="padding: 80px 0; background: var(--light-bg);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Struktur Organisasi</h2>
            <p class="section-subtitle">Manajemen dan kepemimpinan MTsN 1 Magetan</p>
        </div>

        <div style="background: white; padding: 50px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin-top: 50px; overflow-x: auto;">
            <svg style="width: 100%; min-width: 600px; height: auto;" viewBox="0 0 1000 800" xmlns="http://www.w3.org/2000/svg">
                <!-- Define styles -->
                <defs>
                    <style>
                        .org-box { fill: #1a5f3a; stroke: #f39c12; stroke-width: 2; }
                        .org-text { fill: white; font-family: Poppins; font-size: 14px; text-anchor: middle; }
                        .org-title { font-weight: bold; font-size: 15px; }
                        .org-line { stroke: #1a5f3a; stroke-width: 2; fill: none; }
                    </style>
                </defs>

                <!-- CEO/Kepala Sekolah -->
                <rect class="org-box" x="350" y="20" width="300" height="80" rx="8"/>
                <text class="org-text org-title" x="500" y="55">Kepala Sekolah</text>
                <text class="org-text" x="500" y="75">Drs. Ahmad Wijaya, M.Pd</text>

                <!-- Lines from Kepala Sekolah -->
                <line class="org-line" x1="500" y1="100" x2="500" y2="140"/>
                <line class="org-line" x1="200" y1="140" x2="800" y2="140"/>
                <line class="org-line" x1="200" y1="140" x2="200" y2="180"/>
                <line class="org-line" x1="500" y1="140" x2="500" y2="180"/>
                <line class="org-line" x1="800" y1="140" x2="800" y2="180"/>

                <!-- Wakil Kepala Sekolah -->
                <rect class="org-box" x="50" y="180" width="300" height="80" rx="8"/>
                <text class="org-text org-title" x="200" y="215">Wakil Kepala Sekolah</text>
                <text class="org-text" x="200" y="235">(Bidang Kurikulum)</text>

                <rect class="org-box" x="350" y="180" width="300" height="80" rx="8"/>
                <text class="org-text org-title" x="500" y="215">Wakil Kepala Sekolah</text>
                <text class="org-text" x="500" y="235">(Bidang Kesiswaan)</text>

                <rect class="org-box" x="650" y="180" width="300" height="80" rx="8"/>
                <text class="org-text org-title" x="800" y="215">Wakil Kepala Sekolah</text>
                <text class="org-text" x="800" y="235">(Bidang Sarana)</text>

                <!-- Lines ke tingkat bawah -->
                <line class="org-line" x1="200" y1="260" x2="200" y2="300"/>
                <line class="org-line" x1="500" y1="260" x2="500" y2="300"/>
                <line class="org-line" x1="800" y1="260" x2="800" y2="300"/>

                <!-- Bagian bawah -->
                <rect class="org-box" x="50" y="300" width="300" height="80" rx="8"/>
                <text class="org-text org-title" x="200" y="335">Kepala Tata Usaha</text>
                <text class="org-text" x="200" y="355">Suci Rahmawati, S.Pd</text>

                <rect class="org-box" x="350" y="300" width="300" height="80" rx="8"/>
                <text class="org-text org-title" x="500" y="335">Kepala Perpustakaan</text>
                <text class="org-text" x="500" y="355">Hendra Gunawan, S.Pd</text>

                <rect class="org-box" x="650" y="300" width="300" height="80" rx="8"/>
                <text class="org-text org-title" x="800" y="335">Kepala Laboratorium</text>
                <text class="org-text" x="800" y="355">Dr. Tri Handoko, M.Si</text>
            </svg>
        </div>

        <!-- DETAIL STRUKTUR -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 60px;">
            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); animation: fadeInUp 0.6s ease-out;">
                <h4 style="font-size: 20px; font-weight: 700; color: var(--primary-color); margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-user-tie"></i> Kepala Sekolah
                </h4>
                <p style="color: var(--text-muted); margin-bottom: 10px;"><strong>Drs. Ahmad Wijaya, M.Pd</strong></p>
                <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6;">
                    Bertanggung jawab penuh atas pelaksanaan pendidikan, pengembangan kurikulum, dan peningkatan kualitas sekolah secara keseluruhan.
                </p>
            </div>

            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); animation: fadeInUp 0.6s ease-out; animation-delay: 0.1s;">
                <h4 style="font-size: 20px; font-weight: 700; color: var(--primary-color); margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-book-open"></i> Wakil Kepala (Kurikulum)
                </h4>
                <p style="color: var(--text-muted); margin-bottom: 10px;"><strong>Rina Winarni, S.Pd</strong></p>
                <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6;">
                    Mengelola pengembangan kurikulum, perencanaan pembelajaran, dan penilaian pendidikan siswa.
                </p>
            </div>

            <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); animation: fadeInUp 0.6s ease-out; animation-delay: 0.2s;">
                <h4 style="font-size: 20px; font-weight: 700; color: var(--primary-color); margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <i class="fas fa-users"></i> Wakil Kepala (Kesiswaan)
                </h4>
                <p style="color: var(--text-muted); margin-bottom: 10px;"><strong>Budi Santoso, S.Pd</strong></p>
                <p style="color: var(--text-muted); font-size: 14px; line-height: 1.6;">
                    Membimbing dan membina siswa dalam pengembangan karakter, disiplin, dan ekstrakurikuler.
                </p>
            </div>
        </div>
    </div>
</section>
@endsection