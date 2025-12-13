@extends('layouts.app')

@section('title', 'Struktur Organisasi - MTsN 1 Magetan')

@section('content')
<section style="padding: 80px 0; background: var(--light-bg);">
    <div class="container">
        <!-- HEADER SECTION -->
        <div class="section-header" style="text-align: center; margin-bottom: 50px;">
            <h2 class="section-title" style="font-size: 42px; font-weight: 800; color: var(--primary-color); margin-bottom: 15px;">
                Struktur Organisasi
            </h2>
            <p class="section-subtitle" style="font-size: 18px; color: var(--text-muted);">
                Manajemen dan kepemimpinan MTsN 1 Magetan
            </p>
            <div style="width: 80px; height: 4px; background: var(--accent-color); margin: 20px auto; border-radius: 2px;"></div>
        </div>

        @if($strukturGambar)
        <!-- GAMBAR STRUKTUR ORGANISASI -->
        <div style="background: white; padding: 50px; border-radius: 18px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin-bottom: 80px;">
            <div style="text-align: center; margin-bottom: 30px;">
                <h3 style="font-size: 24px; font-weight: 700; color: var(--text-dark); margin-bottom: 10px;">
                    <i class="fas fa-sitemap" style="color: var(--primary-color); margin-right: 10px;"></i>
                    Bagan Struktur Organisasi Sekolah
                </h3>
                <p style="font-size: 14px; color: var(--text-muted);">
                    Klik gambar untuk memperbesar
                </p>
            </div>

            <div style="position: relative; overflow: hidden; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.12); cursor: pointer;" onclick="openImageModal()">
                <img 
                    src="{{ asset('storage/' . $strukturGambar) }}" 
                    alt="Struktur Organisasi MTsN 1 Magetan" 
                    style="width: 100%; height: auto; display: block; transition: transform 0.3s ease;"
                    onmouseover="this.style.transform='scale(1.02)'"
                    onmouseout="this.style.transform='scale(1)'"
                >
                <div style="position: absolute; bottom: 20px; right: 20px; background: rgba(0,0,0,0.7); color: white; padding: 10px 16px; border-radius: 8px; font-size: 13px; font-weight: 600;">
                    <i class="fas fa-search-plus"></i> Klik untuk zoom
                </div>
            </div>
        </div>

        <!-- Modal Zoom Gambar -->
        <div id="imageModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.95); z-index: 9999; align-items: center; justify-content: center; padding: 20px;" onclick="closeImageModal()">
            <div style="position: relative; max-width: 95%; max-height: 95%; text-align: center;">
                <button onclick="closeImageModal()" style="position: absolute; top: -40px; right: 0; background: white; border: none; width: 40px; height: 40px; border-radius: 50%; cursor: pointer; font-size: 20px; color: #333; box-shadow: 0 4px 12px rgba(0,0,0,0.3); transition: all 0.3s;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    <i class="fas fa-times"></i>
                </button>
                <img 
                    src="{{ asset('storage/' . $strukturGambar) }}" 
                    alt="Struktur Organisasi MTsN 1 Magetan" 
                    style="max-width: 100%; max-height: 90vh; border-radius: 12px; box-shadow: 0 20px 60px rgba(0,0,0,0.5);"
                >
                <div style="margin-top: 20px; color: white; font-size: 14px; font-weight: 600;">
                    <i class="fas fa-info-circle"></i> Klik di luar gambar untuk menutup
                </div>
            </div>
        </div>

        <!-- INFO BOXES -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 80px;">
            <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)'">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);">
                    <i class="fas fa-user-tie" style="font-size: 28px; color: white;"></i>
                </div>
                <h4 style="font-size: 20px; font-weight: 700; color: var(--primary-color); margin-bottom: 12px;">
                    Kepemimpinan
                </h4>
                <p style="color: var(--text-muted); font-size: 14px; line-height: 1.7; margin: 0;">
                    Struktur organisasi kami dirancang untuk memastikan koordinasi yang efektif antara berbagai bidang dalam mencapai visi dan misi sekolah.
                </p>
            </div>

            <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)'">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #f093fb, #f5576c); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 8px 16px rgba(245, 87, 108, 0.3);">
                    <i class="fas fa-users-cog" style="font-size: 28px; color: white;"></i>
                </div>
                <h4 style="font-size: 20px; font-weight: 700; color: var(--primary-color); margin-bottom: 12px;">
                    Koordinasi
                </h4>
                <p style="color: var(--text-muted); font-size: 14px; line-height: 1.7; margin: 0;">
                    Setiap bagian memiliki peran dan tanggung jawab yang jelas untuk memastikan kelancaran operasional sekolah.
                </p>
            </div>

            <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); transition: all 0.3s;" onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0 15px 40px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 5px 20px rgba(0,0,0,0.08)'">
                <div style="width: 60px; height: 60px; background: linear-gradient(135deg, #4facfe, #00f2fe); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; box-shadow: 0 8px 16px rgba(79, 172, 254, 0.3);">
                    <i class="fas fa-chart-line" style="font-size: 28px; color: white;"></i>
                </div>
                <h4 style="font-size: 20px; font-weight: 700; color: var(--primary-color); margin-bottom: 12px;">
                    Transparansi
                </h4>
                <p style="color: var(--text-muted); font-size: 14px; line-height: 1.7; margin: 0;">
                    Kami berkomitmen pada transparansi dalam manajemen untuk membangun kepercayaan dengan seluruh stakeholder.
                </p>
            </div>
        </div>
        @else
        <!-- EMPTY STATE - Gambar Belum Ada -->
        <div style="background: white; padding: 80px 40px; border-radius: 18px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin-bottom: 80px;">
            <div style="width: 120px; height: 120px; margin: 0 auto 30px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-sitemap" style="font-size: 56px; color: #cbd5e0;"></i>
            </div>
            <h3 style="font-size: 28px; font-weight: 700; color: var(--text-dark); margin-bottom: 15px;">
                Struktur Organisasi Belum Tersedia
            </h3>
            <p style="font-size: 16px; color: var(--text-muted); margin-bottom: 30px; line-height: 1.6; max-width: 500px; margin-left: auto; margin-right: auto;">
                Data struktur organisasi sekolah sedang dalam proses penyusunan oleh administrator.
            </p>
        </div>
        @endif

        <!-- ============================= -->
        <!-- SECTION DAFTAR GURU -->
        <!-- ============================= -->
        <div style="margin-top: 80px;">
            <div class="section-header" style="text-align: center; margin-bottom: 50px;">
                <h2 class="section-title" style="font-size: 42px; font-weight: 800; color: var(--primary-color); margin-bottom: 15px;">
                    Tenaga Pengajar
                </h2>
                <p class="section-subtitle" style="font-size: 18px; color: var(--text-muted);">
                    Tim pengajar profesional dan berpengalaman di MTsN 1 Magetan
                </p>
                <div style="width: 80px; height: 4px; background: var(--accent-color); margin: 20px auto; border-radius: 2px;"></div>
            </div>

            @if(count($guru) > 0)
            <!-- Filter Mata Pelajaran -->
            <div class="filter-mapel" style="text-align: center; margin-bottom: 50px;">
                <button class="filter-btn active" data-filter="all" style="margin: 8px; padding: 12px 28px; border: 2px solid var(--primary-color); background: var(--primary-color); color: white; border-radius: 25px; cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(26, 95, 58, 0.2);">
                    <i class="fas fa-users" style="margin-right: 6px;"></i> Semua Guru
                </button>
                <button class="filter-btn" data-filter="matematika" style="margin: 8px; padding: 12px 28px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.3s ease;">
                    <i class="fas fa-calculator" style="margin-right: 6px;"></i> Matematika
                </button>
                <button class="filter-btn" data-filter="ipa" style="margin: 8px; padding: 12px 28px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.3s ease;">
                    <i class="fas fa-flask" style="margin-right: 6px;"></i> IPA
                </button>
                <button class="filter-btn" data-filter="bahasa" style="margin: 8px; padding: 12px 28px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.3s ease;">
                    <i class="fas fa-book" style="margin-right: 6px;"></i> Bahasa
                </button>
                <button class="filter-btn" data-filter="agama" style="margin: 8px; padding: 12px 28px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.3s ease;">
                    <i class="fas fa-mosque" style="margin-right: 6px;"></i> Agama
                </button>
                <button class="filter-btn" data-filter="seni" style="margin: 8px; padding: 12px 28px; border: 2px solid var(--primary-color); background: white; color: var(--primary-color); border-radius: 25px; cursor: pointer; font-weight: 600; font-size: 14px; transition: all 0.3s ease;">
                    <i class="fas fa-palette" style="margin-right: 6px;"></i> Seni & Olahraga
                </button>
            </div>

            <!-- Grid Daftar Guru -->
            <div class="guru-grid" style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 35px;">
                
                @foreach($guru as $g)
                <div class="guru-card" data-category="{{ $g->kategori }}" style="background: white; border-radius: 18px; overflow: hidden; box-shadow: 0 8px 25px rgba(0,0,0,0.1); transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);">
                    <div class="guru-image" style="width: 100%; height: 300px; background: linear-gradient(135deg, #1a5f3a, #2d8659); position: relative; overflow: hidden;">
                        @if($g->foto_url)
                            {{-- ✅ GUNAKAN FOTO DARI DATABASE --}}
                            <img src="{{ $g->foto_url }}" alt="{{ $g->nama }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.4s ease;">
                        @else
                            {{-- ✅ FALLBACK: Gambar default jika tidak ada foto --}}
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, #1a5f3a, #2d8659);">
                                <i class="fas fa-user-circle" style="font-size: 120px; color: rgba(255,255,255,0.3);"></i>
                            </div>
                        @endif
                        <div style="position: absolute; bottom: 0; left: 0; right: 0; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); padding: 25px 20px 18px;">
                            <span style="background: var(--accent-color); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(0,0,0,0.3);">
                                {{ $g->mata_pelajaran }}
                            </span>
                        </div>
                    </div>
                    <div class="guru-info" style="padding: 25px;">
                        <h4 style="font-size: 19px; font-weight: 700; color: var(--primary-color); margin-bottom: 10px; line-height: 1.3;">
                            {{ $g->nama }}
                        </h4>
                        <p style="color: #666; font-size: 14px; margin-bottom: 16px; display: flex; align-items: center; gap: 8px;">
                            <i class="fas fa-chalkboard-teacher" style="color: var(--accent-color);"></i>
                            Guru {{ $g->mata_pelajaran }}
                        </p>
                        <div style="display: flex; align-items: center; gap: 8px; padding: 10px 14px; background: #f8f9fa; border-radius: 10px; margin-bottom: 18px;">
                            <i class="fas fa-id-card" style="color: var(--primary-color); font-size: 14px;"></i>
                            <code style="color: #666; font-size: 12px; font-weight: 600; font-family: 'Courier New', monospace;">
                                NIP: {{ $g->nip_display }}
                            </code>
                        </div>
                        <div style="display: flex; gap: 10px; margin-top: 20px;">
                            <a href="mailto:{{ $g->email_auto }}" style="flex: 1; text-align: center; padding: 10px; background: #f5f5f5; color: var(--primary-color); border-radius: 10px; text-decoration: none; font-size: 13px; font-weight: 600; transition: all 0.3s; display: flex; align-items: center; justify-content: center; gap: 6px;">
                                <i class="fas fa-envelope"></i> Email
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

            <!-- Stats Summary -->
            <div style="margin-top: 80px; background: white; padding: 50px; border-radius: 18px; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                <div style="text-align: center; margin-bottom: 40px;">
                    <h3 style="font-size: 32px; font-weight: 700; color: var(--primary-color); margin-bottom: 10px;">
                        Statistik Tenaga Pengajar
                    </h3>
                    <p style="color: var(--text-muted); font-size: 16px;">
                        Komposisi dan kualifikasi guru MTsN 1 Magetan
                    </p>
                </div>
                
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px;">
                    <div style="text-align: center; padding: 30px; background: linear-gradient(135deg, #f8f9fa, #e8f5e9); border-radius: 15px;">
                        <div style="font-size: 48px; font-weight: 800; color: var(--primary-color); margin-bottom: 10px;">
                            {{ $jumlah_guru }}
                        </div>
                        <div style="font-size: 14px; color: var(--text-light); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                            Total Guru
                        </div>
                    </div>
                    
                    <div style="text-align: center; padding: 30px; background: linear-gradient(135deg, #fff3e0, #ffe0b2); border-radius: 15px;">
                        <div style="font-size: 48px; font-weight: 800; color: #e65100; margin-bottom: 10px;">
                            95%
                        </div>
                        <div style="font-size: 14px; color: var(--text-light); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                            S1
                        </div>
                    </div>
                    
                    <div style="text-align: center; padding: 30px; background: linear-gradient(135deg, #f3e5f5, #e1bee7); border-radius: 15px;">
                        <div style="font-size: 48px; font-weight: 800; color: #6a1b9a; margin-bottom: 10px;">
                            100%
                        </div>
                        <div style="font-size: 14px; color: var(--text-light); font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">
                            Bersertifikat
                        </div>
                    </div>
                </div>
            </div>

            @else
            <!-- EMPTY STATE - Data Guru Belum Ada -->
            <div style="background: white; padding: 80px 40px; border-radius: 18px; text-align: center; box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                <div style="width: 120px; height: 120px; margin: 0 auto 30px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-user-friends" style="font-size: 56px; color: #cbd5e0;"></i>
                </div>
                <h3 style="font-size: 28px; font-weight: 700; color: var(--text-dark); margin-bottom: 15px;">
                    Data Guru Belum Tersedia
                </h3>
                <p style="font-size: 16px; color: var(--text-muted); margin-bottom: 30px; line-height: 1.6; max-width: 500px; margin-left: auto; margin-right: auto;">
                    Saat ini data guru belum dimasukkan oleh administrator. Silakan hubungi admin sekolah untuk informasi lebih lanjut.
                </p>
                <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                    <a href="{{ route('kontak') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; background: var(--primary-color); color: white; border-radius: 10px; text-decoration: none; font-weight: 600; transition: all 0.3s; box-shadow: 0 4px 12px rgba(26, 95, 58, 0.25);">
                        <i class="fas fa-phone"></i> Hubungi Admin
                    </a>
                    <a href="{{ route('home') }}" style="display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; background: #f8f9fa; color: var(--text-dark); border-radius: 10px; text-decoration: none; font-weight: 600; transition: all 0.3s;">
                        <i class="fas fa-home"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
            @endif

        </div>

    </div>
</section>

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
    transform: translateY(-12px);
    box-shadow: 0 20px 50px rgba(0,0,0,0.18);
}

.guru-card:hover .guru-image img {
    transform: scale(1.12);
}

.filter-btn:hover,
.filter-btn.active {
    background: var(--primary-color) !important;
    color: white !important;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(26, 95, 58, 0.35);
}

.guru-info a:hover {
    background: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(26, 95, 58, 0.25);
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .guru-grid {
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 25px;
    }
    
    .filter-mapel {
        overflow-x: auto;
        white-space: nowrap;
        padding-bottom: 15px;
    }
    
    .filter-btn {
        display: inline-block;
        font-size: 13px;
        padding: 10px 20px;
    }
}
</style>

<script>
function openImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    const modal = document.getElementById('imageModal');
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});

// Filter Guru
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const guruCards = document.querySelectorAll('.guru-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const filterValue = this.getAttribute('data-filter');

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