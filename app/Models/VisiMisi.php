<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'visi_misi';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'visi',
        'misi',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the first visi misi record or create a new one with default values.
     *
     * @return VisiMisi
     */
    public static function getOrCreateDefault()
    {
        $visiMisi = self::first();

        if (!$visiMisi) {
            $visiMisi = self::create([
                'visi' => 'Menjadi sekolah unggul yang menghasilkan peserta didik berkualitas, berakhlak mulia, dan berdaya saing global.',
                'misi' => 'Menyelenggarakan pendidikan berkualitas dengan standar internasional; Membina peserta didik yang berkarakter dan berintegritas; Mengembangkan potensi peserta didik di bidang akademik dan non-akademik; Mempersiapkan peserta didik untuk melanjutkan ke jenjang pendidikan yang lebih tinggi.'
            ]);
        }

        return $visiMisi;
    }
}