@extends('layouts.app')

@section('title', 'Polres Malang — Portal Resmi Informasi & Pelayanan Kepolisian')
@section('meta_description', 'Portal resmi Polres Malang. Akses layanan publik kepolisian, informasi berita terkini, pengaduan masyarakat, dan informasi PPID Polres Malang Kota.')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section aria-label="Berita Utama">
    <x-hero-slider :slides="$heroBeritas" />
</section>

{{-- ===== QUICK ACCESS LAYANAN ===== --}}
<section class="bg-navy-800 text-white border-b border-navy-700" aria-label="Akses Cepat Layanan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section header — compact strip -->
        <div class="flex items-center justify-between py-4 border-b border-navy-700/60">
            <div class="flex items-center gap-3">
                <span class="inline-block w-1 h-5 bg-gold-400"></span>
                <h2 class="text-sm font-bold uppercase tracking-widest text-white">Akses Cepat Layanan</h2>
            </div>
            <a href="{{ route('layanan.index') }}"
               class="text-xs text-gold-400 hover:text-white transition-colors font-medium flex items-center gap-1">
                Selengkapnya
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <!-- Service Grid — Institutional -->
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 divide-x divide-y md:divide-y-0 divide-navy-700/60">

            <!-- Call Center 110 -->
            <a href="tel:110"
               class="group flex flex-col items-center gap-2.5 py-6 px-3 text-center
                      hover:bg-navy-700 transition-colors duration-150 border-b md:border-b-0 border-navy-700/60">
                <div class="w-10 h-10 bg-red-700/20 border border-red-600/30 flex items-center justify-center
                            group-hover:bg-red-700 group-hover:border-red-600 transition-colors duration-150">
                    <svg class="w-5 h-5 text-red-400 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1.01 1.01 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-white leading-tight">110</p>
                    <p class="text-[11px] text-slate-400 mt-0.5 leading-tight">Call Center Darurat</p>
                </div>
            </a>

            <!-- Pelayanan SIM -->
            <a href="{{ route('layanan.index') }}"
               class="group flex flex-col items-center gap-2.5 py-6 px-3 text-center
                      hover:bg-navy-700 transition-colors duration-150">
                <div class="w-10 h-10 bg-navy-700 border border-navy-600 flex items-center justify-center
                            group-hover:bg-gold-400 group-hover:border-gold-400 transition-colors duration-150">
                    <svg class="w-5 h-5 text-gold-400 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-white leading-tight">Pelayanan SIM</p>
                    <p class="text-[11px] text-slate-400 mt-0.5 leading-tight">Baru & Perpanjangan</p>
                </div>
            </a>

            <!-- SKCK -->
            <a href="{{ route('layanan.index') }}"
               class="group flex flex-col items-center gap-2.5 py-6 px-3 text-center
                      hover:bg-navy-700 transition-colors duration-150">
                <div class="w-10 h-10 bg-navy-700 border border-navy-600 flex items-center justify-center
                            group-hover:bg-gold-400 group-hover:border-gold-400 transition-colors duration-150">
                    <svg class="w-5 h-5 text-gold-400 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-white leading-tight">Penerbitan SKCK</p>
                    <p class="text-[11px] text-slate-400 mt-0.5 leading-tight">Online & Offline</p>
                </div>
            </a>

            <!-- Pengaduan Online -->
            <a href="{{ route('pengaduan.create') }}"
               class="group flex flex-col items-center gap-2.5 py-6 px-3 text-center
                      hover:bg-navy-700 transition-colors duration-150">
                <div class="w-10 h-10 bg-navy-700 border border-navy-600 flex items-center justify-center
                            group-hover:bg-gold-400 group-hover:border-gold-400 transition-colors duration-150">
                    <svg class="w-5 h-5 text-gold-400 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-white leading-tight">Pengaduan</p>
                    <p class="text-[11px] text-slate-400 mt-0.5 leading-tight">Laporan Online</p>
                </div>
            </a>

            <!-- Lacak Pengaduan -->
            <a href="{{ route('pengaduan.lacak') }}"
               class="group flex flex-col items-center gap-2.5 py-6 px-3 text-center
                      hover:bg-navy-700 transition-colors duration-150">
                <div class="w-10 h-10 bg-navy-700 border border-navy-600 flex items-center justify-center
                            group-hover:bg-gold-400 group-hover:border-gold-400 transition-colors duration-150">
                    <svg class="w-5 h-5 text-gold-400 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-white leading-tight">Lacak Pengaduan</p>
                    <p class="text-[11px] text-slate-400 mt-0.5 leading-tight">Status Tiket</p>
                </div>
            </a>

            <!-- Super App Presisi -->
            <a href="https://presisi.polri.go.id/" target="_blank" rel="noopener"
               class="group flex flex-col items-center gap-2.5 py-6 px-3 text-center
                      hover:bg-navy-700 transition-colors duration-150">
                <div class="w-10 h-10 bg-navy-700 border border-navy-600 flex items-center justify-center
                            group-hover:bg-gold-400 group-hover:border-gold-400 transition-colors duration-150">
                    <svg class="w-5 h-5 text-gold-400 group-hover:text-navy-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div>
                    <p class="font-bold text-sm text-white leading-tight">App Presisi</p>
                    <p class="text-[11px] text-slate-400 mt-0.5 leading-tight">iOS / Android</p>
                </div>
            </a>

        </div>
    </div>
