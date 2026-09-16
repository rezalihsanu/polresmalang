@extends('layouts.app')

@section('title', 'Lacak Status Tiket Pengaduan — Polres Malang')

@section('content')
<div class="bg-navy-900 text-white py-10 border-b border-gold-500/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Pusat Informasi Pengaduan</span>
        <h1 class="text-3xl font-extrabold text-white mt-1">Lacak Status Tiket Pengaduan</h1>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">
    <!-- Form Lacak Input -->
    <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm mb-10">
        <form method="GET" action="{{ route('pengaduan.lacak') }}" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <label class="form-label">Masukkan Nomor Tiket Pengaduan</label>
                <input type="text" name="tiket" value="{{ request('tiket') }}" required placeholder="Contoh: PMK-20260908-XXXXXX atau PGD-..." class="form-input font-mono text-sm uppercase">
            </div>
            <div class="sm:self-end">
                <button type="submit" class="btn-primary w-full sm:w-auto text-xs py-3.5 px-6">
                    Cari Tiket
                </button>
            </div>
        </form>
    </div>

    <!-- Result Area -->
    @if($searched)
        @if($pengaduan)
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-xl space-y-8">
                <!-- Header Ticket Status -->
                <div class="flex flex-wrap items-center justify-between gap-4 pb-6 border-b border-slate-100">
                    <div>
                        <span class="text-xs text-slate-400 font-medium block">Nomor Tiket:</span>
                        <h2 class="text-2xl font-black text-navy-900 font-mono">{{ $pengaduan->nomor_tiket }}</h2>
                        <span class="text-xs text-slate-500">Dibuat pada: {{ $pengaduan->created_at->format('d M Y, H:i') }} WIB</span>
                    </div>

                    <div>
                        @if($pengaduan->status === 'baru')
                            <span class="px-4 py-2 rounded-full text-xs font-bold bg-blue-100 text-blue-800 border border-blue-200">
                                🟡 STATUS: BARU / DALAM ANTREAN
                            </span>
                        @elseif($pengaduan->status === 'diproses')
                            <span class="px-4 py-2 rounded-full text-xs font-bold bg-amber-100 text-amber-800 border border-amber-200">
                                🟠 STATUS: SEDANG DIPROSES PETUGAS
                            </span>
                        @elseif($pengaduan->status === 'selesai')
                            <span class="px-4 py-2 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800 border border-emerald-200">
                                🟢 STATUS: SELESAI DITANGGAPI
                            </span>
                        @elseif($pengaduan->status === 'ditolak')
                            <span class="px-4 py-2 rounded-full text-xs font-bold bg-red-100 text-red-800 border border-red-200">
                                🔴 STATUS: DITOLAK / TIDAK VALID
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Rincian Laporan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-xs">
                    <div>
                        <span class="text-slate-400 font-semibold block mb-1">Nama Pelapor:</span>
                        <p class="font-bold text-slate-800 text-sm">{{ $pengaduan->nama_pelapor }}</p>
                    </div>

                    <div>
                        <span class="text-slate-400 font-semibold block mb-1">Kategori:</span>
                        <p class="font-bold text-slate-800 text-sm">{{ $pengaduan->kategori ?? 'Layanan Kepolisian' }}</p>
                    </div>

                    <div class="col-span-full">
                        <span class="text-slate-400 font-semibold block mb-1">Judul Pengaduan:</span>
                        <p class="font-bold text-slate-900 text-sm">{{ $pengaduan->judul }}</p>
                    </div>

                    <div class="col-span-full">
                        <span class="text-slate-400 font-semibold block mb-1">Isi Laporan Pengaduan:</span>
                        <div class="p-4 bg-slate-50 rounded-xl text-slate-700 leading-relaxed">
                            {{ $pengaduan->isi_pengaduan }}
                        </div>
                    </div>
                </div>

                <!-- Balasan / Tanggapan Petugas -->
                <div class="pt-6 border-t border-slate-100">
                    <h3 class="font-bold text-navy-900 text-base mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                        Tanggapan / Respon Petugas Polresta
                    </h3>

                    @if($pengaduan->tanggapan)
                        <div class="p-6 bg-navy-50 border-l-4 border-navy-600 rounded-2xl">
                            <p class="text-sm text-slate-800 leading-relaxed mb-3 font-medium">
                                "{{ $pengaduan->tanggapan }}"
                            </p>
                            <span class="text-xs text-slate-500 block">
                                Ditanggapi pada: {{ $pengaduan->ditangani_pada ? $pengaduan->ditangani_pada->translatedFormat('d F Y, H:i') : '' }} WIB
                            </span>
                        </div>
                    @else
                        <div class="p-6 bg-slate-50 rounded-2xl text-center text-slate-500 text-xs">
                            Belum ada tanggapan resmi dari petugas. Laporan Anda sedang dalam tahap verifikasi internal.
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="bg-white rounded-3xl p-12 border border-slate-200 text-center">
                <svg class="w-16 h-16 text-amber-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <h3 class="font-bold text-navy-900 text-lg">Nomor Tiket Tidak Ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1">Pastikan Anda memasukkan nomor tiket pengaduan yang benar dan sesuai format.</p>
            </div>
        @endif
    @endif
</div>
@endsection
