<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'galeris';

    // Daftar atribut yang dapat diisi
    protected $fillable = [
        'judul',
        'gambar',
        'tanggal',
    ];

    // Tentukan atribut tanggal yang harus diubah menjadi tipe timestamp jika diperlukan
    protected $casts = [
        'tanggal' => 'datetime',
    ];
}