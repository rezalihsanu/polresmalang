@extends('layouts.app')

@section('title', $berita->judul . ' — Polres Malang')
@section('meta_description', $berita->ringkasan)

@section('content')
<div class="bg-navy-900 text-white py-8 border-b border-gold-500/30">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <div class="flex items-center gap-2 text-xs text-gold-400 mb-3">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <a href="{{ route('berita.index') }}" class="hover:underline">Berita</a>
            <span>/</span>
            <span class="text-slate-300 truncate">{{ $berita->kategori?->nama ?? 'Umum' }}</span>
        </div>
        <h1 class="text-2xl sm:text-4xl font-extrabold text-white leading-tight mb-4">
            {{ $berita->judul }}
        </h1>
        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300">
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Penulis: {{ $berita->penulis?->name ?? 'Humas Polresta' }}
            </span>
            <span>&bull;</span>
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $berita->published_at ? $berita->published_at->translatedFormat('d F Y, H:i') . ' WIB' : '' }}
            </span>
            <span>&bull;</span>
            <span class="flex items-center gap-1.5">
                <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                Dibaca {{ $berita->dibaca_count ?? 1 }} kali
            </span>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">
    <!-- Gambar Utama Artikel -->
    <div class="rounded-3xl overflow-hidden shadow-xl bg-navy-900 mb-8 border border-slate-200 aspect-[16/9]">
        <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
    </div>

    <!-- Ringkasan / Lead -->
    <div class="p-6 bg-navy-50 rounded-2xl border-l-4 border-navy-600 mb-8 text-slate-800 text-sm font-semibold leading-relaxed">
        {{ $berita->ringkasan }}
    </div>

    <!-- Konten Utama (HTML Render) -->
    <article class="prose prose-navy max-w-none text-slate-700 leading-relaxed space-y-4 mb-12 text-sm sm:text-base">
        {!! $berita->konten !!}
    </article>

    <!-- Share Social -->
    <div class="pt-6 border-t border-slate-200 flex flex-wrap items-center justify-between gap-4 mb-16">
        <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Bagikan Berita Ini:</span>
        <div class="flex items-center gap-3">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="px-4 py-2 bg-blue-600 text-white rounded-xl text-xs font-semibold hover:bg-blue-700 transition">
                Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(request()->fullUrl()) }}" target="_blank" class="px-4 py-2 bg-sky-500 text-white rounded-xl text-xs font-semibold hover:bg-sky-600 transition">
                X / Twitter
            </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}" target="_blank" class="px-4 py-2 bg-emerald-600 text-white rounded-xl text-xs font-semibold hover:bg-emerald-700 transition">
                WhatsApp
            </a>
        </div>
    </div>

    <!-- Berita Terkait -->
    @if(count($relatedBeritas) > 0)
        <div class="pt-8 border-t border-slate-200">
            <h3 class="text-xl font-bold text-navy-800 mb-6">Berita Terkait</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedBeritas as $rel)
                    <x-card-berita :berita="$rel" />
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
