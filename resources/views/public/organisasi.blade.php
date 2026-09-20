@extends('layouts.app')

@section('title', 'Struktur Organisasi & Pejabat Utama — Polres Malang')
@section('meta_description', 'Struktur organisasi dan daftar pejabat utama Polres Malang beserta satuan dan unit kerja yang ada di lingkungan Polres Malang.')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">Struktur Organisasi</span>
        </nav>
        <span class="page-header-eyebrow">Kelembagaan Polri</span>
        <h1 class="page-header-title">Struktur Organisasi &amp; Pejabat Utama</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Section: Pejabat Utama --}}
    <section class="mb-14" aria-label="Pejabat Utama">
        <div class="flex items-center gap-3 mb-8">
            <span class="inline-block w-1 h-6 bg-gold-400"></span>
            <div>
                <h2 class="text-xl font-bold text-navy-800">Pejabat Utama Polres Malang</h2>
                <p class="text-sm text-slate-500 mt-0.5">Pimpinan puncak dan pengemban fungsi kepolisian di jajaran Polres Malang.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($pejabats as $pejabat)
                <div class="group bg-white border border-slate-200 overflow-hidden hover:border-navy-400 hover:shadow-md transition-all duration-200">
                    <!-- Gold top accent -->
                    <div class="h-0.5 bg-transparent group-hover:bg-gold-400 transition-colors duration-200"></div>

                    <div class="flex flex-col items-center text-center p-6">
                        <!-- Photo -->
                        <div class="relative w-28 h-36 overflow-hidden bg-navy-900 mb-4 border-2 border-slate-200 group-hover:border-navy-400 transition-colors duration-200 flex-shrink-0">
                            <img src="{{ $pejabat->foto_url }}"
                                 alt="{{ $pejabat->nama }}"
                                 class="w-full h-full object-cover object-top">
                        </div>

                        <!-- Position badge -->
                        <span class="inline-block text-[10px] font-bold uppercase tracking-wider bg-navy-800 text-gold-400 px-3 py-1 mb-2">
                            {{ $pejabat->jabatan }}
                        </span>

                        <!-- Name -->
                        <h3 class="font-bold text-navy-900 text-sm leading-tight mb-1">{{ $pejabat->nama }}</h3>

                        <!-- Rank -->
                        <p class="text-xs text-slate-500 font-semibold mb-2">{{ $pejabat->pangkat_korps }}</p>

                        <!-- NRP -->
                        <span class="text-[10px] text-slate-400 bg-slate-50 border border-slate-200 px-2.5 py-1 font-mono">
                            NRP: {{ $pejabat->nrp_nip }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Section: Hierarki Unit Kerja --}}
    <section aria-label="Hierarki Unit Kerja">
        <div class="flex items-center gap-3 mb-8">
            <span class="inline-block w-1 h-6 bg-gold-400"></span>
            <div>
                <h2 class="text-xl font-bold text-navy-800">Hierarki Unit Kerja &amp; Satuan</h2>
                <p class="text-sm text-slate-500 mt-0.5">Daftar Bagian, Satuan, Seksi, dan Unsur Pelaksana Tugas di Lingkungan Polres Malang.</p>
            </div>
        </div>

        <div class="space-y-4">
            @foreach($satuans as $satRoot)
                <div class="bg-white border border-slate-200 overflow-hidden">
                    <!-- Root unit header -->
                    <div class="bg-navy-800 border-b border-navy-700 px-5 py-4 flex items-center gap-3">
                        <span class="w-8 h-8 bg-gold-400 text-navy-900 font-extrabold flex items-center justify-center text-sm flex-shrink-0">
                            {{ $satRoot->kode ?? substr($satRoot->nama, 0, 1) }}
                        </span>
                        <div>
                            <h3 class="font-bold text-base text-white leading-tight">{{ $satRoot->nama }}</h3>
                            @if($satRoot->deskripsi)
                                <p class="text-xs text-gold-400 mt-0.5">{{ $satRoot->deskripsi }}</p>
                            @endif
                        </div>
                    </div>

                    <!-- Children units -->
                    @if($satRoot->children->count() > 0)
                        <div class="p-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3">
                                @foreach($satRoot->children as $child)
                                    <div class="border border-slate-200 bg-slate-50/50 p-3 hover:border-navy-300 hover:bg-white transition-colors duration-150">
                                        <span class="font-bold text-navy-700 text-xs block mb-1">{{ $child->nama }}</span>
                                        @if($child->deskripsi)
                                            <span class="text-[11px] text-slate-500 block leading-relaxed line-clamp-2">
                                                {{ $child->deskripsi }}
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

</div>

@endsection
