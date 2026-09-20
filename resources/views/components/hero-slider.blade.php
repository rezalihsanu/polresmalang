@props(['slides' => []])

<div x-data="heroSlider"
     @mouseenter="stopAutoPlay()"
     @mouseleave="startAutoPlay()"
     class="relative overflow-hidden bg-navy-900"
     style="height: clamp(340px, 52vw, 540px);">

    @forelse($slides as $index => $slide)
        <div data-slide
             x-show="current === {{ $index }}"
             x-transition:enter="transition ease-out duration-600"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-400"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="absolute inset-0 w-full h-full">

            <!-- Background Image -->
            <div class="absolute inset-0 bg-navy-900 bg-cover bg-center"
                 style="background-image: url('{{ $slide->gambar_url }}');">
            </div>

            <!-- Dark Overlay — Tegas tapi tidak berlebihan -->
            <div class="absolute inset-0 bg-navy-900/65"></div>
            <!-- Bottom gradient untuk readability teks -->
            <div class="absolute inset-x-0 bottom-0 h-2/3 bg-gradient-to-t from-navy-900/90 to-transparent"></div>

            <!-- Content — Layout Editorial -->
            <div class="absolute inset-0 flex items-end">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pb-10 md:pb-14">
                    <div class="max-w-3xl">

                        <!-- Category Tag — Editorial style -->
                        @if($slide->kategori)
                            <div class="flex items-center gap-2 mb-3">
                                <span class="inline-block w-5 h-0.5 bg-gold-400"></span>
                                <span class="text-xs font-bold uppercase tracking-widest text-gold-400">
                                    {{ $slide->kategori->nama }}
                                </span>
                            </div>
                        @else
                            <div class="flex items-center gap-2 mb-3">
                                <span class="inline-block w-5 h-0.5 bg-gold-400"></span>
                                <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Berita Utama</span>
                            </div>
                        @endif

                        <!-- Headline -->
                        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-white leading-tight mb-3">
                            <a href="{{ route('berita.show', $slide->slug) }}"
                               class="hover:text-gold-300 transition-colors duration-150">
                                {{ $slide->judul }}
                            </a>
                        </h2>

                        <!-- Description — hanya desktop -->
                        @if($slide->ringkasan)
                            <p class="hidden sm:block text-sm text-slate-300 leading-relaxed mb-4 max-w-2xl line-clamp-2">
                                {{ $slide->ringkasan }}
                            </p>
                        @endif

                        <!-- Date & CTA -->
                        <div class="flex items-center gap-4 text-xs">
                            <span class="text-slate-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $slide->published_at ? $slide->published_at->format('d F Y') : date('d F Y') }}
                            </span>
                            <a href="{{ route('berita.show', $slide->slug) }}"
                               class="inline-flex items-center gap-1 font-semibold text-gold-400 hover:text-white transition-colors duration-150 group">
                                Baca Selengkapnya
                                <svg class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform duration-150"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @empty
        <!-- Fallback Default Hero -->
        <div class="absolute inset-0 flex items-end"
             style="background: linear-gradient(135deg, #071A33 0%, #0B2345 60%, #123B6D 100%);">
            <!-- Subtle diagonal pattern -->
            <div class="absolute inset-0 opacity-5"
                 style="background-image: repeating-linear-gradient(45deg, #F4C430 0px, #F4C430 1px, transparent 1px, transparent 50px);"></div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full pb-12 md:pb-16 relative z-10">
                <div class="max-w-2xl">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="inline-block w-5 h-0.5 bg-gold-400"></span>
                        <span class="text-xs font-bold uppercase tracking-widest text-gold-400">
                            Portal Resmi Kepolisian
                        </span>
                    </div>
                    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold text-white leading-tight mb-4">
                        Melayani, Melindungi &amp; Mengayomi Masyarakat
                    </h1>
                    <p class="text-slate-300 text-sm leading-relaxed mb-6 max-w-xl">
                        Website resmi Polres Malang — kanal informasi terpadu, layanan publik kepolisian, dan sarana transparansi pengaduan masyarakat Kota Malang.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('pengaduan.create') }}" class="btn-gold text-xs py-2 px-5">
                            Buat Pengaduan Online
                        </a>
                        <a href="{{ route('layanan.index') }}"
                           class="inline-flex items-center gap-2 px-5 py-2 text-xs font-semibold text-white
                                  border border-white/30 hover:border-white hover:bg-white/10 transition-colors rounded-sm">
                            Lihat Layanan Publik
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforelse

    <!-- Slide Controls — hanya jika ada lebih dari 1 slide -->
    @if(count($slides) > 1)
        <!-- Prev button -->
        <button @click="prev()" type="button"
                class="absolute left-4 top-1/2 -translate-y-1/2 w-8 h-8 bg-black/40 hover:bg-black/60
                       text-white flex items-center justify-center transition-colors duration-150 border border-white/10"
                aria-label="Slide sebelumnya">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
        </button>

        <!-- Next button -->
        <button @click="next()" type="button"
                class="absolute right-4 top-1/2 -translate-y-1/2 w-8 h-8 bg-black/40 hover:bg-black/60
                       text-white flex items-center justify-center transition-colors duration-150 border border-white/10"
                aria-label="Slide berikutnya">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </button>

        <!-- Slide Counter & Indicators — Bottom right, institutional style -->
        <div class="absolute bottom-5 right-5 flex items-center gap-3 z-10">
            <!-- Slide number -->
            <span class="text-xs text-slate-400 font-mono tabular-nums">
                <span x-text="current + 1" class="text-white font-semibold"></span> / {{ count($slides) }}
            </span>
            <!-- Dot indicators -->
            <div class="flex items-center gap-1.5">
                @foreach($slides as $index => $slide)
                    <button @click="goTo({{ $index }})" type="button"
                            :class="current === {{ $index }} ? 'w-6 bg-gold-400' : 'w-2 bg-white/30 hover:bg-white/60'"
                            class="h-1.5 transition-all duration-300 rounded-none"
                            aria-label="Slide {{ $index + 1 }}">
                    </button>
                @endforeach
            </div>
        </div>
    @endif

</div>
