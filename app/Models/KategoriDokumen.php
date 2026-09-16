<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriDokumen extends Model
{
    use HasFactory;

    protected $table = 'kategori_dokumens';

    protected $fillable = ['nama', 'slug', 'deskripsi', 'urutan'];

    public function dokumens(): HasMany
    {
        return $this->hasMany(Dokumen::class, 'kategori_dokumen_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
