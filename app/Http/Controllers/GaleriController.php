<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('galeris')
            ->has('galeris')
            ->latest('tanggal_kegiatan')
            ->paginate(9);

        return view('public.galeri', compact('kegiatans'));
    }

    public function show(string $slug)
    {
        $kegiatan = Kegiatan::with('galeris')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('public.galeri-show', compact('kegiatan'));
    }
}
