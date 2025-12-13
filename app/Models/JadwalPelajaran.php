<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    use HasFactory;

    protected $table = 'jadwal_pelajaran';

    protected $fillable = [
        'kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'mata_pelajaran',
        'is_istirahat',
        'urutan'
    ];

    protected $casts = [
        'is_istirahat' => 'boolean',
    ];

    // Scope untuk filter berdasarkan kelas dan hari
    public function scopeKelas($query, $kelas)
    {
        return $query->where('kelas', $kelas);
    }

    public function scopeHari($query, $hari)
    {
        return $query->where('hari', $hari);
    }

    // Helper untuk mendapatkan daftar hari
    public static function getHariList()
    {
        return [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat'
        ];
    }

    // Helper untuk mendapatkan daftar kelas
    public static function getKelasList()
    {
        return ['7', '8', '9'];
    }
}