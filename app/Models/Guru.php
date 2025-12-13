<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'guru';

    protected $fillable = [
        'nama',
        'mata_pelajaran',
        'nip',
        'email',
        'foto',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // ==========================================
    // SCOPES
    // ==========================================
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // ==========================================
    // ACCESSORS (GETTER)
    // ==========================================

    /**
     * ✅ Accessor untuk mendapatkan URL foto lengkap
     */
    public function getFotoUrlAttribute()
    {
        if ($this->foto && Storage::disk('public')->exists($this->foto)) {
            return asset('storage/' . $this->foto);
        }
        
        // Return null jika tidak ada foto (akan ditangani di view)
        return null;
    }

    /**
     * ✅ Accessor untuk NIP dengan format yang lebih baik
     */
    public function getNipDisplayAttribute()
    {
        return $this->nip ?? 'Belum ada NIP';
    }

    /**
     * ✅ Accessor untuk email otomatis
     */
    public function getEmailAutoAttribute()
    {
        if ($this->email) {
            return $this->email;
        }
        
        // Generate email otomatis dari nama
        $namaSlug = strtolower(str_replace(' ', '.', $this->nama));
        return $namaSlug . '@mtsn1magetan.sch.id';
    }

    /**
     * ✅ Accessor untuk kategori berdasarkan mata pelajaran
     */
    public function getKategoriAttribute()
    {
        $mataPelajaran = strtolower($this->mata_pelajaran);
        
        // Matematika
        if (str_contains($mataPelajaran, 'matematika')) {
            return 'matematika';
        }
        
        // IPA (Biologi, Fisika, Kimia, IPA)
        if (str_contains($mataPelajaran, 'ipa') || 
            str_contains($mataPelajaran, 'biologi') || 
            str_contains($mataPelajaran, 'fisika') || 
            str_contains($mataPelajaran, 'kimia')) {
            return 'ipa';
        }
        
        // Bahasa (Indonesia, Inggris, Arab, Jawa)
        if (str_contains($mataPelajaran, 'bahasa') || 
            str_contains($mataPelajaran, 'indonesia') || 
            str_contains($mataPelajaran, 'inggris') || 
            str_contains($mataPelajaran, 'arab') || 
            str_contains($mataPelajaran, 'jawa')) {
            return 'bahasa';
        }
        
        // Agama (PAI, Akidah, Quran, Hadist, Fiqih, SKI)
        if (str_contains($mataPelajaran, 'agama') || 
            str_contains($mataPelajaran, 'pai') || 
            str_contains($mataPelajaran, 'akidah') || 
            str_contains($mataPelajaran, 'quran') || 
            str_contains($mataPelajaran, 'hadist') || 
            str_contains($mataPelajaran, 'fiqih') || 
            str_contains($mataPelajaran, 'ski')) {
            return 'agama';
        }
        
        // Seni & Olahraga
        if (str_contains($mataPelajaran, 'seni') || 
            str_contains($mataPelajaran, 'pjok') || 
            str_contains($mataPelajaran, 'olahraga') || 
            str_contains($mataPelajaran, 'penjas')) {
            return 'seni';
        }
        
        // Default
        return 'all';
    }

    // ==========================================
    // BOOT METHOD - AUTO DELETE FOTO
    // ==========================================

    protected static function boot()
    {
        parent::boot();

        // Ketika guru dihapus, hapus juga fotonya
        static::deleting(function ($guru) {
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }
        });
    }
}