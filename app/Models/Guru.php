<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Guru extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'guru';

    /**
     * Kolom yang bisa diisi (mass assignment)
     */
    protected $fillable = [
        'nama',
        'nip',
        'mata_pelajaran',
        'kategori',
        'email',
        'foto',
        'keterangan',
        'is_active',
    ];

    /**
     * Casts
     */
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope untuk filter guru aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk filter berdasarkan kategori
     */
    public function scopeByKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    /**
     * Accessor untuk NIP (tampilkan '-' jika kosong)
     */
    public function getNipDisplayAttribute()
    {
        return $this->nip ?: '-';
    }

    /**
     * Accessor untuk generate email otomatis
     */
    public function getEmailAutoAttribute()
    {
        if ($this->email) {
            return $this->email;
        }
        
        // Generate email dari nama
        $namaFirst = explode(' ', $this->nama)[0];
        $namaClean = strtolower(Str::slug($namaFirst, '.'));
        return $namaClean . '@mtsn1magetan.sch.id';
    }

    //UNTUK BAGIAN FOTO
    public function getFotoUrlAttribute()
    {
        return $this->foto 
            ? asset('storage/' . $this->foto) 
            : asset('images/default-guru.jpg'); // buat file ini atau ganti dengan URL default
    }

    /**
     * Tentukan kategori berdasarkan mata pelajaran
     */
    public static function determineKategori($mataPelajaran)
    {
        $mataPelajaran = strtolower($mataPelajaran);
        
        if (str_contains($mataPelajaran, 'matematika') || str_contains($mataPelajaran, 'mtk')) {
            return 'matematika';
        } elseif (str_contains($mataPelajaran, 'ipa') || str_contains($mataPelajaran, 'biologi') || 
                  str_contains($mataPelajaran, 'fisika') || str_contains($mataPelajaran, 'kimia')) {
            return 'ipa';
        } elseif (str_contains($mataPelajaran, 'bahasa') || str_contains($mataPelajaran, 'indonesia') || 
                  str_contains($mataPelajaran, 'inggris') || str_contains($mataPelajaran, 'arab')) {
            return 'bahasa';
        } elseif (str_contains($mataPelajaran, 'agama') || str_contains($mataPelajaran, 'pai') || 
                  str_contains($mataPelajaran, 'quran') || str_contains($mataPelajaran, 'fiqih') ||
                  str_contains($mataPelajaran, 'akidah') || str_contains($mataPelajaran, 'akhlak')) {
            return 'agama';
        } elseif (str_contains($mataPelajaran, 'seni') || str_contains($mataPelajaran, 'olahraga') || 
                  str_contains($mataPelajaran, 'penjaskes') || str_contains($mataPelajaran, 'prakarya') ||
                  str_contains($mataPelajaran, 'penjas')) {
            return 'seni';
        } else {
            return 'lainnya';
        }
    }

    /**
     * Boot method untuk auto-set kategori
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($guru) {
            if (!$guru->kategori || $guru->kategori === 'lainnya') {
                $guru->kategori = self::determineKategori($guru->mata_pelajaran);
            }
        });

        static::updating(function ($guru) {
            if ($guru->isDirty('mata_pelajaran')) {
                $guru->kategori = self::determineKategori($guru->mata_pelajaran);
            }
        });
    }
}