<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'fasilitas';

    protected $fillable = [
        'nama',
        'deskripsi',
        'icon',
        'kategori',
        'fitur',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'fitur' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk fasilitas aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk fasilitas berdasarkan kategori
     */
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    /**
     * Scope untuk ordering berdasarkan urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc')->orderBy('id', 'asc');
    }

    /**
     * Get fasilitas utama yang aktif
     */
    public static function getFasilitasUtama()
    {
        return self::active()
            ->kategori('utama')
            ->ordered()
            ->get();
    }

    /**
     * Get fasilitas pendukung yang aktif
     */
    public static function getFasilitasPendukung()
    {
        return self::active()
            ->kategori('pendukung')
            ->ordered()
            ->get();
    }
}