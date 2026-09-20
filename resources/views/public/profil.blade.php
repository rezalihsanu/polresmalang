@extends('layouts.app')

@section('title', 'Profil Instansi, Sejarah & Visi Misi — Polres Malang')
@section('meta_description', 'Profil resmi Polres Malang meliputi sejarah, visi misi, wilayah hukum, dan informasi pimpinan Kepolisian Resor Kota Malang.')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">Profil</span>
        </nav>
        <span class="page-header-eyebrow">Tentang Polres Malang</span>
        <h1 class="page-header-title">Profil &amp; Visi Misi Instansi</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

        {{-- Main Content --}}
        <div class="lg:col-span-2 space-y-8">

            {{-- Visi & Misi --}}
            <section class="bg-white border border-slate-200">
                <div class="border-b border-slate-200 px-6 py-4 flex items-center gap-3">
                    <span class="inline-block w-1 h-5 bg-gold-400"></span>
                    <h2 class="text-base font-bold text-navy-800 uppercase tracking-wide">Visi &amp; Misi Polres Malang</h2>
                </div>
                <div class="p-6">
                    {{-- Visi --}}
                    <div class="mb-7 border-l-4 border-navy-700 pl-5 py-1 bg-navy-50/50">
                        <h3 class="font-bold text-navy-800 text-sm mb-2 uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Visi Utama
                        </h3>
                        <p class="text-slate-700 italic text-sm leading-relaxed">
                            "Terwujudnya pelayanan keamanan dan ketertiban masyarakat yang prima, tegaknya hukum serta terbinanya keamanan dalam negeri yang mantap di wilayah hukum Polres Malang dengan menjunjung tinggi Hak Asasi Manusia (HAM) serta berlandaskan nilai-nilai PRESISI."
                        </p>
                    </div>

                    {{-- Misi --}}
                    <div>
                        <h3 class="font-bold text-navy-800 text-sm mb-4 uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                            Misi Strategis
                        </h3>
                        <ol class="space-y-3">
                            @foreach([
                                'Mewujudkan pelayanan kepolisian yang responsif, berkualitas, bebas dari pungutan liar, dan berbasis teknologi informasi terpadu.',
                                'Memelihara keamanan dan ketertiban masyarakat (Kamtibmas) di wilayah Kota Malang secara preventif dan preemtif melalui Program Jogo Malang Presisi.',
                                'Penegakan hukum yang profesional, akuntabel, proporsional, dan menjunjung tinggi transparansi demi tercapainya kepastian hukum.',
                                'Meningkatkan sinergitas kemitraan bersama TNI, Pemerintah Kota Malang, civitas akademika, dan seluruh elemen masyarakat.',
                            ] as $i => $misi)
                                <li class="flex items-start gap-3 text-sm text-slate-700">
                                    <span class="flex-shrink-0 w-6 h-6 bg-navy-800 text-gold-400 font-bold text-xs flex items-center justify-center mt-0.5">
                                        {{ $i + 1 }}
                                    </span>
                                    <span class="leading-relaxed">{{ $misi }}</span>
                                </li>
                            @endforeach
                        </ol>
                    </div>
                </div>
            </section>

            {{-- Sejarah Singkat --}}
            <section class="bg-white border border-slate-200">
                <div class="border-b border-slate-200 px-6 py-4 flex items-center gap-3">
                    <span class="inline-block w-1 h-5 bg-gold-400"></span>
                    <h2 class="text-base font-bold text-navy-800 uppercase tracking-wide">Sejarah Singkat Polres Malang</h2>
                </div>
                <div class="p-6">
                    <div class="prose prose-sm max-w-none text-slate-600 leading-relaxed space-y-4">
                        <p>
                            Kepolisian Resor Kota Malang Kota (Polres Malang) merupakan satuan pelaksana Kepolisian Negara Republik Indonesia (Polri) yang berkedudukan di bawah jajaran Kepolisian Daerah Jawa Timur (Polda Jatim).
                        </p>
                        <p>
                            Seiring perkembangan wilayah Kota Malang sebagai kota pendidikan, pariwisata, dan pusat perekonomian di Jawa Timur, tipe kelembagaan Polres Malang dinaikkan statusnya menjadi Polres Malang (Tipe A) yang dipimpin oleh Perwira Menengah berpangkat Kombes Pol (Komisaris Besar Polisi).
                        </p>
                        <p>
                            MaPolres Malang beralamat strategis di Jalan Jaksa Agung Suprapto No. 19, Kecamatan Klojen, Kota Malang. Wilayah hukum Polres Malang membawahi 5 Kepolisian Sektor (Polsek) di tingkat kecamatan, yaitu Polsek Klojen, Polsek Blimbing, Polsek Lowokwaru, Polsek Sukun, dan Polsek Kedungkandang.
                        </p>
                    </div>
                </div>
            </section>

        </div>

        {{-- Sidebar --}}
        <div class="space-y-5">

            {{-- Wilayah Hukum --}}
            <div class="bg-navy-800 text-white border border-navy-700">
                <div class="border-b border-navy-700 px-5 py-3 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                    </svg>
                    <h3 class="font-bold text-sm text-gold-400 uppercase tracking-wide">Wilayah Hukum & Polsek Jajaran</h3>
                </div>
                <div class="divide-y divide-navy-700">
                    @foreach(['Polsek Klojen', 'Polsek Lowokwaru', 'Polsek Blimbing', 'Polsek Sukun', 'Polsek Kedungkandang'] as $polsek)
                        <div class="flex justify-between items-center px-5 py-3 text-xs hover:bg-navy-700/50 transition-colors">
                            <span class="text-slate-300">{{ $polsek }}</span>
                            <span class="text-gold-400 font-semibold">Tipe Urban</span>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Kontak Darurat --}}
            <div class="bg-white border border-slate-200">
                <div class="border-b border-slate-200 px-5 py-3">
                    <h3 class="font-bold text-sm text-navy-800 uppercase tracking-wide">Butuh Bantuan Darurat?</h3>
                </div>
                <div class="p-5 text-center">
                    <div class="w-14 h-14 bg-red-700 text-white flex items-center justify-center mx-auto mb-3">
                        <span class="text-xl font-black">110</span>
                    </div>
                    <p class="text-xs text-slate-500 mb-4 leading-relaxed">
                        Layanan Call Center Kepolisian Bebas Pulsa — Aktif 24 Jam 7 Hari
                    </p>
                    <a href="tel:110" class="btn-danger w-full justify-center text-xs py-2.5">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1.01 1.01 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                        Hubungi Call Center 110
                    </a>
                </div>
            </div>

            {{-- Quick links --}}
            <div class="bg-white border border-slate-200">
                <div class="border-b border-slate-200 px-5 py-3">
                    <h3 class="font-bold text-sm text-navy-800 uppercase tracking-wide">Tautan Terkait</h3>
                </div>
                <div class="divide-y divide-slate-100">
                    <a href="{{ route('organisasi') }}"
                       class="flex items-center justify-between px-5 py-3 text-xs text-slate-600 hover:bg-slate-50 hover:text-navy-700 transition-colors group">
                        <span class="font-medium">Struktur Organisasi</span>
                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-navy-600 group-hover:translate-x-0.5 transition-all duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="{{ route('pengaduan.create') }}"
                       class="flex items-center justify-between px-5 py-3 text-xs text-slate-600 hover:bg-slate-50 hover:text-navy-700 transition-colors group">
                        <span class="font-medium">Form Pengaduan Masyarakat</span>
                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-navy-600 group-hover:translate-x-0.5 transition-all duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                    <a href="{{ route('dokumen.index') }}"
                       class="flex items-center justify-between px-5 py-3 text-xs text-slate-600 hover:bg-slate-50 hover:text-navy-700 transition-colors group">
                        <span class="font-medium">Dokumen PPID</span>
                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover:text-navy-600 group-hover:translate-x-0.5 transition-all duration-150" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
