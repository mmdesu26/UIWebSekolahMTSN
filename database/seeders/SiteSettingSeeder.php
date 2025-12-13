<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run()
    {
        $defaults = [
            'hero_title'       => 'Selamat Datang di MTsN 1 Magetan',
            'hero_subtitle'    => 'TERWUJUDNYA SISWA YANG BERPRESTASI, MANDIRI, DAN BERAKHLAQUL KARIMAH',
            'akreditasi'       => 'Akreditasi A',
            'jumlah_siswa'     => '1200+ Siswa',
            'jumlah_guru'      => '80+ Guru',
            'program_sks'      => 'Program SKS 2 Tahun',
            'visi'             => 'Terwujudnya Madrasah yang Islami, Berprestasi, dan Berwawasan Lingkungan',
            'misi_1'           => 'Menyelenggarakan pendidikan yang berkualitas dan berorientasi pada prestasi',
            'misi_2'           => 'Membentuk peserta didik yang berakhlak mulia dan berkarakter Islami',
            'misi_3'           => 'Mengembangkan potensi akademik dan non-akademik siswa',
            'misi_4'           => 'Menciptakan lingkungan madrasah yang kondusif dan ramah lingkungan',
            'ppdb_tahun'       => '2026/2027',
            'ppdb_judul'       => 'Penerimaan Peserta Didik Baru',
            'ppdb_deskripsi'   => 'Bergabunglah dengan MTsN 1 Magetan dan wujudkan masa depan gemilang bersama kami!',
            'contact_address'  => 'Jl. Raya Magetan - Maospati KM. 4, Magetan, Jawa Timur',
            'contact_phone'    => '(0351) 891234',
            'contact_email'    => 'info@mtsn1magetan.sch.id',
            'contact_hours'    => 'Senin - Jumat: 07.00 - 16.00 | Sabtu: 07.00 - 12.00',
        ];

        foreach ($defaults as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}