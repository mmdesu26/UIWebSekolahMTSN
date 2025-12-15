<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasProgram extends Model
{
    use HasFactory;

    protected $table = 'kelas_program';

    protected $fillable = [
        'nama',
        'deskripsi',
        'icon_class',
        'warna',
        'fitur',
        'kategori',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'fitur' => 'array',
        'is_active' => 'boolean'
    ];

    // Scope untuk program aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk kategori
    public function scopeKategori($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Scope untuk urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }
}