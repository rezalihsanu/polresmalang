@extends('layouts.app')

@section('title', 'Lacak Status Tiket Pengaduan — Polres Malang')
@section('meta_description', 'Lacak tindak lanjut penanganan laporan pengaduan masyarakat di Kepolisian Resor Malang secara transparan menggunakan nomor tiket resmi.')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <a href="{{ route('pengaduan.create') }}" class="hover:text-gold-400 transition-colors">Pengaduan</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">Lacak Status</span>
        </nav>
        <span class="page-header-eyebrow">Transparansi Layanan Publik</span>
        <h1 class="page-header-title">Lacak Status Tiket Pengaduan</h1>
        <p class="text-slate-300 text-xs sm:text-sm mt-2 max-w-2xl leading-relaxed">
            Pantau perkembangan tindak lanjut dan respon resmi petugas atas laporan yang telah Anda sampaikan.
        </p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-10">
    <!-- Form Lacak Input -->
    <div class="bg-white border border-slate-200 p-6 sm:p-8 mb-8">
        <form method="GET" action="{{ route('pengaduan.lacak') }}" class="flex flex-col sm:flex-row gap-4">
            <div class="flex-1">
                <label class="form-label">Nomor Tiket Pengaduan Resmi</label>
                <div class="relative">
                    <input type="text" name="tiket" value="{{ request('tiket') }}" required
                           placeholder="Contoh: PMK-20260908-XXXXXX atau PGD-..."
                           class="form-input font-mono text-xs sm:text-sm uppercase tracking-wider pr-10">
                    <div class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                    </div>
                </div>
                <p class="text-[11px] text-slate-400 mt-1.5">Nomor tiket tertera pada bukti pengiriman saat pengaduan diajukan.</p>
            </div>
            <div class="sm:self-center sm:pt-4">
                <button type="submit" class="btn-primary w-full sm:w-auto text-xs py-3 px-6">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Cari Status Tiket
                </button>
            </div>
        </form>
    </div>

    <!-- Result Area -->
    @if($searched)
        @if($pengaduan)
            <div class="bg-white border border-slate-200 p-6 sm:p-8 space-y-6">
                <!-- Header Ticket Status -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
                    <div>
                        <span class="text-[11px] text-slate-400 font-semibold uppercase tracking-wider block">Nomor Registrasi Tiket:</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-navy-900 font-mono tracking-wide mt-0.5">{{ $pengaduan->nomor_tiket }}</h2>
                        <span class="text-xs text-slate-500 mt-1 block">Waktu Registrasi: {{ $pengaduan->created_at->translatedFormat('d F Y, H:i') }} WIB</span>
                    </div>

                    <div>
                        @if($pengaduan->status === 'baru')
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-bold bg-amber-50 text-amber-900 border border-amber-300">
                                <span class="w-2 h-2 rounded-full bg-amber-500 animate-pulse"></span>
                                BARU / DALAM ANTREAN
                            </span>
                        @elseif($pengaduan->status === 'diproses')
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-bold bg-blue-50 text-blue-900 border border-blue-300">
                                <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span>
                                SEDANG DITINDAKLANJUTI
                            </span>
                        @elseif($pengaduan->status === 'selesai')
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-bold bg-emerald-50 text-emerald-900 border border-emerald-300">
                                <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
                                SELESAI DITANGGAPI
                            </span>
                        @elseif($pengaduan->status === 'ditolak')
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-bold bg-red-50 text-red-900 border border-red-300">
                                <span class="w-2 h-2 rounded-full bg-red-600"></span>
                                DITOLAK / TIDAK SESUAI KETENTUAN
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Rincian Laporan -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs">
                    <div class="p-3 bg-slate-50 border border-slate-100">
                        <span class="text-slate-400 font-medium block mb-0.5">Nama Pelapor</span>
                        <p class="font-bold text-slate-800 text-sm">{{ $pengaduan->nama_pelapor }}</p>
                    </div>

                    <div class="p-3 bg-slate-50 border border-slate-100">
                        <span class="text-slate-400 font-medium block mb-0.5">Klasifikasi Pengaduan</span>
                        <p class="font-bold text-slate-800 text-sm">{{ $pengaduan->kategori ?? 'Layanan Kepolisian' }}</p>
                    </div>

                    <div class="col-span-full p-3 bg-slate-50 border border-slate-100">
                        <span class="text-slate-400 font-medium block mb-0.5">Judul Pengaduan</span>
                        <p class="font-bold text-navy-900 text-sm">{{ $pengaduan->judul }}</p>
                    </div>

                    <div class="col-span-full">
                        <span class="text-slate-500 font-semibold uppercase tracking-wider text-[11px] block mb-1.5">Uraian Isi Pengaduan:</span>
                        <div class="p-4 bg-slate-50 border border-slate-200 text-slate-700 leading-relaxed text-xs sm:text-sm">
                            {{ $pengaduan->isi_pengaduan }}
                        </div>
                    </div>
                </div>

                <!-- Balasan / Tanggapan Petugas -->
                <div class="pt-4 border-t border-slate-200">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-1 h-4 bg-gold-500 inline-block"></span>
                        <h3 class="font-bold text-navy-900 text-sm">Respon / Tanggapan Resmi Petugas Polres Malang</h3>
                    </div>

                    @if($pengaduan->tanggapan)
                        <div class="p-5 bg-navy-50 border-l-4 border-navy-700">
                            <p class="text-xs sm:text-sm text-slate-800 leading-relaxed font-medium mb-3">
                                "{{ $pengaduan->tanggapan }}"
                            </p>
                            <div class="flex items-center gap-2 text-[11px] text-slate-500 pt-2 border-t border-navy-100">
                                <svg class="w-3.5 h-3.5 text-navy-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Ditanggapi oleh Petugas Humas/SPKT pada:
                                <strong class="text-slate-700">{{ $pengaduan->ditangani_pada ? $pengaduan->ditangani_pada->translatedFormat('d F Y, H:i') . ' WIB' : 'Terkonfirmasi' }}</strong>
                            </div>
                        </div>
                    @else
                        <div class="p-5 bg-slate-50 border border-slate-200 text-center text-slate-500 text-xs">
                            <svg class="w-8 h-8 text-slate-400 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="font-medium text-slate-700">Belum ada respon resmi.</p>
                            <p class="mt-0.5">Laporan Anda telah tercatat dan sedang dalam antrean verifikasi serta disposisi ke satuan fungsi terkait.</p>
                        </div>
                    @endif
                </div>
            </div>
        @else
            <!-- Not found -->
            <div class="bg-white border border-slate-200 p-10 text-center">
                <svg class="w-12 h-12 text-amber-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                <h3 class="font-bold text-navy-900 text-base">Nomor Tiket Tidak Ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1 max-w-md mx-auto">
                    Nomor tiket <strong>"{{ request('tiket') }}"</strong> tidak ditemukan dalam basis data sistem. Silakan periksa kembali ketikan nomor tiket Anda atau pastikan formatnya telah sesuai.
                </p>
            </div>
        @endif
    @endif
</div>
@endsection
