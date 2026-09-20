<header class="sticky top-0 z-50 bg-navy-800 text-white shadow-lg" x-data="mobileMenu">

    <!-- Top Information Bar -->
    <div class="bg-navy-900 border-b border-navy-700/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap justify-between items-center h-9 text-xs">

                <!-- Left: Emergency & Location -->
                <div class="flex items-center gap-0 text-slate-400 divide-x divide-navy-700">
                    <span class="flex items-center gap-1.5 pr-4 font-semibold text-white">
                        <svg class="w-3.5 h-3.5 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02L6.6 10.8z"/>
                        </svg>
                        CALL CENTER: <a href="tel:110" class="text-gold-400 font-bold ml-1 hover:text-white transition-colors">110</a>
                        <span class="text-slate-500 font-normal">(Bebas Pulsa)</span>
                    </span>
                    <span class="hidden sm:flex items-center gap-1.5 px-4 text-slate-400">
                        <svg class="w-3.5 h-3.5 text-gold-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Jl. Jaksa Agung Suprapto No.19, Klojen, Kota Malang
                    </span>
                </div>

                <!-- Right: Quick links -->
                <div class="flex items-center divide-x divide-navy-700">
                    <a href="{{ route('pengaduan.lacak') }}"
                       class="flex items-center gap-1 pr-4 text-gold-400 hover:text-white font-medium transition-colors duration-150">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Lacak Pengaduan
                    </a>
                    <a href="{{ route('login') }}"
                       class="flex items-center gap-1 pl-4 text-slate-400 hover:text-white transition-colors duration-150">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                        </svg>
                        Portal Admin
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div class="border-b border-gold-500/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">

                <!-- Logo & Institutional Identity -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group flex-shrink-0">
                    <!-- Shield/Crest Icon — Clean & Institutional -->
                    <div class="w-10 h-10 bg-navy-700 border border-gold-500/40 flex items-center justify-center flex-shrink-0
                                group-hover:border-gold-400 transition-colors duration-150">
                        <svg class="w-7 h-7 text-gold-400" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-5.45 9-12V5l-9-4zm0 2.18l7 3.12v4.7c0 4.54-3.13 8.78-7 9.88-3.87-1.1-7-5.34-7-9.88V6.3l7-3.12z"/>
                            <circle cx="12" cy="10" r="2.5" opacity="0.6"/>
                        </svg>
                    </div>
                    <div class="leading-tight">
                        <span class="block text-[10px] font-semibold uppercase tracking-widest text-gold-400/80">
                            Kepolisian Negara Republik Indonesia
                        </span>
                        <span class="block text-lg font-bold text-white tracking-tight group-hover:text-gold-300 transition-colors duration-150">
                            Polres Malang
                        </span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-1" aria-label="Navigasi Utama">
                    <a href="{{ route('home') }}"
                       class="nav-link px-3 py-5 {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">
                        Beranda
                    </a>
                    <a href="{{ route('profil') }}"
                       class="nav-link px-3 py-5 {{ request()->routeIs('profil') ? 'nav-link-active' : '' }}">
                        Profil
                    </a>
                    <a href="{{ route('layanan.index') }}"
                       class="nav-link px-3 py-5 {{ request()->routeIs('layanan.*') ? 'nav-link-active' : '' }}">
                        Layanan Publik
                    </a>
                    <a href="{{ route('organisasi') }}"
                       class="nav-link px-3 py-5 {{ request()->routeIs('organisasi') ? 'nav-link-active' : '' }}">
                        Struktur
                    </a>
                    <a href="{{ route('berita.index') }}"
                       class="nav-link px-3 py-5 {{ request()->routeIs('berita.*') ? 'nav-link-active' : '' }}">
                        Berita
                    </a>
                    <a href="{{ route('dokumen.index') }}"
                       class="nav-link px-3 py-5 {{ request()->routeIs('dokumen.*') ? 'nav-link-active' : '' }}">
                        PPID
                    </a>
                    <a href="{{ route('galeri.index') }}"
                       class="nav-link px-3 py-5 {{ request()->routeIs('galeri.*') ? 'nav-link-active' : '' }}">
                        Galeri
                    </a>
                    <a href="{{ route('kontak') }}"
                       class="nav-link px-3 py-5 {{ request()->routeIs('kontak') ? 'nav-link-active' : '' }}">
                        Kontak
                    </a>

                    <!-- CTA Button -->
                    <a href="{{ route('pengaduan.create') }}"
                       class="ml-3 inline-flex items-center gap-1.5 px-4 py-2 bg-gold-400 text-navy-900
                              font-bold text-xs border border-gold-500 hover:bg-gold-500 transition-colors
                              duration-150 uppercase tracking-wide rounded-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Buat Pengaduan
                    </a>
                </nav>

                <!-- Mobile Hamburger -->
                <button @click="toggle()" type="button"
                        class="md:hidden p-2 text-slate-300 hover:text-white hover:bg-navy-700 transition-colors focus:outline-none"
                        aria-label="Buka menu navigasi">
                    <svg x-show="!open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

            </div>
        </div>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div x-show="open" x-collapse x-cloak
         class="md:hidden bg-navy-900 border-t border-navy-700">
        <nav class="max-w-7xl mx-auto px-4 py-3 space-y-0.5" aria-label="Navigasi Mobile">
            <a href="{{ route('home') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium border-l-2 transition-colors duration-150
                      {{ request()->routeIs('home') ? 'border-gold-400 text-gold-400 bg-navy-800' : 'border-transparent text-slate-300 hover:text-white hover:bg-navy-800 hover:border-navy-500' }}">
                Beranda
            </a>
            <a href="{{ route('profil') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium border-l-2 transition-colors duration-150
                      {{ request()->routeIs('profil') ? 'border-gold-400 text-gold-400 bg-navy-800' : 'border-transparent text-slate-300 hover:text-white hover:bg-navy-800 hover:border-navy-500' }}">
                Profil & Sejarah
            </a>
            <a href="{{ route('layanan.index') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium border-l-2 transition-colors duration-150
                      {{ request()->routeIs('layanan.*') ? 'border-gold-400 text-gold-400 bg-navy-800' : 'border-transparent text-slate-300 hover:text-white hover:bg-navy-800 hover:border-navy-500' }}">
                Layanan Publik
            </a>
            <a href="{{ route('organisasi') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium border-l-2 transition-colors duration-150
                      {{ request()->routeIs('organisasi') ? 'border-gold-400 text-gold-400 bg-navy-800' : 'border-transparent text-slate-300 hover:text-white hover:bg-navy-800 hover:border-navy-500' }}">
                Struktur Organisasi
            </a>
            <a href="{{ route('berita.index') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium border-l-2 transition-colors duration-150
                      {{ request()->routeIs('berita.*') ? 'border-gold-400 text-gold-400 bg-navy-800' : 'border-transparent text-slate-300 hover:text-white hover:bg-navy-800 hover:border-navy-500' }}">
                Berita & Informasi
            </a>
            <a href="{{ route('dokumen.index') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium border-l-2 transition-colors duration-150
                      {{ request()->routeIs('dokumen.*') ? 'border-gold-400 text-gold-400 bg-navy-800' : 'border-transparent text-slate-300 hover:text-white hover:bg-navy-800 hover:border-navy-500' }}">
                Dokumen PPID
            </a>
            <a href="{{ route('galeri.index') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium border-l-2 transition-colors duration-150
                      {{ request()->routeIs('galeri.*') ? 'border-gold-400 text-gold-400 bg-navy-800' : 'border-transparent text-slate-300 hover:text-white hover:bg-navy-800 hover:border-navy-500' }}">
                Galeri Kegiatan
            </a>
            <a href="{{ route('kontak') }}"
               class="flex items-center px-3 py-2.5 text-sm font-medium border-l-2 transition-colors duration-150
                      {{ request()->routeIs('kontak') ? 'border-gold-400 text-gold-400 bg-navy-800' : 'border-transparent text-slate-300 hover:text-white hover:bg-navy-800 hover:border-navy-500' }}">
                Kontak & Lokasi
            </a>

            <div class="pt-3 pb-2 border-t border-navy-700">
                <a href="{{ route('pengaduan.create') }}"
                   class="flex items-center justify-center gap-2 w-full px-4 py-2.5 bg-gold-400 text-navy-900
                          font-bold text-sm border border-gold-500 hover:bg-gold-500 transition-colors
                          rounded-sm uppercase tracking-wide">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Buat Pengaduan Masyarakat
                </a>
            </div>
        </nav>
    </div>

</header>
