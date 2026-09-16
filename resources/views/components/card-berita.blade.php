@props(['berita'])

<article class="card-hover flex flex-col h-full bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden group">
    <div class="relative overflow-hidden aspect-[16/10] bg-navy-900">
        <img src="{{ $berita->gambar_url }}" alt="{{ $berita->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 loading="lazy">
        @if($berita->kategori)
            <span class="absolute top-3 left-3 badge-navy shadow-sm">
                {{ $berita->kategori->nama }}
            </span>
        @endif
        @if($berita->highlight)
            <span class="absolute top-3 right-3 badge-gold shadow-sm">
                Utama
            </span>
        @endif
    </div>

    <div class="p-5 flex flex-col flex-1">
        <div class="flex items-center gap-3 text-xs text-slate-400 mb-2">
            <span class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-navy-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                {{ $berita->published_at ? $berita->published_at->format('d M Y') : date('d M Y') }}
            </span>
            <span>&bull;</span>
            <span class="flex items-center gap-1">
                <svg class="w-3.5 h-3.5 text-navy-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                {{ $berita->dibaca_count ?? 0 }}x
            </span>
        </div>

        <h3 class="text-base font-bold text-navy-800 line-clamp-2 mb-2 group-hover:text-navy-500 transition-colors leading-snug">
            <a href="{{ route('berita.show', $berita->slug) }}">
                {{ $berita->judul }}
            </a>
        </h3>

        <p class="text-xs text-slate-500 line-clamp-3 mb-4 flex-1">
            {{ $berita->ringkasan }}
        </p>

        <div class="pt-3 border-t border-slate-100 flex items-center justify-between mt-auto text-xs">
            <span class="text-slate-400 font-medium">Humas Polresta</span>
            <a href="{{ route('berita.show', $berita->slug) }}" class="font-semibold text-navy-600 hover:text-navy-800 transition flex items-center gap-1">
                Selengkapnya
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </a>
        </div>
    </div>
</article>
