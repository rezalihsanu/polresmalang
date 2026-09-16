@extends('layouts.app')

@section('title', 'Polres Malang — Portal Resmi Informasi & Pelayanan Kepolisian')

@section('content')
<!-- Hero Section & Slider -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6 pb-12">
    <x-hero-slider :slides="$heroBeritas" />
</section>

<!-- Quick Access Layanan Utama & Call Center -->
<section class="bg-gradient-to-b from-navy-900 to-navy-800 text-white py-12 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-gold-500/10 via-transparent to-transparent"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-10">
            <span class="badge-gold mb-2">Layanan Utama Kepolisian</span>
            <h2 class="text-3xl font-extrabold text-white">Akses Cepat Pelayanan Publik</h2>
            <p class="text-slate-300 text-sm mt-2">Dapatkan kemudahan pengurusan SIM, SKCK, SPKT, hingga laporan pengaduan masyarakat online 24 jam.</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            <!-- Quick 1: SIM -->
            <a href="{{ route('layanan.index') }}" class="p-6 rounded-2xl bg-white/5 hover:bg-white/15 border border-white/10 backdrop-blur-md transition-all duration-300 group text-center hover:-translate-y-1">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-gold-400/20 text-gold-400 flex items-center justify-center text-3xl mb-4 group-hover:scale-110 group-hover:bg-gold-400 group-hover:text-navy-900 transition-all">
                    🆔
                </div>
                <h3 class="font-bold text-base text-white group-hover:text-gold-300 transition-colors">Pelayanan SIM</h3>
                <p class="text-xs text-slate-400 mt-1">SIM Baru, Perpanjangan & SIM Keliling</p>
            </a>

            <!-- Quick 2: SKCK -->
            <a href="{{ route('layanan.index') }}" class="p-6 rounded-2xl bg-white/5 hover:bg-white/15 border border-white/10 backdrop-blur-md transition-all duration-300 group text-center hover:-translate-y-1">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-blue-400/20 text-blue-400 flex items-center justify-center text-3xl mb-4 group-hover:scale-110 group-hover:bg-blue-400 group-hover:text-navy-900 transition-all">
                    📄
                </div>
                <h3 class="font-bold text-base text-white group-hover:text-gold-300 transition-colors">Penerbitan SKCK</h3>
                <p class="text-xs text-slate-400 mt-1">Syarat & Pendaftaran SKCK Online</p>
            </a>

            <!-- Quick 3: SPKT & Laporan -->
            <a href="{{ route('pengaduan.create') }}" class="p-6 rounded-2xl bg-white/5 hover:bg-white/15 border border-white/10 backdrop-blur-md transition-all duration-300 group text-center hover:-translate-y-1">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-red-400/20 text-red-400 flex items-center justify-center text-3xl mb-4 group-hover:scale-110 group-hover:bg-red-500 group-hover:text-white transition-all">
                    📢
                </div>
                <h3 class="font-bold text-base text-white group-hover:text-gold-300 transition-colors">Pengaduan Online</h3>
                <p class="text-xs text-slate-400 mt-1">Kirim laporan & keluhan online</p>
            </a>

            <!-- Quick 4: Super App Presisi -->
            <a href="https://presisi.polri.go.id/" target="_blank" class="p-6 rounded-2xl bg-white/5 hover:bg-white/15 border border-white/10 backdrop-blur-md transition-all duration-300 group text-center hover:-translate-y-1">
                <div class="w-14 h-14 mx-auto rounded-2xl bg-emerald-400/20 text-emerald-400 flex items-center justify-center text-3xl mb-4 group-hover:scale-110 group-hover:bg-emerald-400 group-hover:text-navy-900 transition-all">
                    📱
                </div>
                <h3 class="font-bold text-base text-white group-hover:text-gold-300 transition-colors">Super App Presisi</h3>
                <p class="text-xs text-slate-400 mt-1">Aplikasi resmi Polri iOS/Android</p>
            </a>
        </div>
    </div>
</section>

