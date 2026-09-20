@extends('layouts.app')

@section('title', 'Standar Pelayanan Kepolisian Terpadu — Polres Malang')
@section('meta_description', 'Daftar lengkap standar pelayanan publik Kepolisian Resor Malang meliputi penerbitan SIM, SKCK, laporan kehilangan SPKT, izin keramaian, dan pengaduan masyarakat.')

@section('content')
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">Layanan Publik</span>
        </nav>
        <span class="page-header-eyebrow">Pusat Pelayanan Terpadu</span>
        <h1 class="page-header-title">Standar Pelayanan Kepolisian</h1>
        <p class="text-slate-300 text-xs sm:text-sm mt-2 max-w-2xl leading-relaxed">
            Informasi resmi standar operasional prosedur, syarat permohonan, tarif PNBP, serta waktu penyelesaian pelayanan di lingkungan Polres Malang.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <!-- Notice Bar -->
    <div class="bg-navy-900 text-slate-200 border-l-4 border-gold-400 p-4 mb-8 text-xs flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
        <div class="flex items-center gap-2.5">
            <svg class="w-5 h-5 text-gold-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span>Seluruh pelayanan kepolisian berpedoman pada prinsip <strong>Transparan, Akuntabel, dan Bebas Pungutan Liar</strong>. Laporkan segala bentuk penyimpangan melalui loket pengaduan.</span>
        </div>
        <a href="{{ route('pengaduan.create') }}" class="btn-gold text-[11px] py-1.5 px-3 flex-shrink-0">
            Lapor Pungli
        </a>
    </div>

    <!-- Service Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($layanans as $layanan)
            <x-card-layanan :layanan="$layanan" />
        @empty
            <div class="col-span-full py-16 text-center bg-white border border-slate-200">
                <svg class="w-10 h-10 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="font-bold text-slate-700 text-base">Belum Ada Data Layanan</h3>
                <p class="text-xs text-slate-500 mt-1">Data pelayanan kepolisian sedang dalam proses pemutakhiran.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
