@extends('layouts.app')

@section('title', 'Layanan Kepolisian Terpadu — Polres Malang')

@section('content')
<div class="bg-navy-900 text-white py-12 border-b border-gold-500/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Pusat Pelayanan Publik</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white mt-1">Layanan Terpadu Kepolisian</h1>
        <p class="text-slate-300 text-sm mt-2 max-w-2xl">Daftar lengkap standar pelayanan publik Polres Malang lengkap dengan persyaratan, alur prosedur, biaya, dan jam kerja operasional.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($layanans as $layanan)
            <x-card-layanan :layanan="$layanan" />
        @endforeach
    </div>
</div>
@endsection
