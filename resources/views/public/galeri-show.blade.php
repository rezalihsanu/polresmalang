@extends('layouts.app')

@section('title', $kegiatan->judul . ' — Galeri Polres Malang')
@section('meta_description', $kegiatan->deskripsi ?? 'Dokumentasi foto resmi kegiatan ' . $kegiatan->judul . ' oleh Polres Malang.')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <a href="{{ route('galeri.index') }}" class="hover:text-gold-400 transition-colors">Galeri</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300 truncate">{{ $kegiatan->judul }}</span>
        </nav>
        <span class="page-header-eyebrow">Album Dokumentasi</span>
        <h1 class="page-header-title">{{ $kegiatan->judul }}</h1>

        <!-- Metadata -->
        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300 pt-3 mt-3 border-t border-navy-700">
            @if($kegiatan->tanggal_kegiatan)
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $kegiatan->tanggal_kegiatan->translatedFormat('d F Y') }}
            </span>
            @endif

            @if($kegiatan->lokasi)
            <span class="text-navy-600">&bull;</span>
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                {{ $kegiatan->lokasi }}
            </span>
            @endif

            <span class="text-navy-600">&bull;</span>
            <span class="text-gold-400 font-semibold">
                {{ $kegiatan->galeris->count() }} Dokumentasi Foto
            </span>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Deskripsi Kegiatan -->
    @if($kegiatan->deskripsi)
    <div class="bg-white border border-slate-200 p-6 mb-8 text-sm text-slate-700 leading-relaxed">
        <h2 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Deskripsi Pelaksanaan Kegiatan</h2>
        <p>{{ $kegiatan->deskripsi }}</p>
    </div>
    @endif

    <!-- Photo Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">
        @forelse($kegiatan->galeris as $foto)
            <div class="bg-white border border-slate-200 overflow-hidden group">
                <div class="relative overflow-hidden aspect-[4/3] bg-navy-950">
                    <img src="{{ $foto->foto_url }}" alt="{{ $foto->keterangan ?? $kegiatan->judul }}"
                         class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-300"
                         loading="lazy">
                </div>
                @if($foto->keterangan || $foto->caption)
                <div class="p-3 bg-white border-t border-slate-100">
                    <p class="text-xs text-slate-600 leading-snug">
                        {{ $foto->keterangan ?? $foto->caption }}
                    </p>
                </div>
                @endif
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-white border border-slate-200">
                <p class="text-xs text-slate-400">Belum ada foto yang diunggah untuk kegiatan ini.</p>
            </div>
        @endforelse
    </div>

    <!-- Back Button -->
    <div class="pt-6 border-t border-slate-200">
        <a href="{{ route('galeri.index') }}" class="btn-secondary text-xs">
            &larr; Kembali ke Galeri Kegiatan
        </a>
    </div>
</div>
@endsection
