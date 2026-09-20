@extends('layouts.app')

@section('title', $layanan->nama . ' — Standar Pelayanan Polres Malang')
@section('meta_description', 'Standar operasional prosedur, syarat pengurusan, biaya PNBP, dan alur permohonan ' . $layanan->nama . ' di lingkungan Kepolisian Resor Malang.')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <a href="{{ route('layanan.index') }}" class="hover:text-gold-400 transition-colors">Layanan Publik</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300 truncate">{{ $layanan->nama }}</span>
        </nav>
        <span class="page-header-eyebrow">Standar Operasional Prosedur</span>
        <h1 class="page-header-title">{{ $layanan->nama }}</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Detail Utama Layanan -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Deskripsi Pelayanan -->
            <div class="bg-white border border-slate-200 p-6 sm:p-8">
                <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                    <span class="w-1 h-5 bg-gold-400 inline-block"></span>
                    <h2 class="text-base font-bold text-navy-900">Deskripsi Pelayanan</h2>
                </div>
                <div class="prose prose-slate max-w-none text-slate-700 text-sm leading-relaxed">
                    {!! nl2br(e($layanan->deskripsi)) !!}
                </div>
            </div>

            <!-- Persyaratan Dokumen -->
            @if($layanan->persyaratan)
            <div class="bg-white border border-slate-200 p-6 sm:p-8">
                <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                    <span class="w-1 h-5 bg-gold-400 inline-block"></span>
                    <h2 class="text-base font-bold text-navy-900">Persyaratan Berkas &amp; Dokumen</h2>
                </div>
                <div class="prose prose-slate max-w-none text-slate-700 text-sm leading-relaxed">
                    {!! nl2br(e($layanan->persyaratan)) !!}
                </div>
            </div>
            @endif

            <!-- Alur & Prosedur Pelayanan -->
            @if($layanan->prosedur)
            <div class="bg-white border border-slate-200 p-6 sm:p-8">
                <div class="flex items-center gap-3 pb-4 mb-5 border-b border-slate-100">
                    <span class="w-1 h-5 bg-gold-400 inline-block"></span>
                    <h2 class="text-base font-bold text-navy-900">Alur &amp; Prosedur Pelayanan</h2>
                </div>
                <div class="prose prose-slate max-w-none text-slate-700 text-sm leading-relaxed">
                    {!! nl2br(e($layanan->prosedur)) !!}
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar Info Ringkas -->
        <div class="space-y-6">
            <!-- Informasi Spesifikasi Layanan -->
            <div class="bg-white border border-slate-200 p-6">
                <div class="flex items-center gap-2.5 pb-3 mb-4 border-b border-slate-100">
                    <span class="w-1 h-4 bg-navy-700 inline-block"></span>
                    <h3 class="font-bold text-navy-900 text-sm">Spesifikasi Pelayanan</h3>
                </div>

                <dl class="divide-y divide-slate-100 text-xs">
                    <div class="py-3 first:pt-0">
                        <dt class="text-slate-400 font-medium mb-1">Tarif / Biaya Resmi (PNBP)</dt>
                        <dd>
                            <span class="bg-emerald-50 border border-emerald-300 text-emerald-800 font-bold px-2.5 py-1 text-xs inline-block">
                                {{ $layanan->biaya ?? 'Gratis / PNBP Sesuai PP' }}
                            </span>
                        </dd>
                    </div>

                    <div class="py-3">
                        <dt class="text-slate-400 font-medium mb-0.5">Waktu Penyelesaian</dt>
                        <dd class="text-slate-800 font-semibold">{{ $layanan->waktu_penyelesaian ?? '1 - 2 Hari Kerja' }}</dd>
                    </div>

                    <div class="py-3">
                        <dt class="text-slate-400 font-medium mb-0.5">Jam Kerja Operasional</dt>
                        <dd class="text-slate-800 font-semibold">{{ $layanan->jam_operasional ?? 'Senin - Jumat (08.00 - 15.00 WIB)' }}</dd>
                    </div>

                    <div class="py-3">
                        <dt class="text-slate-400 font-medium mb-0.5">Lokasi Pelayanan</dt>
                        <dd class="text-slate-800 font-semibold">{{ $layanan->lokasi_pelayanan ?? 'Gedung SPKT / Satpas Polres Malang' }}</dd>
                    </div>

                    @if($layanan->kontak_layanan)
                    <div class="py-3">
                        <dt class="text-slate-400 font-medium mb-0.5">Kontak / Hotline</dt>
                        <dd class="text-navy-700 font-bold font-mono">{{ $layanan->kontak_layanan }}</dd>
                    </div>
                    @endif
                </dl>

                @if($layanan->link_external)
                    <div class="mt-5 pt-4 border-t border-slate-100">
                        <a href="{{ $layanan->link_external }}" target="_blank" rel="noopener"
                           class="btn-gold w-full justify-center text-xs py-2.5">
                            Akses Registrasi Online
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                            </svg>
                        </a>
                    </div>
                @endif
            </div>

            <!-- Box Pengaduan & Keluhan Layanan -->
            <div class="bg-navy-800 text-white p-6 border border-navy-700">
                <span class="text-xs font-bold uppercase tracking-wider text-gold-400 block mb-1">Pengawasan Publik</span>
                <h4 class="font-bold text-white text-sm mb-2">Kendala / Keluhan Pelayanan?</h4>
                <p class="text-xs text-slate-300 leading-relaxed mb-4">
                    Jika Anda menemui ketidaksesuaian prosedur, keterlambatan, atau pungutan yang tidak sah, sampaikan pengaduan resmi secara online.
                </p>
                <a href="{{ route('pengaduan.create', ['layanan_id' => $layanan->id]) }}"
                   class="btn-primary text-xs w-full justify-center py-2.5">
                    Buat Pengaduan Layanan
                </a>
            </div>

            <!-- Back link -->
            <div class="text-center">
                <a href="{{ route('layanan.index') }}" class="text-xs text-slate-500 hover:text-navy-700 font-medium inline-flex items-center gap-1.5 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Semua Layanan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
