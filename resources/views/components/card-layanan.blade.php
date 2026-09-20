@props(['layanan'])

<div class="group flex flex-col h-full bg-white border border-slate-200 overflow-hidden
            hover:border-navy-400 hover:shadow-md transition-all duration-200">

    {{-- Top accent bar — muncul saat hover --}}
    <div class="h-0.5 bg-transparent group-hover:bg-gold-400 transition-colors duration-200"></div>

    <div class="flex flex-col flex-1 p-5">

        {{-- Icon --}}
        <div class="w-10 h-10 bg-navy-50 border border-navy-100 text-navy-600 flex items-center justify-center mb-4
                    group-hover:bg-navy-800 group-hover:border-navy-800 group-hover:text-gold-400
                    transition-colors duration-200 flex-shrink-0">
            @if($layanan->icon)
                <span class="text-xl leading-none">{{ $layanan->icon }}</span>
            @else
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            @endif
        </div>

        {{-- Name --}}
        <h3 class="text-sm font-bold text-navy-800 mb-2 leading-snug
                   group-hover:text-navy-600 transition-colors duration-150">
            <a href="{{ route('layanan.show', $layanan->slug) }}" class="focus:outline-none">
                {{ $layanan->nama }}
            </a>
        </h3>

        {{-- Description --}}
        <p class="text-xs text-slate-500 line-clamp-3 mb-4 flex-1 leading-relaxed">
            {{ Str::limit(strip_tags($layanan->deskripsi), 120) }}
        </p>

        {{-- Footer --}}
        <div class="flex items-center justify-between pt-3 border-t border-slate-100 mt-auto">
            <span class="text-[11px] font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2 py-0.5">
                {{ $layanan->biaya ?? 'Gratis / Sesuai PNBP' }}
            </span>
            <a href="{{ route('layanan.show', $layanan->slug) }}"
               class="text-xs font-semibold text-navy-600 hover:text-navy-900 transition-colors duration-150
                      flex items-center gap-1 group/link">
                Detail
                <svg class="w-3 h-3 group-hover/link:translate-x-0.5 transition-transform duration-150"
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

    </div>
</div>
