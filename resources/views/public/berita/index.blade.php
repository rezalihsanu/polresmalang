@extends('layouts.app')

@section('title', 'Berita & Informasi Publik — Polres Malang')

@section('content')
<div class="bg-navy-900 text-white py-10 border-b border-gold-500/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Portal Informasi Publik</span>
        <h1 class="text-3xl font-extrabold text-white mt-1">Berita & Pengungkapan Kasus</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Filter Kategori & Form Cari -->
    <div class="bg-white rounded-2xl p-4 md:p-6 border border-slate-200 shadow-sm mb-10">
        <form method="GET" action="{{ route('berita.index') }}" class="flex flex-col md:flex-row gap-4 justify-between items-center">
            <!-- Filter Kategori Pill -->
            <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-none">
                <a href="{{ route('berita.index') }}"
                   class="px-4 py-2 rounded-xl text-xs font-semibold whitespace-nowrap transition {{ !request('kategori') ? 'bg-navy-500 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                    Semua Kategori
                </a>
                @foreach($kategoriList as $kat)
                    <a href="{{ route('berita.index', ['kategori' => $kat->slug]) }}"
                       class="px-4 py-2 rounded-xl text-xs font-semibold whitespace-nowrap transition {{ request('kategori') == $kat->slug ? 'bg-navy-500 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        {{ $kat->nama }} ({{ $kat->beritas_count }})
                    </a>
                @endforeach
            </div>

            <!-- Form Search Input -->
            <div class="relative w-full md:w-80">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul berita..." class="form-input text-xs pr-10">
                <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-navy-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </form>
    </div>

    <!-- Grid Artikel Berita -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($beritas as $berita)
            <x-card-berita :berita="$berita" />
        @empty
            <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-slate-200">
                <svg class="w-16 h-16 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                <h3 class="font-bold text-slate-700 text-lg">Tidak Ada Berita Ditemukan</h3>
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