</section>

{{-- ===== SAMBUTAN KAPOLRESTA ===== --}}
@if($kapolresta)
<section class="py-14 bg-white border-b border-slate-200" aria-label="Sambutan Pimpinan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-10 md:gap-14 items-start">

            <!-- Foto Pimpinan -->
            <div class="flex-shrink-0 mx-auto md:mx-0">
                <div class="relative w-44 md:w-52">
                    <!-- Gold accent frame -->
                    <div class="absolute -top-2 -left-2 w-full h-full border-2 border-gold-400/40"></div>
                    <div class="relative overflow-hidden bg-navy-900 aspect-[3/4]">
                        <img src="{{ $kapolresta->foto_url }}"
                             alt="{{ $kapolresta->nama }}"
                             class="w-full h-full object-cover object-top">
                        <!-- Rank overlay -->
                        <div class="absolute bottom-0 inset-x-0 bg-navy-900/85 py-2 px-3 text-center">
                            <span class="text-[10px] font-bold text-gold-400 uppercase tracking-wider">
                                {{ $kapolresta->pangkat_korps }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Konten Sambutan -->
            <div class="flex-1 min-w-0">
                <div class="section-divider"></div>
                <span class="text-xs font-bold uppercase tracking-widest text-navy-500 mb-1 block">Kata Sambutan</span>
                <h2 class="text-xl md:text-2xl font-bold text-navy-800 mb-1">
                    {{ $kapolresta->jabatan }}
                </h2>
                <h3 class="text-base font-semibold text-gold-600 mb-5">{{ $kapolresta->nama }}</h3>

                <blockquote class="border-l-4 border-navy-700 pl-4 py-1 mb-6">
                    <p class="text-slate-600 italic text-sm leading-relaxed">
                        "{{ $kapolresta->sambutan ?? 'Polres Malang berkomitmen memberikan pelayanan terbaik, tercepat, dan paling transparan bagi seluruh warga Kota Malang. Melalui sinergi bersama masyarakat dan inovasi digital, mari wujudkan Kota Malang yang aman, kondusif, dan presisi.' }}"
                    </p>
                </blockquote>

                <a href="{{ route('profil') }}" class="btn-primary text-xs">
                    Lihat Profil & Struktur Organisasi
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>

        </div>
    </div>
</section>
@endif

{{-- ===== BERITA TERKINI ===== --}}
<section class="py-14 bg-[#F5F7FA] border-b border-slate-200" aria-label="Berita Terkini">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
            <div>
                <div class="section-divider"></div>
                <h2 class="section-title">Berita &amp; Publikasi Terkini</h2>
                <p class="section-subtitle mb-0">Kabar terbaru kegiatan kepolisian, pengungkapan kasus, dan himbauan kamtibmas.</p>
            </div>
            <a href="{{ route('berita.index') }}" class="btn-secondary text-xs py-2 px-4 flex-shrink-0">
                Lihat Semua Berita
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($latestBeritas as $berita)
                <x-card-berita :berita="$berita" />
            @empty
                <div class="col-span-full py-16 text-center">
                    <svg class="w-10 h-10 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <p class="text-slate-400 text-sm">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== LAYANAN PUBLIK ===== --}}
<section class="py-14 bg-white border-b border-slate-200" aria-label="Layanan Publik">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
            <div>
                <div class="section-divider"></div>
                <h2 class="section-title">Layanan Kepolisian Terintegrasi</h2>
                <p class="section-subtitle mb-0">Pilih jenis pelayanan untuk mengetahui syarat, prosedur, biaya, dan alur permohonan.</p>
            </div>
            <a href="{{ route('layanan.index') }}" class="btn-secondary text-xs py-2 px-4 flex-shrink-0">
                Semua Layanan
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($layanans as $layanan)
                <x-card-layanan :layanan="$layanan" />
            @endforeach
        </div>
    </div>
</section>

{{-- ===== GALERI KEGIATAN ===== --}}
@if(count($kegiatans) > 0)
<section class="py-14 bg-navy-800 text-white" aria-label="Galeri Kegiatan">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
            <div>
                <div class="section-divider"></div>
                <h2 class="text-2xl font-bold text-white">Galeri Kegiatan Kepolisian</h2>
                <p class="text-slate-400 text-sm mt-1 leading-relaxed">Dokumentasi bakti sosial, patroli presisi, dan pengamanan wilayah Malang Kota.</p>
            </div>
            <a href="{{ route('galeri.index') }}"
               class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold text-gold-400
                      border border-gold-500/40 hover:border-gold-400 hover:text-white transition-colors
                      flex-shrink-0 rounded-sm">
                Lihat Galeri Lengkap
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($kegiatans as $kegiatan)
                <div class="group relative overflow-hidden bg-navy-900 border border-navy-700"
                     style="aspect-ratio: 4/3;">
                    <img src="{{ $kegiatan->cover_url }}"
                         alt="{{ $kegiatan->judul }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy">
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-navy-900/40 group-hover:bg-navy-900/60 transition-colors duration-300"></div>
                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-navy-950/95 to-transparent p-5">
                        <span class="text-xs text-gold-400 font-semibold block mb-1">
                            {{ $kegiatan->tanggal_kegiatan ? $kegiatan->tanggal_kegiatan->format('d M Y') : '' }}
                        </span>
                        <h3 class="font-bold text-sm text-white leading-snug line-clamp-2">
                            <a href="{{ route('galeri.show', $kegiatan->slug) }}"
                               class="hover:text-gold-300 transition-colors duration-150">
                                {{ $kegiatan->judul }}
                            </a>
                        </h3>
                    </div>
                    <!-- View indicator -->
                    <div class="absolute top-3 right-3 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                        <span class="bg-black/50 text-white text-xs px-2 py-1 flex items-center gap-1">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Lihat
                        </span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
@endif

{{-- ===== CTA PENGADUAN ===== --}}
<section class="bg-navy-900 text-white border-t border-navy-700" aria-label="Call to Action Pengaduan">
    <!-- Gold accent bar top -->
    <div class="h-1 bg-gold-400"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-8">

            <!-- Left content -->
            <div class="max-w-2xl text-center lg:text-left">
                <div class="flex items-center gap-2 mb-3 justify-center lg:justify-start">
                    <span class="inline-block w-5 h-0.5 bg-gold-400"></span>
                    <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Partisipasi Masyarakat</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-white leading-tight mb-3">
                    Punya Laporan, Keluhan, atau Informasi Kamtibmas?
                </h2>
                <p class="text-slate-400 text-sm leading-relaxed">
                    Sampaikan pengaduan Anda secara online melalui portal resmi Polres Malang. Setiap pengaduan akan mendapatkan Nomor Tiket untuk dilacak secara transparan dan akuntabel.
                </p>
            </div>

            <!-- Right CTA -->
            <div class="flex flex-col sm:flex-row items-center gap-3 flex-shrink-0">
                <a href="{{ route('pengaduan.create') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-gold-400 text-navy-900 font-bold
                          text-sm border border-gold-500 hover:bg-gold-500 transition-colors rounded-sm
                          uppercase tracking-wide w-full sm:w-auto justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Buat Laporan Pengaduan
                </a>
                <a href="{{ route('pengaduan.lacak') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 text-white font-semibold
                          text-sm border border-slate-600 hover:border-white hover:bg-white/10
                          transition-colors rounded-sm w-full sm:w-auto justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Lacak Status Tiket
                </a>
            </div>

        </div>
    </div>
</section>

@endsection
