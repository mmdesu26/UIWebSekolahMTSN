<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'content',
        'slug',
        'image',           
        'tipe',
        'source',
        'news_date',
        'stock_code',
        'sentiment',
        'sentiment_score',
        'is_published',
        'user_id'
    ];

    protected $casts = [
        'news_date' => 'date',
        'is_published' => 'boolean',
    ];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Auto generate slug + user_id otomatis
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $original = Str::slug($news->title);
            $slug = $original;
            $count = 1;

            // Hindari slug duplikat
            while (static::where('slug', $slug)->exists()) {
                $slug = $original . '-' . $count++;
            }

            $news->slug = $slug;
            $news->user_id = auth()->id() ?? null;
        });

        static::updating(function ($news) {
            if ($news->isDirty('title')) {
                $original = Str::slug($news->title);
                $slug = $original;
                $count = 1;

                while (static::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
                    $slug = $original . '-' . $count++;
                }

                $news->slug = $slug;
            }
        });
    }

    // Scope untuk hanya yang dipublish
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}