<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Layanan;
use Illuminate\Support\Str;

class PengaduanController extends Controller
{
    public function create()
    {
        $layanans = Layanan::aktif()->ordered()->get();
        return view('public.pengaduan', compact('layanans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor'  => 'required|string|max:255',
            'nik'           => 'required|string|numeric|digits:16',
            'email_pelapor' => 'required|email|max:255',
            'no_hp_pelapor' => 'required|string|max:20',
            'alamat'        => 'required|string',
            'kategori'      => 'required|string',
            'judul'         => 'required|string|max:255',
            'isi_pengaduan' => 'required|string|min:20',
            'layanan_id'    => 'nullable|exists:layanans,id',
            'lampiran'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        ], [
            'nama_pelapor.required'  => 'Nama lengkap wajib diisi.',
            'nik.required'           => 'NIK 16 digit wajib diisi.',
            'nik.digits'             => 'NIK harus terdiri dari 16 digit angka.',
            'email_pelapor.required' => 'Email aktif wajib diisi.',
            'no_hp_pelapor.required' => 'Nomor HP/WhatsApp wajib diisi.',
            'alamat.required'        => 'Alamat domisili wajib diisi.',
            'kategori.required'      => 'Pilih kategori pengaduan.',
            'judul.required'         => 'Judul pengaduan wajib diisi.',
            'isi_pengaduan.required' => 'Isi pengaduan wajib diisi minimal 20 karakter.',
            'lampiran.max'           => 'Ukuran lampiran maksimal 5 MB.',
        ]);

        if ($request->hasFile('lampiran')) {
            $validated['lampiran'] = $request->file('lampiran')->store('pengaduan-lampiran', 'public');
        }

        $validated['ip_address'] = $request->ip();

        $pengaduan = Pengaduan::create($validated);

        return redirect()->route('pengaduan.sukses', ['tiket' => $pengaduan->nomor_tiket])
            ->with('success', 'Pengaduan Anda berhasil dikirim dengan Nomor Tiket: ' . $pengaduan->nomor_tiket);
    }

    public function sukses(Request $request)
    {
        $tiket = $request->query('tiket');
        $pengaduan = Pengaduan::where('nomor_tiket', $tiket)->firstOrFail();

        return view('public.pengaduan-sukses', compact('pengaduan'));
    }

    public function lacak(Request $request)
    {
        $pengaduan = null;
        $searched = false;

        if ($request->filled('tiket')) {
            $searched = true;
            $pengaduan = Pengaduan::with('layanan')->where('nomor_tiket', trim($request->tiket))->first();
        }

        return view('public.pengaduan-lacak', compact('pengaduan', 'searched'));
    }
}
