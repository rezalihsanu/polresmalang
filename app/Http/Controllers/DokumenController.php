<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\KategoriDokumen;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{
    public function index(Request $request)
    {
        $query = Dokumen::with('kategori')->aktif();

        if ($request->filled('kategori')) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('slug', $request->kategori);
            });
        }

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'LIKE', "%{$keyword}%")
                  ->orWhere('deskripsi', 'LIKE', "%{$keyword}%");
            });
        }

        $dokumens = $query->latest()->paginate(10)->withQueryString();
        $kategoriList = KategoriDokumen::withCount('dokumens')->get();
        $tahunList = Dokumen::select('tahun')->whereNotNull('tahun')->distinct()->pluck('tahun')->sortDesc();

        return view('public.dokumen', compact('dokumens', 'kategoriList', 'tahunList'));
    }

    public function download(Dokumen $dokumen)
    {
        $dokumen->incrementDownload();

        if ($dokumen->file_path && Storage::disk('public')->exists($dokumen->file_path)) {
            return Storage::disk('public')->download($dokumen->file_path, $dokumen->file_name ?? $dokumen->judul);
        }

        return back()->with('error', 'File dokumen tidak ditemukan di server.');
    }
}
