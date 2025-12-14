<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerSeeder extends Seeder
{
    public function run()
    {
        $ekskul = [
            [
                'name'     => 'Pramuka',
                'jadwal'   => 'Sabtu, 07:00–10:00',
                'pembina'  => 'Ahmad Subandi',
                'prestasi' => "Juara 2 Nembeng Campursari Putri\nJuara 1 Kata Perorangan SMP 7-8 Putri\nJuara 2 Kata Perorangan Kejurnas Karate",
            ],
            [
                'name'     => 'PMR',
                'jadwal'   => 'Jumat, 15:00–17:00',
                'pembina'  => 'Nurul Hidayah',
                'prestasi' => '',
            ],
            [
                'name'     => 'Banjari',
                'jadwal'   => 'Kamis, 15:00–17:00',
                'pembina'  => 'Muhammad Ali',
                'prestasi' => '',
            ],
            [
                'name'     => 'Drumband',
                'jadwal'   => 'Selasa & Kamis, 15:00–17:00',
                'pembina'  => 'Budi Santoso',
                'prestasi' => '',
            ],
            [
                'name'     => 'Volly',
                'jadwal'   => 'Senin & Rabu, 15:00–17:00',
                'pembina'  => 'Slamet Riyadi',
                'prestasi' => '',
            ],
            [
                'name'     => 'Futsal',
                'jadwal'   => 'Senin & Jumat, 15:00–17:00',
                'pembina'  => 'Agus Pranoto',
                'prestasi' => "Juara 1 Futsal\nJuara 1 Try Out UKM",
            ],
            [
                'name'     => 'Karate',
                'jadwal'   => 'Selasa & Kamis, 15:00–17:00',
                'pembina'  => 'M. Rizky',
                'prestasi' => "Juara 3 Bulutangkis Ganda Putra\nJuara 1 Karate Kelas 60-65 kg Piala Koni Pusat\nJuara 1 Lomba PBB Piala Panglima TNI\nJuara 1 Lari 100m Putri Porseni",
            ],
            [
                'name'     => 'Taekwondo',
                'jadwal'   => 'Rabu & Sabtu, 15:00–17:00',
                'pembina'  => 'Hadi Wijaya',
                'prestasi' => "Juara 1 Taekwondo Nasional Piala Kapolri\nJuara 1 MTQ Porseni\nJuara 3 Lomba PBB Piala Panglima TNI",
            ],
            [
                'name'     => 'Seni Musik',
                'jadwal'   => 'Jumat, 13:00–15:00',
                'pembina'  => 'Lailatul Qomariah',
                'prestasi' => '',
            ],
            [
                'name'     => 'Seni Tari',
                'jadwal'   => 'Kamis, 13:00–15:00',
                'pembina'  => 'Dewi Sartika',
                'prestasi' => '',
            ],
        ];

        foreach ($ekskul as $data) {
            $slugBase = Str::slug($data['name']);
            $slug = $slugBase;
            $i = 1;

            // Cegah slug duplicate (mirip logika di controller addBerita)
            while (Ekstrakurikuler::where('slug', $slug)->exists()) {
                $slug = $slugBase . '-' . $i++;
            }

            Ekstrakurikuler::create([
                'name'     => $data['name'],
                'slug'     => $slug,
                'jadwal'   => $data['jadwal'],
                'pembina'  => $data['pembina'],
                'prestasi' => $data['prestasi'],
            ]);
        }
    }
}