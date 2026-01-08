<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KalenderPendidikan extends Model
{
    use HasFactory;

    protected $table = 'kalender_pendidikan';

    protected $fillable = [
        'semester',
        'tanggal_mulai',
        'tanggal_selesai',
        'judul',
        'keterangan',
        'kategori',
        'is_active'
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'is_active' => 'boolean'
    ];

    // Scope untuk filter semester
    public function scopeSemesterGanjil($query)
    {
        return $query->where('semester', 'ganjil');
    }

    public function scopeSemesterGenap($query)
    {
        return $query->where('semester', 'genap');
    }

    // Scope untuk filter kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope untuk event aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Format tanggal untuk display
   public function getTanggalMulaiForInputAttribute()
{
    return $this->tanggal_mulai ? $this->tanggal_mulai->format('Y-m-d') : null;
}

public function getTanggalSelesaiForInputAttribute()
{
    return $this->tanggal_selesai ? $this->tanggal_selesai->format('Y-m-d') : null;
}

    // Get class untuk kategori badge
    public function getKategoriClassAttribute()
    {
        return match($this->kategori) {
            'akademik' => 'cat-akademik',
            'libur' => 'cat-libur',
            'kegiatan' => 'cat-kegiatan',
            'ujian' => 'cat-ujian',
            'penting' => 'cat-penting',
            default => 'cat-akademik'
        };
    }

    // Get label untuk kategori
    public function getKategoriLabelAttribute()
    {
        return match($this->kategori) {
            'akademik' => 'Akademik',
            'libur' => 'Libur Nasional',
            'kegiatan' => 'Kegiatan',
            'ujian' => 'Ujian',
            'penting' => 'Penting',
            default => 'Akademik'
        };
    }
}