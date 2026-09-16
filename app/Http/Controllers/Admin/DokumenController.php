<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\KategoriDokumen;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = Dokumen::with('kategori');

        if ($request->filled('kategori_id')) {
            $query->where('kategori_dokumen_id', $request->kategori_id);
        }

        if ($request->filled('q')) {
            $query->where('judul', 'LIKE', '%' . $request->q . '%');
        }

        $dokumens = $query->latest()->paginate(10)->withQueryString();
        $kategoris = KategoriDokumen::all();

        return view('admin.dokumen.index', compact('dokumens', 'kategoris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'               => 'required|string|max:255',
            'kategori_dokumen_id' => 'required|exists:kategori_dokumens,id',
            'deskripsi'           => 'nullable|string',
            'tahun'               => 'required|integer|min:2000|max:' . (date('Y') + 1),
            'file_dokumen'        => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx,zip|max:10240',
            'aktif'               => 'nullable|boolean',
        ], [
            'judul.required'               => 'Judul dokumen wajib diisi.',
            'kategori_dokumen_id.required' => 'Kategori dokumen wajib dipilih.',
            'tahun.required'               => 'Tahun dokumen wajib diisi.',
            'file_dokumen.required'        => 'File dokumen wajib diunggah.',
            'file_dokumen.max'             => 'Ukuran file maksimal 10 MB.',
        ]);

        $file = $request->file('file_dokumen');
        $filePath = $file->store('dokumen-publik', 'public');

        $dokumen = Dokumen::create([
            'user_id'             => Auth::id(),
            'kategori_dokumen_id' => $validated['kategori_dokumen_id'],
            'judul'               => $validated['judul'],
            'slug'                => Str::slug($validated['judul']) . '-' . time(),
            'deskripsi'           => $validated['deskripsi'],
            'file_path'           => $filePath,
            'file_name'           => $file->getClientOriginalName(),
            'file_type'           => strtolower($file->getClientOriginalExtension()),
            'file_size'           => $file->getSize(),
            'tahun'               => $validated['tahun'],
            'aktif'               => $request->boolean('aktif', true),
        ]);

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen publik berhasil diunggah.');
    }

    public function destroy(Dokumen $dokumen)
    {
        if ($dokumen->file_path && Storage::disk('public')->exists($dokumen->file_path)) {
            Storage::disk('public')->delete($dokumen->file_path);
        }

        $dokumen->delete();

        return redirect()->route('admin.dokumen.index')->with('success', 'Dokumen publik berhasil dihapus.');
    }
}
