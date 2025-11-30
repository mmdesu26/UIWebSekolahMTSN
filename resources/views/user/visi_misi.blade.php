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
                    "Terwujudnya Madrasah yang Islami, Berprestasi, dan Berwawasan Lingkungan"
                </p>
                <p style="font-size: 15px; opacity: 0.9; margin-top: 20px;">
                    Visi kami adalah menciptakan lembaga pendidikan yang tidak hanya unggul dalam bidang akademik, tetapi juga memiliki nilai-nilai Islami yang kuat dan kepedulian terhadap lingkungan sekitar.
                </p>
            </div>

            <!-- MISI -->
            <div style="background: white; padding: 50px; border-radius: 15px; animation: slideInUp 0.6s ease-out; box-shadow: 0 10px 30px rgba(0,0,0,0.08);">
                <h3 style="font-size: 28px; margin-bottom: 30px; color: var(--primary-color); display: flex; align-items: center; gap: 15px;">
                    <i class="fas fa-tasks" style="font-size: 32px;"></i>
                    Misi Kami
                </h3>
                <ul style="list-style: none; display: flex; flex-direction: column; gap: 20px;">
                    <li style="display: flex; gap: 15px; animation: slideInLeft 0.6s ease-out backwards;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">1</div>
                        <div>
                            <h4 style="font-weight: 700; color: var(--dark-text); margin-bottom: 5px;">Menyelenggarakan Pendidikan Berkualitas</h4>
                            <p style="color: var(--text-muted); font-size: 14px;">Memberikan pendidikan yang berkualitas dan berorientasi pada prestasi dengan standar internasional</p>
                        </div>
                    </li>
                    <li style="display: flex; gap: 15px; animation: slideInLeft 0.6s ease-out backwards; animation-delay: 0.1s;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">2</div>
                        <div>
                            <h4 style="font-weight: 700; color: var(--dark-text); margin-bottom: 5px;">Membentuk Karakter Islami</h4>
                            <p style="color: var(--text-muted); font-size: 14px;">Membina peserta didik yang berakhlak mulia dan berkarakter Islami dalam setiap aspek kehidupan</p>
                        </div>
                    </li>
                    <li style="display: flex; gap: 15px; animation: slideInLeft 0.6s ease-out backwards; animation-delay: 0.2s;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">3</div>
                        <div>
                            <h4 style="font-weight: 700; color: var(--dark-text); margin-bottom: 5px;">Mengembangkan Potensi Maksimal</h4>
                            <p style="color: var(--text-muted); font-size: 14px;">Mengembangkan potensi peserta didik di bidang akademik dan non-akademik secara optimal</p>
                        </div>
                    </li>
                    <li style="display: flex; gap: 15px; animation: slideInLeft 0.6s ease-out backwards; animation-delay: 0.3s;">
                        <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary-color), var(--accent-color)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; flex-shrink: 0;">4</div>
                        <div>
                            <h4 style="font-weight: 700; color: var(--dark-text); margin-bottom: 5px;">Menjaga Lingkungan</h4>
                            <p style="color: var(--text-muted); font-size: 14px;">Menciptakan lingkungan madrasah yang kondusif, aman, dan ramah lingkungan untuk pembelajaran</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- NILAI-NILAI INTI -->
        <div style="margin-top: 80px; text-align: center;">
            <h3 style="font-size: 32px; font-weight: 700; color: var(--dark-text); margin-bottom: 50px;">
                <i class="fas fa-heart"></i> Nilai-Nilai Inti Kami
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); animation: fadeInUp 0.6s ease-out; transition: all 0.3s;">
                    <i class="fas fa-mosque" style="font-size: 40px; color: var(--primary-color); margin-bottom: 15px;"></i>
                    <h4 style="font-size: 18px; font-weight: 700; margin-bottom: 10px; color: var(--dark-text);">Islami</h4>
                    <p style="color: var(--text-muted); font-size: 14px;">Menjunjung tinggi nilai-nilai Islam dalam setiap pembelajaran dan aktivitas</p>
                </div>
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); animation: fadeInUp 0.6s ease-out; animation-delay: 0.1s; transition: all 0.3s;">
                    <i class="fas fa-star" style="font-size: 40px; color: var(--primary-color); margin-bottom: 15px;"></i>
                    <h4 style="font-size: 18px; font-weight: 700; margin-bottom: 10px; color: var(--dark-text);">Berprestasi</h4>
                    <p style="color: var(--text-muted); font-size: 14px;">Selalu berusaha untuk meraih prestasi tertinggi dalam setiap kompetisi dan aktivitas</p>
                </div>
                <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); animation: fadeInUp 0.6s ease-out; animation-delay: 0.2s; transition: all 0.3s;">
                    <i class="fas fa-leaf" style="font-size: 40px; color: var(--primary-color); margin-bottom: 15px;"></i>
                    <h4 style="font-size: 18px; font-weight: 700; margin-bottom: 10px; color: var(--dark-text);">Berkelanjutan</h4>
                    <p style="color: var(--text-muted); font-size: 14px;">Menjaga kelestarian lingkungan untuk generasi mendatang dengan penuh tanggung jawab</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection