@extends('layouts.app')

@section('title', 'Sejarah Sekolah - MTsN 1 Magetan')

@section('content')
<section style="padding: 80px 0; background: white;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Sejarah Sekolah</h2>
            <p class="section-subtitle">Perjalanan MTsN 1 Magetan sejak awal berdiri</p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center; margin-top: 50px;">
            <div style="animation: slideInLeft 0.8s ease-out;">
                <img src="https://via.placeholder.com/500x400/1a5f3a/ffffff?text=Sejarah" alt="Sejarah" style="width: 100%; border-radius: 15px; box-shadow: 0 20px 50px rgba(26,95,58,0.2);">
            </div>
            <div style="animation: slideInRight 0.8s ease-out;">
                <h3 style="font-size: 28px; font-weight: 700; color: var(--primary-color); margin-bottom: 20px;">
                    <i class="fas fa-book-open"></i> Perjalanan Kami
                </h3>
                <p style="color: var(--text-muted); font-size: 16px; line-height: 1.8; margin-bottom: 20px;">
                    MTsN 1 Magetan didirikan pada tahun 1975 sebagai salah satu lembaga pendidikan menengah pertama yang bernuansa Islami di Kabupaten Magetan. Pada awalnya, sekolah ini memulai dengan fasilitas yang terbatas namun memiliki visi besar untuk mencetak generasi penerus bangsa yang berakhlak mulia.
                </p>

                <p style="color: var(--text-muted); font-size: 16px; line-height: 1.8; margin-bottom: 20px;">
                    Seiring dengan berjalannya waktu, MTsN 1 Magetan terus berkembang dan mengalami peningkatan kualitas. Pada tahun 1990, sekolah ini menambah fasilitas berupa laboratorium IPA dan laboratorium bahasa. Kemudian pada tahun 2000, sekolah ini berhasil meraih akreditasi A dari BAN-S/M.
                </p>

                <p style="color: var(--text-muted); font-size: 16px; line-height: 1.8; margin-bottom: 20px;">
                    Hingga saat ini, MTsN 1 Magetan telah menjadi salah satu sekolah terkemuka di Kabupaten Magetan dengan ribuan alumni yang telah tersebar di berbagai institusi pendidikan dan lembaga pemerintahan. Prestasi demi prestasi terus diraih baik dalam bidang akademik maupun non-akademik.
                </p>

                <div style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); padding: 30px; border-radius: 12px; color: white; margin-top: 30px;">
                    <h4 style="font-size: 20px; margin-bottom: 15px;">
                        <i class="fas fa-star"></i> Milestone Penting
                    </h4>
                    <ul style="list-style: none; display: flex; flex-direction: column; gap: 10px;">
                        <li><i class="fas fa-check-circle"></i> <strong>1975:</strong> Sekolah didirikan</li>
                        <li><i class="fas fa-check-circle"></i> <strong>1990:</strong> Penambahan fasilitas laboratorium</li>
                        <li><i class="fas fa-check-circle"></i> <strong>2000:</strong> Meraih akreditasi A</li>
                        <li><i class="fas fa-check-circle"></i> <strong>2025:</strong> Terus berkembang dan berinovasi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection