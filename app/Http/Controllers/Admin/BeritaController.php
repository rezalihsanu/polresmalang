<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with(['kategori', 'penulis']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('kategori_id')) {
            $query->where('kategori_berita_id', $request->kategori_id);
        }

        if ($request->filled('q')) {
            $query->where('judul', 'LIKE', '%' . $request->q . '%');
        }

        $beritas = $query->latest()->paginate(10)->withQueryString();
        $kategoris = KategoriBerita::all();

        return view('admin.berita.index', compact('beritas', 'kategoris'));
    }

    public function create()
    {
        $kategoris = KategoriBerita::all();
        return view('admin.berita.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'              => 'required|string|max:255',
            'kategori_berita_id' => 'required|exists:kategori_beritas,id',
            'ringkasan'          => 'required|string|max:500',
            'konten'             => 'required|string',
            'gambar'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'status'             => 'required|in:draft,publish',
            'highlight'          => 'nullable|boolean',
            'meta_description'   => 'nullable|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['judul']) . '-' . Str::random(4);
        $validated['user_id'] = Auth::id();
        $validated['highlight'] = $request->boolean('highlight');

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        if ($validated['status'] === 'publish') {
            $validated['published_at'] = now();
        }

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Artikel berita berhasil dibuat.');
    }

    public function edit(Berita $beritum)
    {
        $berita = $beritum;
        $kategoris = KategoriBerita::all();
        return view('admin.berita.edit', compact('berita', 'kategoris'));
    }

    public function update(Request $request, Berita $beritum)
    {
        $berita = $beritum;

        $validated = $request->validate([
            'judul'              => 'required|string|max:255',
            'kategori_berita_id' => 'required|exists:kategori_beritas,id',
            'ringkasan'          => 'required|string|max:500',
            'konten'             => 'required|string',
            'gambar'             => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'status'             => 'required|in:draft,publish',
            'highlight'          => 'nullable|boolean',
            'meta_description'   => 'nullable|string|max:255',
        ]);

        $validated['highlight'] = $request->boolean('highlight');

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        if ($validated['status'] === 'publish' && !$berita->published_at) {
            $validated['published_at'] = now();
        }

        $berita->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Artikel berita berhasil diperbarui.');
    }

    public function destroy(Berita $beritum)
    {
        $berita = $beritum;

        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Artikel berita berhasil dihapus.');
    }
}
