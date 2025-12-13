@extends('layouts.app')

@section('title', 'Visi & Misi - MTsN 1 Magetan')

@section('content')
<section style="padding: 80px 0; background: var(--light-bg);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Visi & Misi</h2>
            <p class="section-subtitle">Komitmen kami untuk memberikan pendidikan terbaik</p>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; margin-top: 50px;">
            <!-- VISI -->
            <div style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: white; padding: 50px; border-radius: 15px; animation: slideInUp 0.6s ease-out; box-shadow: 0 20px 50px rgba(26,95,58,0.2);">
                <h3 style="font-size: 28px; margin-bottom: 20px; display: flex; align-items: center; gap: 15px;">
                    <i class="fas fa-lightbulb" style="font-size: 32px;"></i>
                    Visi Kami
                </h3>
                <p style="font-size: 18px; line-height: 1.8; font-weight: 500;">
                    {{ $visiMisi['visi'] ?? 'Visi belum diatur' }}
                </p>
            </div>

            <!-- MISI -->
            <div style="background: white; padding: 50px; border-radius: 15px; animation: slideInUp 0.6s ease-out; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
                <h3 style="font-size: 28px; margin-bottom: 30px; color: var(--primary-color); display: flex; align-items: center; gap: 15px;">
                    <i class="fas fa-tasks" style="font-size: 32px;"></i>
                    Misi Kami
                </h3>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 20px;">
                    @if(isset($visiMisi['misi']) && !empty($visiMisi['misi']))
                        @php
                            $misiList = explode("\n", $visiMisi['misi']);
                            $misiList = array_filter(array_map('trim', $misiList));
                            $counter = 0;
                        @endphp
                        @foreach($misiList as $misi)
                            @php $counter++; @endphp
                            <li style="display: flex; gap: 15px; animation: slideInLeft 0.6s ease-out backwards; animation-delay: {{ ($counter - 1) * 0.1 }}s;">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">{{ $counter }}</div>
                                <div>
                                    <p style="color: var(--dark-text); font-size: 15px; line-height: 1.6;">{{ $misi }}</p>
                                </div>
                            </li>
                        @endforeach
                    @else
                        <li style="display: flex; gap: 15px;">
                            <div style="color: var(--text-muted);">Misi belum diatur</div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <!-- NILAI-NILAI INTI -->
        <div style="margin-top: 80px; text-align: center;">
            <h3 style="font-size: 32px; font-weight: 700; color: var(--dark-text); margin-bottom: 50px;" data-aos="fade-up">
                <i class=></i> Nilai-Nilai Inti Kami
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                <div class="nilai-item" data-aos="zoom-in" data-aos-delay="100">
                    <div class="nilai-icon">
                        <i class="fas fa-mosque"></i>
                    </div>
                    <h4>Islami</h4>
                    <p>Menjunjung tinggi nilai-nilai Islam dalam setiap pembelajaran dan aktivitas</p>
                </div>
                <div class="nilai-item" data-aos="zoom-in" data-aos-delay="150">
                    <div class="nilai-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>Berprestasi</h4>
                    <p>Selalu berusaha untuk meraih prestasi tertinggi dalam setiap kompetisi dan aktivitas</p>
                </div>
                <div class="nilai-item" data-aos="zoom-in" data-aos-delay="200">
                    <div class="nilai-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h4>Berkelanjutan</h4>
                    <p>Menjaga kelestarian lingkungan untuk generasi mendatang dengan penuh tanggung jawab</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Animasi untuk Nilai-Nilai Inti */
.nilai-item {
    background: white;
    padding: 40px 25px;
    border-radius: 15px;
    text-align: center;
    transition: all 0.3s;
    border: 2px solid transparent;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}

.nilai-item:hover {
    transform: translateY(-10px);
    border-color: var(--primary-color);
    box-shadow: 0 15px 40px rgba(26,95,58,0.15);
}

.nilai-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 40px;
    margin: 0 auto 20px;
    transition: all 0.3s;
}

.nilai-item:hover .nilai-icon {
    transform: rotateY(360deg);
    background: linear-gradient(135deg, var(--accent-color), #e67e22);
}

.nilai-item h4 {
    font-size: 18px;
    font-weight: 700;
    color: var(--dark-text);
    margin-bottom: 10px;
}

.nilai-item p {
    font-size: 14px;
    color: var(--text-muted);
    margin: 0;
    line-height: 1.6;
}

@media (max-width: 768px) {
    section {
        padding: 40px 0 !important;
    }
    
    div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
    
    div[style*="padding: 50px"] {
        padding: 30px !important;
    }
    
    h3[style*="font-size: 28px"] {
        font-size: 22px !important;
    }
    
    p[style*="font-size: 18px"] {
        font-size: 16px !important;
    }
}
</style>

<!-- AOS Library -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        once: true,
        offset: 100
    });
</script>
@endsection