@extends('layouts.app')

@section('title', 'Profil Instansi, Sejarah & Visi Misi — Polres Malang')

@section('content')
<!-- Page Header Banner -->
<div class="bg-navy-900 text-white py-12 border-b border-gold-500/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Tentang Polres Malang</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white mt-1">Profil & Visi Misi Instansi</h1>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-12">
            <!-- Visi & Misi -->
            <section class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
                <div class="section-divider"></div>
                <h2 class="text-2xl font-bold text-navy-800 mb-6">Visi & Misi Polres Malang</h2>

                <div class="mb-8 p-6 bg-navy-50 rounded-2xl border-l-4 border-navy-600">
                    <h3 class="font-bold text-navy-800 text-lg mb-2 uppercase tracking-wide">Visi Utama</h3>
                    <p class="text-slate-700 italic leading-relaxed text-sm">
                        "Terwujudnya pelayanan keamanan dan ketertiban masyarakat yang prima, tegaknya hukum serta terbinanya keamanan dalam negeri yang mantap di wilayah hukum Polres Malang dengan menjunjung tinggi Hak Asasi Manusia (HAM) serta berlandaskan nilai-nilai PRESISI (Prediktif, Responsibilitas, dan Transparansi Berkeadilan)."
                    </p>
                </div>

                <div>
                    <h3 class="font-bold text-navy-800 text-base mb-4 uppercase tracking-wide">Misi Strategis</h3>
                    <ul class="space-y-3 text-sm text-slate-600">
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-gold-400 text-navy-900 font-bold flex items-center justify-center text-xs flex-shrink-0 mt-0.5">1</span>
                            <span>Mewujudkan pelayanan kepolisian yang responsif, berkualitas, bebas dari pungutan liar, dan berbasis teknologi informasi terpadu.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-gold-400 text-navy-900 font-bold flex items-center justify-center text-xs flex-shrink-0 mt-0.5">2</span>
                            <span>Memelihara keamanan dan ketertiban masyarakat (Kamtibmas) di wilayah Kota Malang secara preventif dan preemtif melalui Program Jogo Malang Presisi.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-gold-400 text-navy-900 font-bold flex items-center justify-center text-xs flex-shrink-0 mt-0.5">3</span>
                            <span>Penegakan hukum yang profesional, akuntabel, proporsional, dan menjunjung tinggi transparansi demi tercapainya kepastian hukum.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="w-6 h-6 rounded-full bg-gold-400 text-navy-900 font-bold flex items-center justify-center text-xs flex-shrink-0 mt-0.5">4</span>
                            <span>Meningkatkan sinergitas kemitraan bersama TNI, Pemerintah Kota Malang, civitas akademika, dan seluruh elemen masyarakat.</span>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- Sejarah Singkat -->
            <section class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm">
                <div class="section-divider"></div>
                <h2 class="text-2xl font-bold text-navy-800 mb-4">Sejarah Singkat Polres Malang</h2>
                <div class="prose max-w-none text-slate-600 text-sm leading-relaxed space-y-4">
                    <p>
                        Kepolisian Resor Kota Malang Kota (Polres Malang) merupakan satuan pelaksana Kepolisian Negara Republik Indonesia (Polri) yang berkedudukan di bawah jajaran Kepolisian Daerah Jawa Timur (Polda Jatim).
                    </p>
                    <p>
                        Seiring perkembangan wilayah Kota Malang sebagai kota pendidikan, pariwisata, dan pusat perekonomian di Jawa Timur, tipe kelembagaan Polres Malang dinaikkan statusnya menjadi **Polres Malang** (Tipe A) yang dipimpin oleh Perwira Menengah berpangkat Kombes Pol (Komisaris Besar Polisi).
                    </p>
                    <p>
                        MaPolres Malang beralamat strategis di Jalan Jaksa Agung Suprapto No. 19, Kecamatan Klojen, Kota Malang. Wilayah hukum Polres Malang membawahi 5 Kepolisian Sektor (Polsek) di tingkat kecamatan, yaitu Polsek Klojen, Polsek Blimbing, Polsek Lowokwaru, Polsek Sukun, dan Polsek Kedungkandang.
                    </p>
                </div>
            </section>
        </div>

        <!-- Sidebar Info Pimpinan & Quick Links -->
        <div class="space-y-6">
            <div class="bg-navy-900 text-white rounded-3xl p-6 shadow-md border border-navy-700">
                <h3 class="font-bold text-base text-gold-400 mb-4">Wilayah Hukum & Polsek Jajaran</h3>
                <ul class="space-y-3 text-xs text-slate-300">
                    <li class="flex justify-between items-center py-2 border-b border-navy-800">
                        <span>Polsek Klojen</span>
                        <span class="text-gold-400 font-semibold">Tipe Urban</span>
                    </li>
                    <li class="flex justify-between items-center py-2 border-b border-navy-800">
                        <span>Polsek Lowokwaru</span>
                        <span class="text-gold-400 font-semibold">Tipe Urban</span>
                    </li>
                    <li class="flex justify-between items-center py-2 border-b border-navy-800">
                        <span>Polsek Blimbing</span>
                        <span class="text-gold-400 font-semibold">Tipe Urban</span>
                    </li>
                    <li class="flex justify-between items-center py-2 border-b border-navy-800">
                        <span>Polsek Sukun</span>
                        <span class="text-gold-400 font-semibold">Tipe Urban</span>
                    </li>
                    <li class="flex justify-between items-center py-2">
                        <span>Polsek Kedungkandang</span>
                        <span class="text-gold-400 font-semibold">Tipe Urban</span>
                    </li>
                </ul>
            </div>

            <div class="bg-white rounded-3xl p-6 border border-slate-200 shadow-sm text-center">
                <div class="w-16 h-16 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center mx-auto mb-4 text-2xl font-bold">
                    110
                </div>
                <h4 class="font-bold text-navy-900 text-base mb-1">Butuh Bantuan Darurat?</h4>
                <p class="text-xs text-slate-500 mb-4">Layanan Call Center Kepolisian Bebas Pulsa 24 Jam</p>
                <a href="tel:110" class="btn-danger w-full justify-center text-xs py-2.5">
                    Hubungi Call Center 110
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
