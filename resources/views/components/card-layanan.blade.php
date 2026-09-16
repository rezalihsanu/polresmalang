@props(['layanan'])

<div class="card-hover p-6 bg-white rounded-2xl border border-slate-100 shadow-sm hover:border-gold-400/50 flex flex-col h-full group">
    <div class="w-12 h-12 rounded-xl bg-navy-50 text-navy-600 flex items-center justify-center mb-4 group-hover:bg-navy-500 group-hover:text-white transition-colors duration-300 shadow-sm">
        @if($layanan->icon)
            <span class="text-2xl">{{ $layanan->icon }}</span>
        @else
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
        @endif
    </div>

    <h3 class="text-lg font-bold text-navy-800 mb-2 group-hover:text-navy-500 transition-colors">
        <a href="{{ route('layanan.show', $layanan->slug) }}">
            {{ $layanan->nama }}
        </a>
    </h3>

    <p class="text-xs text-slate-500 line-clamp-3 mb-4 flex-1 leading-relaxed">
        {{ Str::limit(strip_tags($layanan->deskripsi), 120) }}
    </p>

    <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
        <span class="text-[11px] font-semibold text-emerald-600 bg-emerald-50 px-2.5 py-1 rounded-md">
            {{ $layanan->biaya ?? 'Gratis / Sesuai PNBP' }}
        </span>
        <a href="{{ route('layanan.show', $layanan->slug) }}" class="text-xs font-bold text-navy-600 hover:text-navy-800 transition flex items-center gap-1">
            Detail Layanan
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </a>
    </div>
</div>