<!-- Sambutan Kapolresta -->
@if($kapolresta)
<section class="py-16 bg-slate-100/70 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-8 md:p-12 shadow-sm border border-slate-200/80 flex flex-col md:flex-row items-center gap-8 md:gap-12">
            <div class="w-48 h-56 md:w-64 md:h-72 rounded-2xl bg-navy-900 overflow-hidden flex-shrink-0 shadow-lg relative group">
                <img src="{{ $kapolresta->foto_url }}" alt="{{ $kapolresta->nama }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition-transform duration-500">
                <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-navy-900 to-transparent p-3 text-center">
                    <span class="text-xs font-bold text-gold-400">{{ $kapolresta->pangkat_korps }}</span>
                </div>
            </div>

            <div class="flex-1 text-center md:text-left">
                <div class="section-divider mx-auto md:mx-0"></div>
                <span class="text-xs font-bold uppercase tracking-widest text-navy-500">Kata Sambutan</span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-navy-900 mt-1 mb-2">{{ $kapolresta->jabatan }}</h2>
                <h3 class="text-lg font-bold text-gold-600 mb-4">{{ $kapolresta->nama }}</h3>

                <blockquote class="text-slate-600 italic text-sm md:text-base leading-relaxed mb-6 border-l-4 border-navy-500 pl-4 text-left">
                    "{{ $kapolresta->sambutan ?? 'Polres Malang berkomitmen memberikan pelayanan terbaik, tercepat, dan paling transparan bagi seluruh warga Kota Malang. Melalui sinergi bersama masyarakat dan inovasi digital, mari wujudkan Kota Malang yang aman, kondusif, dan presisi.' }}"
                </blockquote>

                <a href="{{ route('profil') }}" class="btn-primary text-xs px-5 py-2.5">
                    Lihat Profil & Struktur Organisasi
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Berita Terkini Grid -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <div class="section-divider"></div>
                <h2 class="section-title">Berita & Publikasi Terkini</h2>
                <p class="section-subtitle mb-0">Kumpulan kabar terbaru kegiatan kepolisian, pengungkapan kasus, dan himbauan kamtibmas.</p>
            </div>
            <a href="{{ route('berita.index') }}" class="btn-secondary text-xs px-5 py-2.5 w-fit">
                Lihat Semua Berita
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($latestBeritas as $berita)
                <x-card-berita :berita="$berita" />
            @empty
                <div class="col-span-full py-12 text-center text-slate-400">
                    Belum ada berita yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Layanan Publik Carousel / Grid -->
<section class="py-16 bg-white border-t border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <div class="section-divider mx-auto"></div>
            <h2 class="section-title">Layanan Kepolisian Terintegrasi</h2>
            <p class="section-subtitle">Pilih jenis pelayanan masyarakat untuk mengetahui syarat, prosedur, biaya, dan alur permohonan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($layanans as $layanan)
                <x-card-layanan :layanan="$layanan" />
            @endforeach
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('layanan.index') }}" class="btn-primary text-sm">
                Lihat Seluruh Layanan Publik
            </a>
        </div>
    </div>
</section>

<!-- Galeri & Dokumentasi Kegiatan -->
@if(count($kegiatans) > 0)
<section class="py-16 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10 gap-4">
            <div>
                <span class="badge-gold mb-2">Dokumentasi Lapangan</span>
                <h2 class="text-3xl font-extrabold text-white">Galeri Kegiatan Kepolisian</h2>
                <p class="text-slate-400 text-sm mt-1">Foto kegiatan bakti sosial, patroli presisi, dan pengamanan wilayah Malang Kota.</p>
            </div>
            <a href="{{ route('galeri.index') }}" class="btn-gold text-xs px-4 py-2.5 w-fit">
                Lihat Galeri Lengkap
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kegiatans as $kegiatan)
                <div class="group relative rounded-2xl overflow-hidden aspect-[4/3] bg-navy-800 shadow-lg border border-white/10">
                    <img src="{{ $kegiatan->cover_url }}" alt="{{ $kegiatan->judul }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-950 via-navy-900/40 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                    <div class="absolute bottom-0 inset-x-0 p-6 text-white">
                        <span class="text-xs text-gold-400 font-semibold mb-1 block">{{ $kegiatan->tanggal_kegiatan ? $kegiatan->tanggal_kegiatan->format('d M Y') : '' }}</span>
                        <h3 class="font-bold text-base leading-snug text-white group-hover:text-gold-300 transition-colors line-clamp-2">
                            <a href="{{ route('galeri.show', $kegiatan->slug) }}">
                                {{ $kegiatan->judul }}
                            </a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Call to Action Banner Pengaduan -->
<section class="py-16 bg-gradient-to-r from-navy-800 via-navy-700 to-navy-900 text-white relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8">
        <div class="max-w-2xl text-center lg:text-left">
            <span class="badge-gold mb-3 inline-block">Partisipasi Masyarakat</span>
            <h2 class="text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-3">Punya Laporan, Keluhan, atau Info Kamtibmas?</h2>
            <p class="text-slate-300 text-sm leading-relaxed">Sampaikan pengaduan Anda secara online melalui portal resmi Polres Malang. Setiap pengaduan akan mendapatkan Nomor Tiket untuk dilacak secara transparan.</p>
        </div>

        <div class="flex flex-wrap items-center gap-4">
            <a href="{{ route('pengaduan.create') }}" class="btn-gold text-sm px-6 py-3.5 shadow-xl hover:scale-105 transition-transform">
                Buat Laporan Pengaduan
            </a>
            <a href="{{ route('pengaduan.lacak') }}" class="btn-secondary text-sm px-6 py-3.5 !border-white !text-white hover:!bg-white hover:!text-navy-900">
                Lacak Status Tiket
            </a>
        </div>
    </div>
</section>
@endsection
