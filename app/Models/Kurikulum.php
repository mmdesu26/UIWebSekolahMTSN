<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kurikulum',
        'deskripsi_kurikulum',
        'tujuan_kurikulum',
        'projek_penguatan',
    ];
}