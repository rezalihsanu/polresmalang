<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Satuan;
use App\Models\Pejabat;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SatuanPejabatController extends Controller
{
    public function index()
    {
        $satuans = Satuan::with(['parent', 'pejabats'])->get();
        $pejabats = Pejabat::with('satuan')->orderBy('urutan')->get();

        return view('admin.satuan-pejabat.index', compact('satuans', 'pejabats'));
    }

    public function storeSatuan(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'kode'      => 'nullable|string|max:50',
            'parent_id' => 'nullable|exists:satuans,id',
            'deskripsi' => 'nullable|string',
            'urutan'    => 'nullable|integer',
        ]);

        $validated['slug'] = Str::slug($validated['nama']);
        Satuan::create($validated);

        return redirect()->route('admin.organisasi.index')->with('success', 'Satuan / Unit kerja berhasil ditambahkan.');
    }

    public function storePejabat(Request $request)
    {
        $validated = $request->validate([
            'satuan_id'       => 'nullable|exists:satuans,id',
            'nama'            => 'required|string|max:255',
            'pangkat_korps'   => 'required|string|max:100',
            'nrp_nip'         => 'required|string|max:50',
            'jabatan'         => 'required|string|max:255',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sambutan'        => 'nullable|string',
            'riwayat_singkat' => 'nullable|string',
            'urutan'          => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('pejabat', 'public');
        }

        Pejabat::create($validated);

        return redirect()->route('admin.organisasi.index')->with('success', 'Pejabat utama berhasil ditambahkan.');
    }

    public function updatePejabat(Request $request, Pejabat $pejabat)
    {
        $validated = $request->validate([
            'satuan_id'       => 'nullable|exists:satuans,id',
            'nama'            => 'required|string|max:255',
            'pangkat_korps'   => 'required|string|max:100',
            'nrp_nip'         => 'required|string|max:50',
            'jabatan'         => 'required|string|max:255',
            'foto'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sambutan'        => 'nullable|string',
            'riwayat_singkat' => 'nullable|string',
            'urutan'          => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            if ($pejabat->foto && Storage::disk('public')->exists($pejabat->foto)) {
                Storage::disk('public')->delete($pejabat->foto);
            }
            $validated['foto'] = $request->file('foto')->store('pejabat', 'public');
        }

        $pejabat->update($validated);

        return redirect()->route('admin.organisasi.index')->with('success', 'Data pejabat berhasil diperbarui.');
    }

    public function destroyPejabat(Pejabat $pejabat)
    {
        if ($pejabat->foto && Storage::disk('public')->exists($pejabat->foto)) {
            Storage::disk('public')->delete($pejabat->foto);
        }

        $pejabat->delete();

        return redirect()->route('admin.organisasi.index')->with('success', 'Data pejabat berhasil dihapus.');
    }

    public function destroySatuan(Satuan $satuan)
    {
        $satuan->delete();
        return redirect()->route('admin.organisasi.index')->with('success', 'Satuan / Unit kerja berhasil dihapus.');
    }
}
