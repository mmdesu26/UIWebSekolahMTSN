<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'gambar',
        'embed_link',
        'tipe'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the image URL
     */
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return null;
        }

        // If it's already a full URL, return as is
        if (filter_var($this->gambar, FILTER_VALIDATE_URL)) {
            return $this->gambar;
        }

        // If it starts with /storage/, return as is
        if (str_starts_with($this->gambar, '/storage/')) {
            return $this->gambar;
        }

        // Otherwise, prepend /storage/
        return '/storage/' . $this->gambar;
    }

    /**
     * Get tanggal attribute (alias untuk created_at)
     */
    public function getTanggalAttribute()
    {
        return $this->created_at;
    }

    /**
     * Scope query by type
     */
    public function scopeByType($query, $tipe)
    {
        return $query->where('tipe', $tipe);
    }

    /**
     * Check if this is an embed media
     */
    public function isEmbed()
    {
        return !empty($this->embed_link);
    }

    /**
     * Check if this is a video
     */
    public function isVideo()
    {
        return $this->tipe === 'video';
    }

    /**
     * Check if this is an image
     */
    public function isImage()
    {
        return $this->tipe === 'image';
    }
}