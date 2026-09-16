<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanans';

    protected $fillable = [
        'nama', 'slug', 'deskripsi_singkat', 'konten', 'ikon',
        'gambar', 'url_eksternal', 'aktif', 'urutan', 'meta_description',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function pengaduans(): HasMany
    {
        return $this->hasMany(Pengaduan::class, 'layanan_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan');
    }

    public function getGambarUrlAttribute(): string
    {
        return $this->gambar
            ? asset('storage/'.$this->gambar)
            : asset('images/placeholder-layanan.jpg');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
