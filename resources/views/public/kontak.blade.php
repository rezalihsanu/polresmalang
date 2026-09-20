@extends('layouts.app')

@section('title', 'Kontak & Lokasi Markas Komando — Polres Malang')
@section('meta_description', 'Alamat resmi, nomor telepon, call center darurat 110, dan peta lokasi Markas Komando Kepolisian Resor Malang.')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">Kontak</span>
        </nav>
        <span class="page-header-eyebrow">Hubungi Instansi</span>
        <h1 class="page-header-title">Kontak &amp; Alamat Markas Komando</h1>
        <p class="text-slate-300 text-xs sm:text-sm mt-2 max-w-2xl leading-relaxed">
            Akses informasi komunikasi resmi, layanan darurat 24 jam, serta lokasi kantor Kepolisian Resor Malang.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Kolom Kiri: Kontak Resmi -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Emergency Call Center 110 Card -->
            <div class="bg-navy-900 text-white p-6 border-2 border-gold-400">
                <div class="flex items-center gap-2 mb-2">
                    <span class="w-2.5 h-2.5 bg-red-500 rounded-full animate-ping"></span>
                    <span class="text-[11px] font-bold uppercase tracking-widest text-gold-400">Layanan Darurat Bebas Pulsa</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-bold font-mono tracking-tight text-white mb-2">
                    CALL CENTER 110
                </h2>
                <p class="text-xs text-slate-300 leading-relaxed mb-4">
                    Hubungi 110 untuk situasi kedaruratan, kecelakaan lalu lintas, tindak kejahatan, dan gangguan kamtibmas 24 Jam Nonstop.
                </p>
                <a href="tel:110" class="btn-gold w-full justify-center text-xs py-2.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1.01 1.01 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    Panggil 110 Sekarang
                </a>
            </div>

            <!-- Detail Kontak Formal -->
            <div class="bg-white border border-slate-200 p-6 space-y-4">
                <h3 class="font-bold text-navy-900 text-sm pb-3 border-b border-slate-100 flex items-center gap-2">
                    <span class="w-1 h-4 bg-navy-700 inline-block"></span>
                    Informasi Markas Komando
                </h3>

                <!-- Alamat -->
                <div class="text-xs">
                    <span class="text-slate-400 font-semibold uppercase tracking-wider text-[10px] block mb-1">Alamat Kantor</span>
                    <p class="font-medium text-slate-800 leading-relaxed">
                        {{ $settings['alamat'] ?? 'Jl. Jaksa Agung Suprapto No.19, Klojen, Kota Malang, Jawa Timur 65111' }}
                    </p>
                </div>

                <!-- Telepon -->
                <div class="text-xs pt-3 border-t border-slate-100">
                    <span class="text-slate-400 font-semibold uppercase tracking-wider text-[10px] block mb-1">Telepon Markas / SPKT</span>
                    <p class="font-bold text-navy-800 font-mono text-sm">
                        {{ $settings['telepon'] ?? '(0341) 362044' }}
                    </p>
                </div>

                <!-- Email -->
                <div class="text-xs pt-3 border-t border-slate-100">
                    <span class="text-slate-400 font-semibold uppercase tracking-wider text-[10px] block mb-1">Email Resmi</span>
                    <p class="font-medium text-navy-700">
                        {{ $settings['email_kontak'] ?? 'polrestamalang@gmail.com' }}
                    </p>
                </div>

                <!-- Jam Pelayanan -->
                <div class="text-xs pt-3 border-t border-slate-100">
                    <span class="text-slate-400 font-semibold uppercase tracking-wider text-[10px] block mb-1">Jam Pelayanan Kantor</span>
                    <p class="font-medium text-slate-700">
                        {{ $settings['jam_pelayanan'] ?? 'Senin – Jumat: 08.00 – 15.00 WIB' }}
                    </p>
                    <span class="text-[11px] text-emerald-700 font-bold block mt-1">* SPKT dan Pengaduan Buka 24 Jam</span>
                </div>
            </div>

            <!-- Media Sosial Resmi -->
            <div class="bg-white border border-slate-200 p-6">
                <h3 class="font-bold text-navy-900 text-sm pb-3 border-b border-slate-100 mb-3">
                    Saluran Media Sosial Resmi
                </h3>
                <div class="grid grid-cols-2 gap-2 text-xs">
                    @if(!empty($settings['instagram']))
                    <a href="{{ $settings['instagram'] }}" target="_blank" rel="noopener"
                       class="p-2.5 border border-slate-200 hover:border-navy-400 hover:bg-slate-50 transition-colors flex items-center gap-2">
                        <span class="font-semibold text-slate-700">Instagram</span>
                    </a>
                    @endif

                    @if(!empty($settings['facebook']))
                    <a href="{{ $settings['facebook'] }}" target="_blank" rel="noopener"
                       class="p-2.5 border border-slate-200 hover:border-navy-400 hover:bg-slate-50 transition-colors flex items-center gap-2">
                        <span class="font-semibold text-slate-700">Facebook</span>
                    </a>
                    @endif

                    @if(!empty($settings['twitter']))
                    <a href="{{ $settings['twitter'] }}" target="_blank" rel="noopener"
                       class="p-2.5 border border-slate-200 hover:border-navy-400 hover:bg-slate-50 transition-colors flex items-center gap-2">
                        <span class="font-semibold text-slate-700">Twitter / X</span>
                    </a>
                    @endif

                    @if(!empty($settings['youtube']))
                    <a href="{{ $settings['youtube'] }}" target="_blank" rel="noopener"
                       class="p-2.5 border border-slate-200 hover:border-navy-400 hover:bg-slate-50 transition-colors flex items-center gap-2">
                        <span class="font-semibold text-slate-700">YouTube</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Kolom Kanan: Peta Lokasi & Form Pengaduan Link -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Peta Lokasi Map Box -->
            <div class="bg-white border border-slate-200 p-6">
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="w-1 h-4 bg-gold-400 inline-block"></span>
                        <h2 class="font-bold text-navy-900 text-sm">Peta Lokasi Markas Komando Polres Malang</h2>
                    </div>
                    <span class="text-xs text-slate-400">Google Maps</span>
                </div>

                <div class="border border-slate-200 overflow-hidden aspect-[16/10] bg-slate-100">
                    @if(!empty($settings['google_maps_embed']))
                        <iframe src="{{ $settings['google_maps_embed'] }}"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                                title="Peta Lokasi Kantor Polres Malang"></iframe>
                    @else
                        <div class="flex flex-col items-center justify-center h-full text-slate-400 text-xs p-6 text-center">
                            <svg class="w-8 h-8 mb-2 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                            <span class="font-medium text-slate-600">Jl. Jaksa Agung Suprapto No.19, Klojen, Kota Malang</span>
                            <span class="text-slate-400 mt-1">Jawa Timur 65111</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Box Saluran Pengaduan Cepat -->
            <div class="bg-navy-800 text-white p-6 sm:p-8 border border-navy-700">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6">
                    <div>
                        <span class="text-xs font-bold uppercase tracking-widest text-gold-400 block mb-1">
                            Layanan Aspirasi &amp; Pengaduan
                        </span>
                        <h3 class="text-lg sm:text-xl font-bold text-white mb-2">
                            Ingin Menyampaikan Pengaduan atau Keluhan?
                        </h3>
                        <p class="text-xs text-slate-300 leading-relaxed max-w-xl">
                            Untuk penyampaian laporan pengaduan resmi, gunakan form online agar Anda memperoleh nomor tiket verifikasi yang dapat dilacak secara transparan.
                        </p>
                    </div>
                    <a href="{{ route('pengaduan.create') }}" class="btn-gold text-xs px-6 py-3 flex-shrink-0 whitespace-nowrap">
                        Buat Pengaduan &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
