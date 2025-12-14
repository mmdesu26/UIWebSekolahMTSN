<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'jadwal',
        'pembina',
        'prestasi',
        'slug',
    ];
    public function prestasis()
{
    return $this->hasMany(Prestasi::class);
}
}