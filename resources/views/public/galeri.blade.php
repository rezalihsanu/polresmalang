@extends('layouts.app')

@section('title', 'Galeri Kegiatan & Dokumentasi Presisi — Polres Malang')
@section('meta_description', 'Dokumentasi foto kegiatan Kepolisian Resor Malang meliputi bakti sosial, operasi pengamanan, patroli kamtibmas, dan pembinaan masyarakat.')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">Galeri Kegiatan</span>
        </nav>
        <span class="page-header-eyebrow">Dokumentasi Multimedia</span>
        <h1 class="page-header-title">Galeri Foto Kegiatan Presisi</h1>
        <p class="text-slate-300 text-xs sm:text-sm mt-2 max-w-2xl leading-relaxed">
            Dokumentasi visual rangkaian tugas, pengamanan, patroli kamtibmas, dan bakti sosial jajaran Polres Malang bagi masyarakat.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($kegiatans as $kegiatan)
            <article class="bg-white border border-slate-200 overflow-hidden hover:border-navy-400 hover:shadow-md transition-all duration-200 flex flex-col h-full group">
                <!-- Cover Image -->
                <div class="relative overflow-hidden aspect-[4/3] bg-navy-900">
                    <img src="{{ $kegiatan->cover_url }}" alt="{{ $kegiatan->judul }}"
                         class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-300">
                    <!-- Photo Count Badge -->
                    <div class="absolute bottom-2.5 right-2.5 bg-navy-950/80 text-white text-[11px] font-semibold px-2.5 py-1 border border-navy-700/80 flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $kegiatan->galeris->count() }} Foto
                    </div>
                </div>

                <!-- Info Body -->
                <div class="p-5 flex flex-col flex-grow">
                    <!-- Date & Location -->
                    <div class="flex items-center gap-2 text-[11px] text-slate-400 mb-2">
                        @if($kegiatan->tanggal_kegiatan)
                            <span class="text-gold-600 font-semibold">{{ $kegiatan->tanggal_kegiatan->translatedFormat('d M Y') }}</span>
                        @endif
                        @if($kegiatan->lokasi)
                            <span>&bull;</span>
                            <span class="truncate">{{ $kegiatan->lokasi }}</span>
                        @endif
                    </div>

                    <h2 class="font-bold text-sm sm:text-base text-navy-900 group-hover:text-navy-700 leading-snug mb-2 line-clamp-2">
                        <a href="{{ route('galeri.show', $kegiatan->slug) }}">
                            {{ $kegiatan->judul }}
                        </a>
                    </h2>

                    @if($kegiatan->deskripsi)
                        <p class="text-xs text-slate-600 line-clamp-2 mb-4 leading-relaxed flex-grow">
                            {{ $kegiatan->deskripsi }}
                        </p>
                    @endif

                    <div class="pt-3 border-t border-slate-100 mt-auto">
                        <a href="{{ route('galeri.show', $kegiatan->slug) }}"
                           class="text-xs font-bold text-navy-700 hover:text-gold-600 inline-flex items-center gap-1 transition-colors">
                            Lihat Album Foto &rarr;
                        </a>
                    </div>
                </div>
            </article>
        @empty
            <div class="col-span-full py-16 text-center bg-white border border-slate-200">
                <svg class="w-10 h-10 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <h3 class="font-bold text-slate-700 text-base">Belum Ada Dokumentasi Foto</h3>
                <p class="text-xs text-slate-500 mt-1">Dokumentasi kegiatan institusi akan dipublikasikan di halaman ini.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $kegiatans->links() }}
    </div>
</div>
@endsection
