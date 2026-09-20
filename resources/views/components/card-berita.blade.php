@props(['berita'])

<article class="group flex flex-col h-full bg-white border border-slate-200 overflow-hidden hover:border-slate-300 hover:shadow-md transition-all duration-200">

    {{-- Thumbnail --}}
    <div class="relative overflow-hidden bg-navy-900" style="aspect-ratio: 16/9;">
        <img src="{{ $berita->gambar_url }}"
             alt="{{ $berita->judul }}"
             class="w-full h-full object-cover group-hover:scale-103 transition-transform duration-500"
             loading="lazy">

        {{-- Category badge --}}
        @if($berita->kategori)
            <span class="absolute top-0 left-0 bg-navy-800 text-white text-[10px] font-bold uppercase tracking-wider px-2.5 py-1.5">
                {{ $berita->kategori->nama }}
            </span>
        @endif

        {{-- Highlight badge --}}
        @if($berita->highlight)
            <span class="absolute top-0 right-0 bg-gold-400 text-navy-900 text-[10px] font-bold uppercase tracking-wider px-2.5 py-1.5">
                Utama
            </span>
        @endif
    </div>

    {{-- Content --}}
    <div class="flex flex-col flex-1 p-5">

        {{-- Metadata --}}
        <div class="flex items-center gap-3 text-[11px] text-slate-400 mb-2.5 font-medium">
            <span class="flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                {{ $berita->published_at ? $berita->published_at->format('d M Y') : date('d M Y') }}
            </span>
            <span class="text-slate-300">·</span>
            <span class="flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                {{ $berita->dibaca_count ?? 0 }}x
            </span>
        </div>

        {{-- Headline --}}
        <h3 class="text-sm font-bold text-navy-800 line-clamp-2 mb-2.5 leading-snug
                   group-hover:text-navy-600 transition-colors duration-150">
            <a href="{{ route('berita.show', $berita->slug) }}">
                {{ $berita->judul }}
            </a>
        </h3>

        {{-- Summary --}}
        <p class="text-xs text-slate-500 line-clamp-2 mb-4 flex-1 leading-relaxed">
            {{ $berita->ringkasan }}
        </p>

        {{-- Footer --}}
        <div class="flex items-center justify-between pt-3 border-t border-slate-100 mt-auto text-xs">
            <span class="text-slate-400 font-medium">Humas Polresta</span>
            <a href="{{ route('berita.show', $berita->slug) }}"
               class="font-semibold text-navy-600 hover:text-navy-900 transition-colors duration-150
                      flex items-center gap-1 group/link">
                Selengkapnya
                <svg class="w-3 h-3 group-hover/link:translate-x-0.5 transition-transform duration-150"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

    </div>
</article>
