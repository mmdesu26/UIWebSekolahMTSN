@extends('layouts.app')

@section('title', 'Struktur Organisasi - MTsN 1 Magetan')

@section('content')
<section style="padding: 80px 0; background: var(--light-bg);">
    <div class="container">
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
        <div style="background: white; padding: 50px; border-radius: 18px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin-top: 50px;">
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

        <!-- INFO TAMBAHAN -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-top: 60px;">
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
        <div style="background: white; padding: 80px 40px; border-radius: 18px; text-align: center; box-shadow: 0 10px 30px rgba(0,0,0,0.08); margin-top: 50px;">
            <div style="width: 120px; height: 120px; margin: 0 auto 30px; background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                <i class="fas fa-sitemap" style="font-size: 56px; color: #cbd5e0;"></i>
            </div>
            <h3 style="font-size: 28px; font-weight: 700; color: var(--text-dark); margin-bottom: 15px;">
                Struktur Organisasi Belum Tersedia
            </h3>
            <p style="font-size: 16px; color: var(--text-muted); margin-bottom: 30px; line-height: 1.6; max-width: 500px; margin-left: auto; margin-right: auto;">
                Data struktur organisasi sekolah sedang dalam proses penyusunan oleh administrator.
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

        <!-- SECTION DAFTAR GURU -->
        <div style="margin-top: 80px;">
            <div class="section-header" style="text-align: center; margin-bottom: 50px;">
                <h2 class="section-title" style="font-size: 32px; font-weight: 700; color: var(--primary-color); margin-bottom: 15px;">
                    Daftar Guru & Tenaga Pendidik
                </h2>
                <p class="section-subtitle" style="font-size: 16px; color: var(--text-muted);">
                    Tim pengajar profesional dan berpengalaman
                </p>
                <a href="{{ route('profil.guru') }}" class="btn-lihat-semua" style="display: inline-block; margin-top: 20px; padding: 12px 30px; background: var(--primary-color); color: white; text-decoration: none; border-radius: 10px; font-weight: 600; transition: all 0.3s ease; box-shadow: 0 4px 12px rgba(26, 95, 58, 0.25);">
                    <i class="fas fa-users" style="margin-right: 8px;"></i> Lihat Semua Guru
                </a>
            </div>
        </div>

    </div>
</section>

<style>
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

.btn-lihat-semua:hover {
    background: #134a2c;
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(26, 95, 58, 0.4);
}

#imageModal {
    backdrop-filter: blur(10px);
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
</script>

@endsection