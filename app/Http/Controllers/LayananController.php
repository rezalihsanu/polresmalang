<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::aktif()->ordered()->get();
        return view('public.layanan.index', compact('layanans'));
    }

    public function show(string $slug)
    {
        $layanan = Layanan::aktif()->where('slug', $slug)->firstOrFail();
        $otherLayanans = Layanan::aktif()->where('id', '!=', $layanan->id)->ordered()->get();

        return view('public.layanan.show', compact('layanan', 'otherLayanans'));
    }
}
