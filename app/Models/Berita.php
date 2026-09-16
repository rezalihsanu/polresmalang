<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Berita extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'beritas';

    protected $fillable = [
        'user_id', 'kategori_berita_id', 'judul', 'slug', 'ringkasan',
        'konten', 'gambar_utama', 'alt_gambar', 'status', 'highlight',
        'published_at', 'meta_description',
    ];

    protected $casts = [
        'highlight' => 'boolean',
        'published_at' => 'datetime',
    ];

    // =============================
    // Relationships
    // =============================

    public function penulis(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id');
    }

    // =============================
    // Scopes
    // =============================

    public function scopePublished($query)
    {
        return $query->where('status', 'publish')
                     ->where('published_at', '<=', now());
    }

    public function scopeHighlight($query)
    {
        return $query->where('highlight', true);
    }

    public function scopeByKategori($query, $slug)
    {
        return $query->whereHas('kategori', fn ($q) => $q->where('slug', $slug));
    }

    // =============================
    // Accessors
    // =============================

    public function getGambarUrlAttribute(): string
    {
        if ($this->gambar_utama) {
            return asset('storage/' . $this->gambar_utama);
        }
        return asset('images/placeholder-berita.jpg');
    }

    public function getTanggalAttribute(): string
    {
        $date = $this->published_at ?? $this->created_at;
        return $date->locale('id')->translatedFormat('d F Y');
    }

    // =============================
    // Route Model Binding
    // =============================

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
