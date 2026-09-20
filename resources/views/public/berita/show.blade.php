@extends('layouts.app')

@section('title', $berita->judul . ' — Polres Malang')
@section('meta_description', $berita->ringkasan)

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        <!-- Breadcrumbs -->
        <nav class="text-xs text-slate-400 mb-3" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <a href="{{ route('berita.index') }}" class="hover:text-gold-400 transition-colors">Berita</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300 truncate">{{ $berita->kategori?->nama ?? 'Umum' }}</span>
        </nav>

        <span class="page-header-eyebrow">{{ $berita->kategori?->nama ?? 'Siaran Pers Resmi' }}</span>
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-white leading-tight mb-4">
            {{ $berita->judul }}
        </h1>

        <!-- Metadata Bar -->
        <div class="flex flex-wrap items-center gap-4 text-xs text-slate-300 pt-3 border-t border-navy-700">
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                Rilis: <strong class="text-white">{{ $berita->penulis?->name ?? 'Seksi Humas Polres Malang' }}</strong>
            </span>
            <span class="text-navy-600">&bull;</span>
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $berita->published_at ? $berita->published_at->translatedFormat('d F Y, H:i') . ' WIB' : '' }}
            </span>
            <span class="text-navy-600">&bull;</span>
            <span class="flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                Dibaca {{ $berita->dibaca_count ?? 1 }} kali
            </span>
        </div>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-10">
    <!-- Gambar Utama Artikel -->
    <div class="border border-slate-200 overflow-hidden bg-navy-950 mb-8 aspect-[16/9] shadow-sm">
        <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover">
    </div>

    <!-- Ringkasan / Lead Box Institutional -->
    @if($berita->ringkasan)
    <div class="p-5 bg-slate-100 border-l-4 border-navy-700 mb-8 text-slate-800 text-sm font-medium leading-relaxed">
        {{ $berita->ringkasan }}
    </div>
    @endif

    <!-- Konten Utama (HTML Render) -->
    <article class="prose prose-slate max-w-none text-slate-800 leading-relaxed space-y-4 mb-12 text-sm sm:text-base border-b border-slate-200 pb-10">
        {!! $berita->konten !!}
    </article>

    <!-- Share Social - Institutional style -->
    <div class="flex flex-wrap items-center justify-between gap-4 mb-14 py-4 px-5 bg-white border border-slate-200">
        <span class="text-xs font-bold text-slate-700 uppercase tracking-wider flex items-center gap-2">
            <svg class="w-4 h-4 text-navy-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
            </svg>
            Bagikan Informasi:
        </span>
        <div class="flex items-center gap-2">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
               target="_blank" rel="noopener"
               class="px-3.5 py-1.5 bg-[#1877F2] text-white text-xs font-medium hover:opacity-90 transition rounded-sm flex items-center gap-1.5">
                Facebook
            </a>
            <a href="https://twitter.com/intent/tweet?text={{ urlencode($berita->judul) }}&url={{ urlencode(request()->fullUrl()) }}"
               target="_blank" rel="noopener"
               class="px-3.5 py-1.5 bg-[#1DA1F2] text-white text-xs font-medium hover:opacity-90 transition rounded-sm flex items-center gap-1.5">
                Twitter / X
            </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode($berita->judul . ' ' . request()->fullUrl()) }}"
               target="_blank" rel="noopener"
               class="px-3.5 py-1.5 bg-[#25D366] text-white text-xs font-medium hover:opacity-90 transition rounded-sm flex items-center gap-1.5">
                WhatsApp
            </a>
        </div>
    </div>

    <!-- Berita Terkait -->
    @if(count($relatedBeritas) > 0)
        <div class="pt-6">
            <div class="flex items-center gap-3 mb-6">
                <span class="inline-block w-1 h-5 bg-gold-400"></span>
                <h3 class="text-lg font-bold text-navy-800">Berita Terkait Lainnya</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($relatedBeritas as $rel)
                    <x-card-berita :berita="$rel" />
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
