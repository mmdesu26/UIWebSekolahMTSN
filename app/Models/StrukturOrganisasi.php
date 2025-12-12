<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'struktur_organisasi';

    /**
     * Kolom yang bisa diisi (mass assignment)
     */
    protected $fillable = [
        'gambar_path',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get full URL gambar struktur
     */
    public function getGambarUrlAttribute()
    {
        if ($this->gambar_path) {
            return Storage::url($this->gambar_path);
        }
        return null;
    }

    /**
     * Hapus file gambar dari storage
     */
    public function deleteGambar()
    {
        if ($this->gambar_path && Storage::disk('public')->exists($this->gambar_path)) {
            Storage::disk('public')->delete($this->gambar_path);
        }
    }

    /**
     * Get atau create instance struktur organisasi
     * Karena hanya ada 1 record struktur organisasi
     */
    public static function getInstance()
    {
        $struktur = self::first();
        
        if (!$struktur) {
            $struktur = self::create([
                'gambar_path' => null,
            ]);
        }
        
        return $struktur;
    }
}