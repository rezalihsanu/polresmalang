@extends('layouts.app')

@section('title', 'Bukti Pengiriman Pengaduan — Polres Malang')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-16">
    <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-xl text-center">
        <div class="w-20 h-20 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <h1 class="text-2xl sm:text-3xl font-extrabold text-navy-900 mb-2">Laporan Pengaduan Berhasil Terkirim!</h1>
        <p class="text-xs sm:text-sm text-slate-600 max-w-lg mx-auto mb-8">
            Terima kasih telah menyampaikan laporan pengaduan kepada Polres Malang. Harap simpan Nomor Tiket di bawah ini untuk melacak status laporan Anda.
        </p>

        <!-- Ticket Card Box -->
        <div class="p-6 bg-navy-900 text-white rounded-2xl max-w-md mx-auto mb-8 border border-gold-500/40 shadow-lg">
            <span class="text-[11px] font-bold text-gold-400 uppercase tracking-widest block mb-1">Nomor Tiket Pengaduan Anda</span>
            <div class="text-2xl sm:text-3xl font-black text-white font-mono tracking-wider select-all py-1">
                {{ $pengaduan->nomor_tiket }}
            </div>
            <span class="text-[11px] text-slate-400 block mt-2">Dibuat pada: {{ $pengaduan->created_at->format('d M Y, H:i') }} WIB</span>
        </div>

        <div class="p-4 bg-slate-50 rounded-xl text-xs text-slate-600 max-w-md mx-auto mb-8 text-left space-y-2">
            <div class="flex justify-between border-b border-slate-200 pb-1.5">
                <span class="text-slate-400">Nama Pelapor:</span>
                <span class="font-bold text-slate-800">{{ $pengaduan->nama_pelapor }}</span>
            </div>
            <div class="flex justify-between border-b border-slate-200 pb-1.5">
                <span class="text-slate-400">Kategori:</span>
                <span class="font-bold text-slate-800">{{ $pengaduan->kategori }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-400">Status Awal:</span>
                <span class="font-bold text-blue-600 uppercase">{{ $pengaduan->status }}</span>
            </div>
        </div>

        <div class="flex flex-wrap items-center justify-center gap-4">
            <a href="{{ route('pengaduan.lacak', ['tiket' => $pengaduan->nomor_tiket]) }}" class="btn-gold text-xs px-6 py-3">
                Lacak Status Tiket Pengaduan
            </a>
            <a href="{{ route('home') }}" class="btn-secondary text-xs px-6 py-3">
                Kembali ke Beranda
            </a>
        </div>
    </div>
</div>
@endsection
