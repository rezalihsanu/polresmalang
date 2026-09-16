<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Galeri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class KegiatanGaleriController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::withCount('galeris')->latest('tanggal_kegiatan')->paginate(10);
        return view('admin.kegiatan-galeri.index', compact('kegiatans'));
    }

    public function create()
    {
        return view('admin.kegiatan-galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'            => 'required|string|max:255',
            'deskripsi'        => 'nullable|string',
            'lokasi'           => 'nullable|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'cover'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'fotos.*'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $validated['slug'] = Str::slug($validated['judul']) . '-' . time();
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('kegiatan-cover', 'public');
            $validated['foto_utama'] = $validated['cover'];
        }

        $kegiatan = Kegiatan::create($validated);

        // Upload foto galeri multiple
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $index => $fotoFile) {
                $path = $fotoFile->store('kegiatan-galeri', 'public');
                Galeri::create([
                    'kegiatan_id' => $kegiatan->id,
                    'foto_path'   => $path,
                    'foto'        => $path,
                    'caption'     => "Dokumentasi {$kegiatan->judul} #" . ($index + 1),
                    'urutan'      => $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan dan galeri foto berhasil ditambahkan.');
    }

    public function edit(Kegiatan $kegiatan)
    {
        $kegiatan->load('galeris');
        return view('admin.kegiatan-galeri.edit', compact('kegiatan'));
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul'            => 'required|string|max:255',
            'deskripsi'        => 'nullable|string',
            'lokasi'           => 'nullable|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'cover'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'fotos.*'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        if ($request->hasFile('cover')) {
            if ($kegiatan->cover && Storage::disk('public')->exists($kegiatan->cover)) {
                Storage::disk('public')->delete($kegiatan->cover);
            }
            $validated['cover'] = $request->file('cover')->store('kegiatan-cover', 'public');
            $validated['foto_utama'] = $validated['cover'];
        }

        $kegiatan->update($validated);

        // Upload foto galeri tambahan
        if ($request->hasFile('fotos')) {
            $lastOrder = $kegiatan->galeris()->max('urutan') ?? 0;
            foreach ($request->file('fotos') as $index => $fotoFile) {
                $path = $fotoFile->store('kegiatan-galeri', 'public');
                Galeri::create([
                    'kegiatan_id' => $kegiatan->id,
                    'foto_path'   => $path,
                    'foto'        => $path,
                    'caption'     => "Foto Tambahan {$kegiatan->judul}",
                    'urutan'      => $lastOrder + $index + 1,
                ]);
            }
        }

        return redirect()->route('admin.kegiatan.index')->with('success', 'Data kegiatan berhasil diperbarui.');
    }

    public function destroyFoto(Galeri $galeri)
    {
        if ($galeri->foto_path && Storage::disk('public')->exists($galeri->foto_path)) {
            Storage::disk('public')->delete($galeri->foto_path);
        }
        if ($galeri->foto && Storage::disk('public')->exists($galeri->foto)) {
            Storage::disk('public')->delete($galeri->foto);
        }

        $galeri->delete();

        return back()->with('success', 'Foto galeri berhasil dihapus.');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        foreach ($kegiatan->galeris as $galeri) {
            $this->destroyFoto($galeri);
        }

        if ($kegiatan->cover && Storage::disk('public')->exists($kegiatan->cover)) {
            Storage::disk('public')->delete($kegiatan->cover);
        }

        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')->with('success', 'Kegiatan dan seluruh foto galeri berhasil dihapus.');
    }
}
