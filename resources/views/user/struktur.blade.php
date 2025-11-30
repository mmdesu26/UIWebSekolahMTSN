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

        <!-- SECTION DAFTAR GURU - BARU DITAMBAHKAN -->
        <div style="margin-top: 80px;">
            <div class="section-header" style="text-align: center; margin-bottom: 50px;">
                <h2 class="section-title">Daftar Guru & Tenaga Pendidik</h2>
                <p class="section-subtitle">Tim pengajar profesional dan berpengalaman</p>
                <a href="{{ route('profil.guru') }}" class="btn-lihat-semua" style="display: inline-block; margin-top: 20px; padding: 12px 30px; background: var(--primary-color); color: white; text-decoration: none; border-radius: 8px; font-weight: 600; transition: all 0.3s ease;">
                    <i class="fas fa-users" style="margin-right: 8px;"></i> Lihat Semua Guru
                </a>
            </div>

            <!-- Filter Mata Pelajaran -->
            <div class="filter-mapel" style="text-align: center; margin-bottom: 40px;">
                <button class="filter-btn active" data-filter="all" style="margin: 5px; padding: 10px 25px; border: 2px solid var(--primary-color); background: var(--primary-color); color: white; border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                    Semua Guru
                </button>
                <button class="filter-btn" data-filter="matematika" style="margin: 5px; padding: 10px 25px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                    Matematika
                </button>
                <button class="filter-btn" data-filter="ipa" style="margin: 5px; padding: 10px 25px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                    IPA
                </button>
                <button class="filter-btn" data-filter="bahasa" style="margin: 5px; padding: 10px 25px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                    Bahasa
                </button>
                <button class="filter-btn" data-filter="agama" style="margin: 5px; padding: 10px 25px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                    Agama
                </button>
                <button class="filter-btn" data-filter="seni" style="margin: 5px; padding: 10px 25px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; transition: all 0.3s ease;">
                    Seni & Olahraga
                </button>
            </div>

            <!-- Grid Daftar Guru -->
            <div class="guru-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 30px;">
                
                <!-- Card Guru 1 -->
                <div class="guru-card" data-category="matematika" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                    <div class="guru-image" style="width: 100%; height: 280px; background: linear-gradient(135deg, #1a5f3a, #2d8659); position: relative; overflow: hidden;">
                        <img src="{{ asset('images/guru/guru1.jpg') }}" alt="Guru" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); padding: 20px 15px 15px;">
                            <span style="background: var(--accent-color); color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">Matematika</span>
                        </div>
                    </div>
                    <div class="guru-info" style="padding: 20px;">
                        <h4 style="font-size: 18px; font-weight: 700; color: var(--primary-color); margin-bottom: 8px;">Dr. Siti Aminah, M.Pd</h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">
                            <i class="fas fa-chalkboard-teacher" style="color: var(--accent-color); margin-right: 5px;"></i>
                            Guru Matematika
                        </p>
                        <div class="mapel-badges" style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 15px;">
                            <span style="background: #e8f5e9; color: #2e7d32; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Aljabar</span>
                            <span style="background: #e8f5e9; color: #2e7d32; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Geometri</span>
                        </div>
                        <p style="color: #888; font-size: 13px; line-height: 1.6; margin-bottom: 15px;">Mengajar sejak 2010, berpengalaman dalam pengembangan metode pembelajaran matematika modern.</p>
                        <div style="display: flex; gap: 10px;">
                            <a href="mailto:siti.aminah@mtsn1magetan.sch.id" style="flex: 1; text-align: center; padding: 8px; background: #f5f5f5; color: var(--primary-color); border-radius: 8px; text-decoration: none; font-size: 13px; transition: all 0.3s;">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Guru 2 -->
                <div class="guru-card" data-category="ipa" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                    <div class="guru-image" style="width: 100%; height: 280px; background: linear-gradient(135deg, #1a5f3a, #2d8659); position: relative; overflow: hidden;">
                        <img src="{{ asset('images/guru/guru2.jpg') }}" alt="Guru" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); padding: 20px 15px 15px;">
                            <span style="background: var(--accent-color); color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">IPA</span>
                        </div>
                    </div>
                    <div class="guru-info" style="padding: 20px;">
                        <h4 style="font-size: 18px; font-weight: 700; color: var(--primary-color); margin-bottom: 8px;">Drs. Bambang Suryadi, M.Si</h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">
                            <i class="fas fa-flask" style="color: var(--accent-color); margin-right: 5px;"></i>
                            Guru IPA (Biologi & Kimia)
                        </p>
                        <div class="mapel-badges" style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 15px;">
                            <span style="background: #e3f2fd; color: #1565c0; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Biologi</span>
                            <span style="background: #e3f2fd; color: #1565c0; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Kimia</span>
                        </div>
                        <p style="color: #888; font-size: 13px; line-height: 1.6; margin-bottom: 15px;">Spesialis pembelajaran IPA praktikum, aktif dalam penelitian pendidikan sains.</p>
                        <div style="display: flex; gap: 10px;">
                            <a href="mailto:bambang.s@mtsn1magetan.sch.id" style="flex: 1; text-align: center; padding: 8px; background: #f5f5f5; color: var(--primary-color); border-radius: 8px; text-decoration: none; font-size: 13px; transition: all 0.3s;">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Guru 3 -->
                <div class="guru-card" data-category="bahasa" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                    <div class="guru-image" style="width: 100%; height: 280px; background: linear-gradient(135deg, #1a5f3a, #2d8659); position: relative; overflow: hidden;">
                        <img src="{{ asset('images/guru/guru3.jpg') }}" alt="Guru" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); padding: 20px 15px 15px;">
                            <span style="background: var(--accent-color); color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">Bahasa Indonesia</span>
                        </div>
                    </div>
                    <div class="guru-info" style="padding: 20px;">
                        <h4 style="font-size: 18px; font-weight: 700; color: var(--primary-color); margin-bottom: 8px;">Dewi Lestari, S.Pd, M.Pd</h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">
                            <i class="fas fa-book" style="color: var(--accent-color); margin-right: 5px;"></i>
                            Guru Bahasa Indonesia
                        </p>
                        <div class="mapel-badges" style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 15px;">
                            <span style="background: #fff3e0; color: #e65100; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Sastra</span>
                            <span style="background: #fff3e0; color: #e65100; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Menulis</span>
                        </div>
                        <p style="color: #888; font-size: 13px; line-height: 1.6; margin-bottom: 15px;">Pembina jurnalistik sekolah dan aktif dalam lomba literasi nasional.</p>
                        <div style="display: flex; gap: 10px;">
                            <a href="mailto:dewi.lestari@mtsn1magetan.sch.id" style="flex: 1; text-align: center; padding: 8px; background: #f5f5f5; color: var(--primary-color); border-radius: 8px; text-decoration: none; font-size: 13px; transition: all 0.3s;">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Card Guru 4 -->
                <div class="guru-card" data-category="agama" style="background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s ease;">
                    <div class="guru-image" style="width: 100%; height: 280px; background: linear-gradient(135deg, #1a5f3a, #2d8659); position: relative; overflow: hidden;">
                        <img src="{{ asset('images/guru/guru4.jpg') }}" alt="Guru" style="width: 100%; height: 100%; object-fit: cover;">
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.7), transparent); padding: 20px 15px 15px;">
                            <span style="background: var(--accent-color); color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">PAI</span>
                        </div>
                    </div>
                    <div class="guru-info" style="padding: 20px;">
                        <h4 style="font-size: 18px; font-weight: 700; color: var(--primary-color); margin-bottom: 8px;">Ustadz Ahmad Fauzi, Lc, M.A</h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 15px;">
                            <i class="fas fa-mosque" style="color: var(--accent-color); margin-right: 5px;"></i>
                            Guru Pendidikan Agama Islam
                        </p>
                        <div class="mapel-badges" style="display: flex; flex-wrap: wrap; gap: 8px; margin-bottom: 15px;">
                            <span style="background: #f3e5f5; color: #6a1b9a; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Al-Quran</span>
                            <span style="background: #f3e5f5; color: #6a1b9a; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Fiqih</span>
                            <span style="background: #f3e5f5; color: #6a1b9a; padding: 4px 10px; border-radius: 12px; font-size: 12px;">Akidah</span>
                        </div>
                        <p style="color: #888; font-size: 13px; line-height: 1.6; margin-bottom: 15px;">Lulusan Universitas Al-Azhar, Kairo. Pembina tahfidz dan kajian keislaman.</p>
                        <div style="display: flex; gap: 10px;">
                            <a href="mailto:ahmad.fauzi@mtsn1magetan.sch.id" style="flex: 1; text-align: center; padding: 8px; background: #f5f5f5; color: var(--primary-color); border-radius: 8px; text-decoration: none; font-size: 13px; transition: all 0.3s;">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Tombol Lihat Semua (bawah) -->
            <div style="text-align: center; margin-top: 50px;">
                <a href="{{ route('profil.guru') }}" class="btn-primary" style="display: inline-block; padding: 15px 40px; background: var(--primary-color); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; font-size: 16px; box-shadow: 0 5px 15px rgba(26, 95, 58, 0.3); transition: all 0.3s ease;">
                    <i class="fas fa-arrow-right" style="margin-left: 8px;"></i> Lihat Semua Guru ({{ $jumlah_guru ?? '30+' }} Guru)
                </a>
            </div>
        </div>

    </div>
</section>

<!-- CSS & JavaScript untuk Filter -->
<style>
.guru-card {
    animation: fadeInUp 0.6s ease-out;
    opacity: 1;
    transform: translateY(0);
}

.guru-card.hide {
    display: none;
}

.guru-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.15);
}

.guru-image img {
    transition: transform 0.3s ease;
}

.guru-card:hover .guru-image img {
    transform: scale(1.1);
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-color) !important;
    color: white !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(26, 95, 58, 0.3);
}

.btn-lihat-semua:hover,
.btn-primary:hover {
    background: #134a2c;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(26, 95, 58, 0.4);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Responsive */
@media (max-width: 768px) {
    .guru-grid {
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }
    
    .filter-mapel {
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 10px;
    }
    
    .filter-btn {
        display: inline-block;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const guruCards = document.querySelectorAll('.guru-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');

            // Filter cards
            guruCards.forEach(card => {
                const category = card.getAttribute('data-category');
                
                if (filterValue === 'all' || category === filterValue) {
                    card.classList.remove('hide');
                    card.style.animation = 'fadeInUp 0.5s ease-out';
                } else {
                    card.classList.add('hide');
                }
            });
        });
    });
});
</script>

@endsection