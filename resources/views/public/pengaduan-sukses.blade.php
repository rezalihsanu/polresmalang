@extends('layouts.app')

@section('title', 'Bukti Registrasi Pengaduan — Polres Malang')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="bg-white border border-slate-200 p-8 sm:p-10 shadow-sm text-center">
        <!-- Success Icon -->
        <div class="w-14 h-14 bg-emerald-50 border border-emerald-300 text-emerald-700 flex items-center justify-center mx-auto mb-5">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
            </svg>
        </div>

        <span class="text-xs font-bold uppercase tracking-widest text-emerald-700 block mb-1">Registrasi Berhasil</span>
        <h1 class="text-2xl font-bold text-navy-900 mb-2">Laporan Pengaduan Berhasil Terkirim</h1>
        <p class="text-xs sm:text-sm text-slate-600 max-w-lg mx-auto mb-8 leading-relaxed">
            Terima kasih atas partisipasi Anda. Laporan pengaduan telah tersimpan dalam sistem resmi Kepolisian Resor Malang dan akan segera ditindaklanjuti.
        </p>

        <!-- Ticket Card Box -->
        <div class="p-6 bg-navy-800 text-white border-2 border-gold-400 mb-8 text-left">
            <span class="text-[10px] font-bold text-gold-400 uppercase tracking-widest block mb-1">Nomor Registrasi Tiket Resmi</span>
            <div class="text-2xl sm:text-3xl font-bold text-white font-mono tracking-wider select-all py-1">
                {{ $pengaduan->nomor_tiket }}
            </div>
            <p class="text-[11px] text-slate-400 mt-2 border-t border-navy-700 pt-2">
                Simpan atau catat nomor tiket ini untuk melacak perkembangan penanganan laporan Anda di kemudian hari.
            </p>
        </div>

        <!-- Summary Info Table -->
        <div class="bg-slate-50 border border-slate-200 text-xs text-left mb-8 divide-y divide-slate-200">
            <div class="flex justify-between items-center px-4 py-2.5">
                <span class="text-slate-500 font-medium">Nama Pelapor:</span>
                <span class="font-bold text-slate-800">{{ $pengaduan->nama_pelapor }}</span>
            </div>
            <div class="flex justify-between items-center px-4 py-2.5">
                <span class="text-slate-500 font-medium">Klasifikasi:</span>
                <span class="font-bold text-slate-800">{{ $pengaduan->kategori }}</span>
            </div>
            <div class="flex justify-between items-center px-4 py-2.5">
                <span class="text-slate-500 font-medium">Waktu Pengajuan:</span>
                <span class="font-semibold text-slate-700">{{ $pengaduan->created_at->translatedFormat('d F Y, H:i') }} WIB</span>
            </div>
            <div class="flex justify-between items-center px-4 py-2.5">
                <span class="text-slate-500 font-medium">Status Saat Ini:</span>
                <span class="font-bold text-amber-700 bg-amber-50 border border-amber-200 px-2 py-0.5 uppercase tracking-wide text-[11px]">
                    {{ $pengaduan->status }} / Dalam Antrean
                </span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
            <a href="{{ route('pengaduan.lacak', ['tiket' => $pengaduan->nomor_tiket]) }}" class="btn-gold text-xs px-6 py-2.5 w-full sm:w-auto justify-center">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                Lacak Status Tiket Ini
            </a>
            <a href="{{ route('home') }}" class="btn-secondary text-xs px-6 py-2.5 w-full sm:w-auto justify-center">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
