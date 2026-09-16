<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Layanan;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::ordered()->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'               => 'required|string|max:255',
            'deskripsi'          => 'required|string',
            'persyaratan'        => 'nullable|string',
            'prosedur'           => 'nullable|string',
            'biaya'              => 'nullable|string|max:100',
            'waktu_penyelesaian' => 'nullable|string|max:100',
            'jam_operasional'    => 'nullable|string|max:255',
            'lokasi_pelayanan'   => 'nullable|string|max:255',
            'kontak_layanan'     => 'nullable|string|max:100',
            'link_external'      => 'nullable|url|max:255',
            'icon'               => 'nullable|string|max:100',
            'aktif'              => 'nullable|boolean',
            'urutan'             => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);
        $validated['aktif'] = $request->boolean('aktif');
        $validated['urutan'] = $validated['urutan'] ?? 0;

        Layanan::create($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan publik berhasil ditambahkan.');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $validated = $request->validate([
            'nama'               => 'required|string|max:255',
            'deskripsi'          => 'required|string',
            'persyaratan'        => 'nullable|string',
            'prosedur'           => 'nullable|string',
            'biaya'              => 'nullable|string|max:100',
            'waktu_penyelesaian' => 'nullable|string|max:100',
            'jam_operasional'    => 'nullable|string|max:255',
            'lokasi_pelayanan'   => 'nullable|string|max:255',
            'kontak_layanan'     => 'nullable|string|max:100',
            'link_external'      => 'nullable|url|max:255',
            'icon'               => 'nullable|string|max:100',
            'aktif'              => 'nullable|boolean',
            'urutan'             => 'nullable|integer',
        ]);

        $validated['aktif'] = $request->boolean('aktif');

        $layanan->update($validated);

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan publik berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan publik berhasil dihapus.');
    }
}
