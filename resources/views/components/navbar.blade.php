<header class="sticky top-0 z-50 bg-navy-700 text-white shadow-xl" x-data="mobileMenu">
    <!-- Topbar Darurat & Medsos -->
    <div class="bg-navy-800 text-xs py-2 px-4 border-b border-navy-600/50">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center gap-2">
            <div class="flex items-center gap-6 text-slate-300">
                <span class="flex items-center gap-1.5 font-semibold text-gold-400">
                    <svg class="w-4 h-4 text-red-500 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1.01 1.01 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                    CALL CENTER POLRI: <a href="tel:110" class="hover:underline font-bold text-white">110</a> (Bebas Pulsa)
                </span>
                <span class="hidden sm:inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    Jl. Jaksa Agung Suprapto No.19, Klojen, Kota Malang
                </span>
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ route('pengaduan.lacak') }}" class="text-xs font-semibold text-gold-400 hover:text-white transition flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Lacak Pengaduan
                </a>
                <span class="text-navy-500">|</span>
                <a href="{{ route('login') }}" class="text-xs text-slate-300 hover:text-white transition flex items-center gap-1">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                    </svg>
                    Portal Admin
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">
        <!-- Logo & Title -->
        <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <div class="w-12 h-12 rounded-xl bg-navy-600/80 p-1 flex items-center justify-center border border-gold-500/30 group-hover:scale-105 transition-transform duration-200 shadow-md">
                <svg class="w-9 h-9 text-gold-400" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-5.45 9-12V5l-9-4zm0 2.18l7 3.12v4.7c0 4.54-3.13 8.78-7 9.88-3.87-1.1-7-5.34-7-9.88V6.3l7-3.12zM12 6a3.5 3.5 0 00-3.5 3.5c0 2.5 3.5 6.5 3.5 6.5s3.5-4 3.5-6.5A3.5 3.5 0 0012 6z"/>
                </svg>
            </div>
            <div>
                <span class="block text-xs font-bold uppercase tracking-widest text-gold-400">Kepolisian Negara Republik Indonesia</span>
                <span class="block text-lg sm:text-xl font-extrabold tracking-tight text-white group-hover:text-gold-300 transition-colors">Polres Malang</span>
            </div>
        </a>

        <!-- Desktop Menu Nav -->
        <nav class="hidden md:flex items-center gap-6">
            <a href="{{ route('home') }}" class="nav-link text-sm {{ request()->routeIs('home') ? 'nav-link-active' : '' }}">Beranda</a>
            <a href="{{ route('profil') }}" class="nav-link text-sm {{ request()->routeIs('profil') ? 'nav-link-active' : '' }}">Profil</a>
            <a href="{{ route('layanan.index') }}" class="nav-link text-sm {{ request()->routeIs('layanan.*') ? 'nav-link-active' : '' }}">Layanan Publik</a>
            <a href="{{ route('organisasi') }}" class="nav-link text-sm {{ request()->routeIs('organisasi') ? 'nav-link-active' : '' }}">Struktur</a>
            <a href="{{ route('berita.index') }}" class="nav-link text-sm {{ request()->routeIs('berita.*') ? 'nav-link-active' : '' }}">Berita</a>
            <a href="{{ route('dokumen.index') }}" class="nav-link text-sm {{ request()->routeIs('dokumen.*') ? 'nav-link-active' : '' }}">Dokumen PPID</a>
            <a href="{{ route('galeri.index') }}" class="nav-link text-sm {{ request()->routeIs('galeri.*') ? 'nav-link-active' : '' }}">Galeri</a>
            <a href="{{ route('kontak') }}" class="nav-link text-sm {{ request()->routeIs('kontak') ? 'nav-link-active' : '' }}">Kontak</a>

            <a href="{{ route('pengaduan.create') }}" class="btn-gold text-xs px-4 py-2 rounded-lg shadow-md hover:shadow-gold-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                </svg>
                Buat Pengaduan
            </a>
        </nav>

        <!-- Mobile Hamburger Button -->
        <button @click="toggle()" type="button" class="md:hidden p-2 rounded-lg text-slate-300 hover:text-white hover:bg-navy-600 focus:outline-none">
            <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Dropdown Menu -->
    <div x-show="open" x-collapse x-cloak class="md:hidden bg-navy-800 border-t border-navy-600 px-4 pt-3 pb-6 space-y-2">
        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('home') ? 'bg-navy-600 text-gold-400' : 'text-slate-200 hover:bg-navy-700' }}">Beranda</a>
        <a href="{{ route('profil') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('profil') ? 'bg-navy-600 text-gold-400' : 'text-slate-200 hover:bg-navy-700' }}">Profil & Sejarah</a>
        <a href="{{ route('layanan.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('layanan.*') ? 'bg-navy-600 text-gold-400' : 'text-slate-200 hover:bg-navy-700' }}">Layanan Publik</a>
        <a href="{{ route('organisasi') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('organisasi') ? 'bg-navy-600 text-gold-400' : 'text-slate-200 hover:bg-navy-700' }}">Struktur Organisasi</a>
        <a href="{{ route('berita.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('berita.*') ? 'bg-navy-600 text-gold-400' : 'text-slate-200 hover:bg-navy-700' }}">Berita & Informasi</a>
        <a href="{{ route('dokumen.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('dokumen.*') ? 'bg-navy-600 text-gold-400' : 'text-slate-200 hover:bg-navy-700' }}">Dokumen Publik PPID</a>
        <a href="{{ route('galeri.index') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('galeri.*') ? 'bg-navy-600 text-gold-400' : 'text-slate-200 hover:bg-navy-700' }}">Galeri Kegiatan</a>
        <a href="{{ route('kontak') }}" class="block px-3 py-2 rounded-lg text-sm font-semibold {{ request()->routeIs('kontak') ? 'bg-navy-600 text-gold-400' : 'text-slate-200 hover:bg-navy-700' }}">Kontak & Lokasi</a>

        <div class="pt-3 border-t border-navy-700">
            <a href="{{ route('pengaduan.create') }}" class="btn-gold w-full text-center text-sm py-2.5 justify-center">
                Form Pengaduan Masyarakat
            </a>
        </div>
    </div>
</header>
