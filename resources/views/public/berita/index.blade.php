@extends('layouts.app')

@section('title', 'Berita & Informasi Publik — Polres Malang')

@section('content')
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">Berita</span>
        </nav>
        <span class="page-header-eyebrow">Portal Informasi Publik</span>
        <h1 class="page-header-title">Berita &amp; Pengungkapan Kasus</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Filter Kategori & Form Cari -->
    <!-- Filter Bar -->
    <div class="bg-white border border-slate-200 mb-8">
        <form method="GET" action="{{ route('berita.index') }}"
              class="flex flex-col md:flex-row gap-0 justify-between items-stretch">

            <!-- Kategori Tabs -->
            <div class="flex items-center overflow-x-auto border-b md:border-b-0 md:border-r border-slate-200">
                <a href="{{ route('berita.index') }}"
                   class="flex-shrink-0 px-4 py-3 text-xs font-semibold border-b-2 transition-colors whitespace-nowrap
                          {{ !request('kategori')
                             ? 'border-navy-700 text-navy-700 bg-navy-50'
                             : 'border-transparent text-slate-500 hover:text-navy-700 hover:bg-slate-50' }}">
                    Semua Kategori
                </a>
                @foreach($kategoriList as $kat)
                    <a href="{{ route('berita.index', ['kategori' => $kat->slug]) }}"
                       class="flex-shrink-0 px-4 py-3 text-xs font-semibold border-b-2 transition-colors whitespace-nowrap
                              {{ request('kategori') == $kat->slug
                                 ? 'border-navy-700 text-navy-700 bg-navy-50'
                                 : 'border-transparent text-slate-500 hover:text-navy-700 hover:bg-slate-50' }}">
                        {{ $kat->nama }}
                        <span class="ml-1 text-slate-400">({{ $kat->beritas_count }})</span>
                    </a>
                @endforeach
            </div>

            <!-- Search Input -->
            <div class="relative flex-shrink-0">
                <input type="text" name="q" value="{{ request('q') }}"
                       placeholder="Cari judul berita..."
                       class="w-full md:w-64 px-4 py-3 text-xs border-0 border-l-0 border-slate-200
                              focus:outline-none focus:ring-1 focus:ring-navy-500 text-slate-700
                              placeholder:text-slate-400 pr-10">
                <button type="submit"
                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-navy-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <!-- Grid Artikel Berita -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($beritas as $berita)
            <x-card-berita :berita="$berita" />
        @empty
            <div class="col-span-full py-16 text-center bg-white border border-slate-200">
                <svg class="w-10 h-10 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                </svg>
                <h3 class="font-bold text-slate-700 text-base">Tidak Ada Berita Ditemukan</h3>
                <p class="text-xs text-slate-500 mt-1">Coba sesuaikan kata kunci pencarian atau kategori yang Anda pilih.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div class="mt-10">
        {{ $beritas->links() }}
    </div>
</div>
@endsection
