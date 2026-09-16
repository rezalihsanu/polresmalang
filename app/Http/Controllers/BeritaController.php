<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with(['kategori', 'penulis'])->published();

        // Filter kategori
        if ($request->filled('kategori')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('slug', $request->kategori);
            });
        }

        // Pencarian keyword
        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'LIKE', "%{$keyword}%")
                  ->orWhere('ringkasan', 'LIKE', "%{$keyword}%")
                  ->orWhere('konten', 'LIKE', "%{$keyword}%");
            });
        }

        $beritas = $query->latest('published_at')->paginate(9)->withQueryString();
        $kategoriList = KategoriBerita::withCount(['beritas' => fn ($q) => $q->published()])->get();
        $recentBeritas = Berita::published()->latest('published_at')->take(5)->get();

        return view('public.berita.index', compact('beritas', 'kategoriList', 'recentBeritas'));
    }

    public function show(string $slug)
    {
        $berita = Berita::with(['kategori', 'penulis'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();

        // Increment dibaca
        $berita->incrementReadCount();

        // Berita terkait
        $relatedBeritas = Berita::published()
            ->where('kategori_berita_id', $berita->kategori_berita_id)
            ->where('id', '!=', $berita->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('public.berita.show', compact('berita', 'relatedBeritas'));
    }
}
