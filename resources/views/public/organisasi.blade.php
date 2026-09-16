@extends('layouts.app')

@section('title', 'Struktur Organisasi & Pejabat Utama — Polres Malang')

@section('content')
<div class="bg-navy-900 text-white py-12 border-b border-gold-500/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Kelembagaan Polri</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white mt-1">Struktur Organisasi & Pejabat Utama</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Section Pejabat Utama -->
    <div class="mb-16">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <div class="section-divider mx-auto"></div>
            <h2 class="section-title">Pejabat Utama Polres Malang</h2>
            <p class="section-subtitle">Pimpinan puncak dan pengemban fungsi kepolisian di jajaran Polres Malang.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($pejabats as $pejabat)
                <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm hover:shadow-md transition text-center group">
                    <div class="w-36 h-44 rounded-2xl bg-navy-900 mx-auto overflow-hidden mb-4 shadow-md group-hover:scale-105 transition-transform duration-300">
                        <img src="{{ $pejabat->foto_url }}" alt="{{ $pejabat->nama }}" class="w-full h-full object-cover object-top">
                    </div>
                    <span class="badge-gold mb-2 inline-block text-[11px]">
                        {{ $pejabat->jabatan }}
                    </span>
                    <h3 class="font-bold text-navy-900 text-base leading-tight mb-1">{{ $pejabat->nama }}</h3>
                    <p class="text-xs text-slate-500 font-semibold mb-2">{{ $pejabat->pangkat_korps }}</p>
                    <span class="inline-block text-[10px] text-slate-400 bg-slate-100 px-2.5 py-1 rounded-full font-mono">
                        NRP/NIP: {{ $pejabat->nrp_nip }}
                    </span>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Section Bagan Struktur Satuan / Bagian / Sat -->
    <div class="bg-white rounded-3xl p-8 md:p-12 border border-slate-200 shadow-sm">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <div class="section-divider mx-auto"></div>
            <h2 class="section-title">Hierarki Unit Kerja & Satuan</h2>
            <p class="section-subtitle">Daftar Bagian, Satuan, Seksi, dan Unsur Pelaksana Tugas di Lingkungan Polres Malang.</p>
        </div>

        <div class="space-y-6">
            @foreach($satuans as $satRoot)
                <div class="bg-navy-900 text-white rounded-2xl p-6 shadow-md border border-navy-700">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="w-8 h-8 rounded-lg bg-gold-500 text-navy-900 font-extrabold flex items-center justify-center text-sm">
                            {{ $satRoot->kode ?? 'P' }}
                        </span>
                        <div>
                            <h3 class="font-bold text-lg text-white leading-tight">{{ $satRoot->nama }}</h3>
                            <p class="text-xs text-gold-400">{{ $satRoot->deskripsi }}</p>
                        </div>
                    </div>

                    @if($satRoot->children->count() > 0)
                        <div class="mt-4 pt-4 border-t border-navy-800 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach($satRoot->children as $child)
                                <div class="p-3 rounded-xl bg-navy-800/80 border border-navy-700 text-xs">
                                    <span class="font-bold text-gold-300 block mb-0.5">{{ $child->nama }}</span>
                                    <span class="text-slate-400 block line-clamp-2">{{ $child->deskripsi }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
