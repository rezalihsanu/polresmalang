<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeris';

    protected $fillable = ['kegiatan_id', 'foto', 'foto_path', 'keterangan', 'caption', 'urutan'];

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function getFotoUrlAttribute(): string
    {
        $path = $this->foto_path ?? $this->foto;
        return $path ? asset('storage/' . $path) : asset('images/placeholder-galeri.jpg');
    }
}
