<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'layanan_id', 'nomor_tiket', 'nama_pelapor', 'nik', 'email_pelapor',
        'no_hp_pelapor', 'alamat', 'kategori', 'judul', 'isi_pengaduan', 'lampiran', 'status',
        'tanggapan', 'ditangani_oleh', 'ditangani_pada', 'ip_address',
    ];

    protected $casts = [
        'ditangani_pada' => 'datetime',
    ];

    // Status labels
    public const STATUS_BARU = 'baru';
    public const STATUS_DIPROSES = 'diproses';
    public const STATUS_SELESAI = 'selesai';
    public const STATUS_DITOLAK = 'ditolak';

    public static array $statusLabels = [
        'baru'     => 'Baru',
        'diproses' => 'Diproses',
        'selesai'  => 'Selesai',
        'ditolak'  => 'Ditolak',
    ];

    // =============================
    // Boot — generate nomor tiket
    // =============================

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $model) {
            if (empty($model->nomor_tiket)) {
                $model->nomor_tiket = 'PMK-' . date('Ymd') . '-' . strtoupper(Str::random(6));
            }
        });
    }

    // =============================
    // Relationships
    // =============================

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'ditangani_oleh');
    }

    // =============================
    // Scopes
    // =============================

    public function scopeBaru($query)
    {
        return $query->where('status', self::STATUS_BARU);
    }

    public function scopeByStatus($query, string $status)
    {
        return $query->where('status', $status);
    }

    // =============================
    // Accessors
    // =============================

    public function getLampiranUrlAttribute(): ?string
    {
        return $this->lampiran ? asset('storage/' . $this->lampiran) : null;
    }

    public function getStatusLabelAttribute(): string
    {
        return self::$statusLabels[$this->status] ?? $this->status;
    }
}
