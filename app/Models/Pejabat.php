<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pejabat extends Model
{
    use HasFactory;

    protected $table = 'pejabats';

    protected $fillable = [
        'satuan_id', 'nama', 'pangkat', 'nrp', 'jabatan',
        'foto', 'is_kapolresta', 'urutan',
    ];

    protected $casts = [
        'is_kapolresta' => 'boolean',
    ];

    public function satuan(): BelongsTo
    {
        return $this->belongsTo(Satuan::class, 'satuan_id');
    }

    public function getFotoUrlAttribute(): string
    {
        return $this->foto
            ? asset('storage/' . $this->foto)
            : asset('images/placeholder-pejabat.jpg');
    }
}
