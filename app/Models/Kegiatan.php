<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatans';

    protected $fillable = [
        'user_id', 'judul', 'slug', 'deskripsi',
        'cover', 'foto_utama', 'lokasi', 'tanggal_kegiatan', 'tampil_beranda',
    ];

    protected $casts = [
        'tanggal_kegiatan' => 'date',
        'tampil_beranda' => 'boolean',
    ];

    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function galeris(): HasMany
    {
        return $this->hasMany(Galeri::class, 'kegiatan_id')->orderBy('urutan');
    }

    public function scopeTampilBeranda($query)
    {
        return $query->where('tampil_beranda', true)
                     ->orderByDesc('tanggal_kegiatan');
    }

    public function getCoverUrlAttribute(): string
    {
        return $this->cover
            ? asset('storage/' . $this->cover)
            : asset('images/placeholder-kegiatan.jpg');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
