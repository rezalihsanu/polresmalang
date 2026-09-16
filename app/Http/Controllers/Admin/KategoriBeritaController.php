<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    public function index()
    {
        $kategoris = KategoriBerita::withCount('beritas')->get();
        return view('admin.kategori-berita.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100|unique:kategori_beritas,nama',
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);

        KategoriBerita::create($validated);

        return redirect()->route('admin.kategori-berita.index')->with('success', 'Kategori berita berhasil ditambahkan.');
    }

    public function update(Request $request, KategoriBerita $kategoriBerita)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:100|unique:kategori_beritas,nama,' . $kategoriBerita->id,
            'deskripsi' => 'nullable|string|max:255',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);

        $kategoriBerita->update($validated);

        return redirect()->route('admin.kategori-berita.index')->with('success', 'Kategori berita berhasil diperbarui.');
    }

    public function destroy(KategoriBerita $kategoriBerita)
    {
        if ($kategoriBerita->beritas()->count() > 0) {
            return back()->with('error', 'Kategori tidak dapat dihapus karena masih memiliki berita terkait.');
        }

        $kategoriBerita->delete();

        return redirect()->route('admin.kategori-berita.index')->with('success', 'Kategori berita berhasil dihapus.');
    }
}
