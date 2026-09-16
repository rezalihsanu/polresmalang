<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $query = Pengaduan::with(['layanan', 'petugas']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('nomor_tiket', 'LIKE', "%{$keyword}%")
                  ->orWhere('nama_pelapor', 'LIKE', "%{$keyword}%")
                  ->orWhere('nik', 'LIKE', "%{$keyword}%")
                  ->orWhere('judul', 'LIKE', "%{$keyword}%");
            });
        }

        $pengaduans = $query->latest()->paginate(10)->withQueryString();

        return view('admin.pengaduan.index', compact('pengaduans'));
    }

    public function show(Pengaduan $pengaduan)
    {
        return view('admin.pengaduan.show', compact('pengaduan'));
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $validated = $request->validate([
            'status'    => 'required|in:baru,diproses,selesai,ditolak',
            'tanggapan' => 'nullable|string|min:5',
        ], [
            'status.required'    => 'Status pengaduan wajib dipilih.',
            'tanggapan.min'      => 'Tanggapan/balasan minimal 5 karakter.',
        ]);

        $validated['ditangani_oleh'] = Auth::id();
        $validated['ditangani_pada'] = now();

        $pengaduan->update($validated);

        return redirect()->route('admin.pengaduan.show', $pengaduan)
            ->with('success', 'Status pengaduan berhasil diperbarui dan tanggapan tersimpan.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return redirect()->route('admin.pengaduan.index')->with('success', 'Data pengaduan berhasil dihapus.');
    }
}
