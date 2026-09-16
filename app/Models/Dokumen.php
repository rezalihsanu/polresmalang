<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dokumen extends Model
{
    use HasFactory;

    protected $table = 'dokumens';

    protected $fillable = [
        'user_id', 'kategori_dokumen_id', 'judul', 'slug', 'deskripsi',
        'file_path', 'file_name', 'file_type', 'file_size', 'tahun', 'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function pemilik(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriDokumen::class, 'kategori_dokumen_id');
    }

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }

    public function getFileSizeReadableAttribute(): string
    {
        $bytes = $this->file_size ?? 0;
        if ($bytes >= 1048576) return round($bytes / 1048576, 1) . ' MB';
        if ($bytes >= 1024) return round($bytes / 1024, 1) . ' KB';
        return $bytes . ' B';
    }

    public function incrementDownload(): void
    {
        $this->increment('download_count');
    }
}
