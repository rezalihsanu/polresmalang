@extends('layouts.app')

@section('title', $layanan->nama . ' — Pelayanan Publik Polres Malang')

@section('content')
<div class="bg-navy-900 text-white py-10 border-b border-gold-500/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center gap-2 text-xs text-gold-400 mb-3">
            <a href="{{ route('home') }}" class="hover:underline">Beranda</a>
            <span>/</span>
            <a href="{{ route('layanan.index') }}" class="hover:underline">Layanan Publik</a>
            <span>/</span>
            <span class="text-slate-300">{{ $layanan->nama }}</span>
        </div>
        <h1 class="text-3xl font-extrabold text-white">{{ $layanan->nama }}</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        <!-- Detail Utama Layanan -->
        <div class="lg:col-span-2 space-y-8">
            <!-- Deskripsi -->
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
                <h2 class="text-xl font-bold text-navy-800 mb-4 border-b border-slate-100 pb-3">Deskripsi Pelayanan</h2>
                <div class="prose max-w-none text-slate-700 text-sm leading-relaxed">
                    {!! nl2br(e($layanan->deskripsi)) !!}
                </div>
            </div>

            <!-- Persyaratan -->
            @if($layanan->persyaratan)
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
                <h2 class="text-xl font-bold text-navy-800 mb-4 border-b border-slate-100 pb-3">Persyaratan Dokumen</h2>
                <div class="prose max-w-none text-slate-700 text-sm leading-relaxed">
                    {!! nl2br(e($layanan->persyaratan)) !!}
                </div>
            </div>
            @endif

            <!-- Prosedur / Alur -->
            @if($layanan->prosedur)
            <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
                <h2 class="text-xl font-bold text-navy-800 mb-4 border-b border-slate-100 pb-3">Alur & Prosedur Pelayanan</h2>
                <div class="prose max-w-none text-slate-700 text-sm leading-relaxed">
                    {!! nl2br(e($layanan->prosedur)) !!}
                </div>
            </div>
            @endif
        </div>

        <!-- Sidebar Info Ringkas -->
        <div class="space-y-6">
            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm">
                <h3 class="font-bold text-navy-900 text-base mb-4 border-b border-slate-100 pb-3">Informasi Pelayanan</h3>

                <dl class="space-y-4 text-xs">
                    <div>
                        <dt class="text-slate-400 font-medium mb-0.5">Biaya / Tarif</dt>
                        <dd class="text-emerald-700 font-bold text-sm bg-emerald-50 px-3 py-1.5 rounded-lg w-fit">
                            {{ $layanan->biaya ?? 'Gratis / PNBP Resmi' }}
                        </dd>
                    </div>

                    <div>
                        <dt class="text-slate-400 font-medium mb-0.5">Waktu Penyelesaian</dt>
                        <dd class="text-slate-800 font-semibold">{{ $layanan->waktu_penyelesaian ?? '1 - 2 Hari Kerja' }}</dd>
                    </div>

                    <div>
                        <dt class="text-slate-400 font-medium mb-0.5">Jam Operasional</dt>
                        <dd class="text-slate-800 font-semibold">{{ $layanan->jam_operasional ?? 'Senin - Jumat (08.00 - 15.00 WIB)' }}</dd>
                    </div>

                    <div>
                        <dt class="text-slate-400 font-medium mb-0.5">Lokasi Pelayanan</dt>
                        <dd class="text-slate-800 font-semibold">{{ $layanan->lokasi_pelayanan ?? 'Gedung SPKT Polres Malang' }}</dd>
                    </div>

                    @if($layanan->kontak_layanan)
                    <div>
                        <dt class="text-slate-400 font-medium mb-0.5">Kontak Langsung</dt>
                        <dd class="text-navy-600 font-bold">{{ $layanan->kontak_layanan }}</dd>
                    </div>
                    @endif
                </dl>

                @if($layanan->link_external)
                    <div class="mt-6 pt-4 border-t border-slate-100">
                        <a href="{{ $layanan->link_external }}" target="_blank" class="btn-gold w-full justify-center text-xs py-2.5">
                            Akses Aplikasi Online / Pendaftaran
                        </a>
                    </div>
                @endif
            </div>

            <div class="bg-navy-900 text-white rounded-3xl p-6 border border-navy-700">
                <h4 class="font-bold text-gold-400 text-sm mb-3">Punya Pertanyaan Mengenai Layanan Ini?</h4>
                <p class="text-xs text-slate-300 mb-4">Sampaikan pertanyaan atau keluhan Anda secara langsung ke petugas pengaduan.</p>
                <a href="{{ route('pengaduan.create', ['layanan_id' => $layanan->id]) }}" class="btn-primary text-xs w-full justify-center py-2.5">
                    Kirim Pengaduan / Keluhan
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
