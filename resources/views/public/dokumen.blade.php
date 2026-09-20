@extends('layouts.app')

@section('title', 'Dokumen Publik & PPID — Polres Malang')
@section('meta_description', 'Portal Pejabat Pengelola Informasi dan Dokumentasi (PPID) Polres Malang. Akses dan unduh dokumen keterbukaan informasi publik, regulasi, dan laporan kinerja.')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">PPID &amp; Dokumen</span>
        </nav>
        <span class="page-header-eyebrow">Keterbukaan Informasi Publik</span>
        <h1 class="page-header-title">Dokumen Resmi &amp; Informasi Publik</h1>
        <p class="text-slate-300 text-xs sm:text-sm mt-2 max-w-2xl leading-relaxed">
            Layanan keterbukaan informasi publik sesuai amanat Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik (KIP).
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Filter & Search Bar -->
    <div class="bg-white border border-slate-200 p-4 sm:p-5 mb-8">
        <form method="GET" action="{{ route('dokumen.index') }}" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
            <!-- Search Query -->
            <div class="lg:col-span-2">
                <input type="text" name="q" value="{{ request('q') }}"
                       placeholder="Cari judul atau isi ringkas dokumen..."
                       class="form-input text-xs w-full">
            </div>

            <!-- Kategori -->
            <div>
                <select name="kategori" class="form-input text-xs bg-white cursor-pointer w-full">
                    <option value="">Semua Kategori Dokumen</option>
                    @foreach($kategoriList as $kat)
                        <option value="{{ $kat->slug }}" {{ request('kategori') == $kat->slug ? 'selected' : '' }}>
                            {{ $kat->nama }} ({{ $kat->dokumens_count }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tahun & Submit -->
            <div class="flex gap-2">
                <select name="tahun" class="form-input text-xs bg-white cursor-pointer flex-1">
                    <option value="">Semua Tahun</option>
                    @foreach($tahunList as $thn)
                        <option value="{{ $thn }}" {{ request('tahun') == $thn ? 'selected' : '' }}>
                            {{ $thn }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" class="btn-primary text-xs px-4 py-2 flex-shrink-0">
                    Filter
                </button>
            </div>
        </form>
    </div>

    <!-- Document List Table -->
    <div class="bg-white border border-slate-200 overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="table-institutional">
                <thead>
                    <tr>
                        <th class="w-12 text-center">No</th>
                        <th>Judul Dokumen / Informasi</th>
                        <th class="w-36">Kategori</th>
                        <th class="w-20 text-center">Tahun</th>
                        <th class="w-24 text-center">Ukuran</th>
                        <th class="w-32 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($dokumens as $index => $dokumen)
                        <tr>
                            <td class="text-center font-mono text-xs text-slate-400">
                                {{ $dokumens->firstItem() + $index }}
                            </td>
                            <td>
                                <span class="font-bold text-navy-900 block text-sm mb-0.5">{{ $dokumen->judul }}</span>
                                @if($dokumen->deskripsi)
                                    <p class="text-xs text-slate-500 line-clamp-1">{{ $dokumen->deskripsi }}</p>
                                @endif
                                <span class="text-[11px] text-slate-400 mt-1 inline-block">
                                    Diunduh {{ $dokumen->download_count ?? 0 }} kali
                                </span>
                            </td>
                            <td>
                                <span class="badge-navy text-[11px]">
                                    {{ $dokumen->kategori?->nama ?? 'Umum' }}
                                </span>
                            </td>
                            <td class="text-center font-mono text-xs font-semibold text-slate-700">
                                {{ $dokumen->tahun ?? '-' }}
                            </td>
                            <td class="text-center text-xs text-slate-500 font-mono">
                                {{ $dokumen->file_size_readable }}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('dokumen.download', $dokumen->id) }}"
                                   class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-navy-700 hover:bg-navy-800 text-white text-xs font-semibold transition-colors rounded-sm">
                                    <svg class="w-3.5 h-3.5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                    </svg>
                                    Unduh
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-14 text-center text-slate-400 text-xs">
                                <svg class="w-10 h-10 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="font-bold text-slate-700 text-sm">Tidak ada dokumen yang sesuai dengan filter.</p>
                                <p class="mt-0.5">Silakan ubah kata kunci pencarian atau pilih kategori lain.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $dokumens->links() }}
    </div>
</div>
@endsection
