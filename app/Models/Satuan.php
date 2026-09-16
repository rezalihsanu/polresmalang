<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'satuans';

    protected $fillable = ['parent_id', 'nama', 'singkatan', 'deskripsi', 'level', 'urutan'];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Satuan::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Satuan::class, 'parent_id')->orderBy('urutan');
    }

    public function pejabats(): HasMany
    {
        return $this->hasMany(Pejabat::class, 'satuan_id')->orderBy('urutan');
    }

    public function scopeRoot($query)
    {
        return $query->whereNull('parent_id')->orderBy('urutan');
    }

    public function scopeLevel($query, int $level)
    {
        return $query->where('level', $level)->orderBy('urutan');
    }
}
