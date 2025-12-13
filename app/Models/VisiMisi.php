<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 'visi_misi';

    protected $fillable = [
        'visi',
        'misi'
    ];

    public $timestamps = true;

    /**
     * Get misi as array
     */
    public function getMisiArrayAttribute()
    {
        if (empty($this->misi)) {
            return [];
        }
        
        $misiList = explode("\n", $this->misi);
        return array_filter(array_map('trim', $misiList));
    }

    /**
     * Get first or create instance
     */
    public static function getFirst()
    {
        return self::firstOrCreate(
            ['id' => 1],
            [
                'visi' => 'Visi belum diatur',
                'misi' => 'Misi belum diatur'
            ]
        );
    }
}