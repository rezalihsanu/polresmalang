@props(['slides' => []])

<div x-data="heroSlider" @mouseenter="stopAutoPlay()" @mouseleave="startAutoPlay()" class="relative overflow-hidden rounded-3xl shadow-2xl bg-navy-900 aspect-[16/9] md:aspect-[21/9]">
    @forelse($slides as $index => $slide)
        <div data-slide
             x-show="current === {{ $index }}"
             x-transition:enter="transition ease-out duration-700"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-500"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full">

            <!-- Background Image or Gradient Placeholder -->
            <div class="absolute inset-0 bg-navy-900 bg-cover bg-center transition-transform duration-700"
                 style="background-image: url('{{ $slide->gambar_url }}');">
            </div>

            <!-- Dark Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-t from-navy-900 via-navy-900/60 to-transparent"></div>

            <!-- Content Card inside Hero -->
            <div class="absolute bottom-0 left-0 right-0 p-6 md:p-12 text-white max-w-4xl">
                @if($slide->kategori)
                    <span class="badge-gold mb-3 inline-block shadow-md">
                        {{ $slide->kategori->nama }}
                    </span>
                @endif
                <h2 class="text-2xl md:text-4xl font-extrabold text-white leading-tight mb-3 hover:text-gold-300 transition">
                    <a href="{{ route('berita.show', $slide->slug) }}">
                        {{ $slide->judul }}
                    </a>
                </h2>
                <p class="text-xs md:text-sm text-slate-300 line-clamp-2 mb-4 max-w-2xl hidden sm:block">
                    {{ $slide->ringkasan }}
                </p>
                <div class="flex items-center gap-4 text-xs text-slate-400">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $slide->published_at ? $slide->published_at->format('d M Y') : date('d M Y') }}
                    </span>
                    <a href="{{ route('berita.show', $slide->slug) }}" class="inline-flex items-center gap-1 font-semibold text-gold-400 hover:text-white transition">
                        Baca Selengkapnya
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <!-- Fallback Default Hero -->
        <div class="absolute inset-0 flex flex-col justify-end p-8 md:p-12 text-white bg-gradient-to-r from-navy-900 to-navy-700">
            <span class="badge-gold mb-3 w-fit">Polres Malang</span>
            <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-4">Melayani, Melindungi & Mengayomi Masyarakat</h2>
            <p class="text-slate-300 max-w-2xl mb-6">Website resmi Polres Malang — kanal informasi terpadu, layanan publik kepolisian, dan sarana transparansi pengaduan masyarakat.</p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('pengaduan.create') }}" class="btn-gold text-sm">Buat Pengaduan Online</a>
                <a href="{{ route('layanan.index') }}" class="btn-secondary text-sm !border-white !text-white hover:!bg-white hover:!text-navy-900">Lihat Layanan Publik</a>
            </div>
        </div>
    @endforelse

    <!-- Prev & Next Controls -->
    @if(count($slides) > 1)
        <button @click="prev()" type="button" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 hover:bg-black/70 text-white flex items-center justify-center backdrop-blur-sm transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
        </button>
        <button @click="next()" type="button" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 hover:bg-black/70 text-white flex items-center justify-center backdrop-blur-sm transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        </button>

        <!-- Slide Indicators -->
        <div class="absolute bottom-4 right-6 flex items-center gap-2 z-10">
            @foreach($slides as $index => $slide)
                <button @click="goTo({{ $index }})" type="button"
                        :class="current === {{ $index }} ? 'w-8 bg-gold-400' : 'w-2 bg-white/40 hover:bg-white/70'"
                        class="h-2 rounded-full transition-all duration-300"></button>
            @endforeach
        </div>
    @endif
</div>
