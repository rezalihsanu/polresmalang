@extends('layouts.app')

@section('title', 'Form Pengaduan Masyarakat Online — Polres Malang')
@section('meta_description', 'Layanan pengaduan masyarakat online resmi Polres Malang. Laporkan gangguan kamtibmas, ketertiban umum, dan sampaikan kritik saran secara transparan dan akuntabel.')

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-slate-400 mb-2" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-gold-400 transition-colors">Beranda</a>
            <span class="mx-2 text-navy-600">/</span>
            <span class="text-slate-300">Pengaduan Masyarakat</span>
        </nav>
        <span class="page-header-eyebrow">Layanan Partisipasi &amp; Pengawasan Publik</span>
        <h1 class="page-header-title">Form Pengaduan Masyarakat Online</h1>
        <p class="text-slate-300 text-xs sm:text-sm mt-2 max-w-2xl leading-relaxed">
            Sampaikan pengaduan, informasi gangguan kamtibmas, atau masukan pelayanan kepolisian secara langsung. Laporan Anda diproses secara transparan dan terlindungi kerahasiaannya.
        </p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-10">
    <!-- Jaminan Kerahasiaan & Prosedur Notice -->
    <div class="bg-navy-900 border-l-4 border-gold-400 p-4 mb-8 text-xs text-slate-200 flex items-start gap-3">
        <svg class="w-5 h-5 text-gold-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
        </svg>
        <div class="leading-relaxed">
            <span class="font-bold text-white block mb-0.5">Jaminan Kerahasiaan Identitas Pelapor</span>
            Identitas Anda sebagai pelapor dijamin kerahasiaannya oleh Kepolisian Resor Malang sesuai ketentuan peraturan perundang-undangan. Setelah mengirim laporan, Anda akan memperoleh <strong>Nomor Tiket</strong> untuk memantau proses tindak lanjut.
        </div>
    </div>

    <!-- Form Container -->
    <div class="bg-white border border-slate-200 p-6 sm:p-10 shadow-sm">
        <x-alert />

        <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Section 1: Data Diri Pelapor -->
            <div class="pb-3 border-b border-slate-200">
                <div class="flex items-center gap-2.5">
                    <span class="w-6 h-6 bg-navy-700 text-white font-bold text-xs flex items-center justify-center">1</span>
                    <h2 class="text-sm font-bold text-navy-900 uppercase tracking-wide">Data Identitas Pelapor</h2>
                </div>
                <p class="text-xs text-slate-500 mt-1 pl-8">Harap mengisi data diri sesuai dokumen kependudukan yang sah.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Nama Pelapor -->
                <div>
                    <label class="form-label">Nama Lengkap (Sesuai KTP) <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" required
                           class="form-input text-xs" placeholder="Contoh: Budi Santoso">
                    @error('nama_pelapor')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <!-- NIK -->
                <div>
                    <label class="form-label">NIK (16 Digit Angka) <span class="text-red-500">*</span></label>
                    <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" required
                           class="form-input text-xs font-mono" placeholder="3507xxxxxxxxxxxx">
                    @error('nik')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="form-label">Alamat Email Aktif <span class="text-red-500">*</span></label>
                    <input type="email" name="email_pelapor" value="{{ old('email_pelapor') }}" required
                           class="form-input text-xs" placeholder="nama@email.com">
                    @error('email_pelapor')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <!-- No HP / WA -->
                <div>
                    <label class="form-label">Nomor WhatsApp / Telp <span class="text-red-500">*</span></label>
                    <input type="text" name="no_hp_pelapor" value="{{ old('no_hp_pelapor') }}" required
                           class="form-input text-xs font-mono" placeholder="081234567890">
                    @error('no_hp_pelapor')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- Alamat -->
            <div>
                <label class="form-label">Alamat Domisili Lengkap <span class="text-red-500">*</span></label>
                <textarea name="alamat" rows="2" required class="form-input text-xs"
                          placeholder="Nama jalan, nomor rumah, RT/RW, kelurahan/desa, kecamatan...">{{ old('alamat') }}</textarea>
                @error('alamat')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <!-- Section 2: Rincian Pengaduan -->
            <div class="pb-3 border-b border-slate-200 pt-4">
                <div class="flex items-center gap-2.5">
                    <span class="w-6 h-6 bg-navy-700 text-white font-bold text-xs flex items-center justify-center">2</span>
                    <h2 class="text-sm font-bold text-navy-900 uppercase tracking-wide">Rincian Informasi Pengaduan</h2>
                </div>
                <p class="text-xs text-slate-500 mt-1 pl-8">Uraikan fakta kejadian atau keluhan pelayanan secara rinci dan objektif.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                <!-- Kategori Pengaduan -->
                <div>
                    <label class="form-label">Klasifikasi Pengaduan <span class="text-red-500">*</span></label>
                    <select name="kategori" required class="form-input text-xs bg-white cursor-pointer">
                        <option value="">-- Pilih Klasifikasi --</option>
                        <option value="Layanan Kepolisian" {{ old('kategori') == 'Layanan Kepolisian' ? 'selected' : '' }}>Pelayanan Kepolisian (SIM, SKCK, SPKT)</option>
                        <option value="Kamtibmas" {{ old('kategori') == 'Kamtibmas' ? 'selected' : '' }}>Gangguan Keamanan &amp; Ketertiban (Kamtibmas)</option>
                        <option value="Keluhan Publik" {{ old('kategori') == 'Keluhan Publik' ? 'selected' : '' }}>Keluhan Kinerja / Perilaku Anggota</option>
                        <option value="Lalu Lintas" {{ old('kategori') == 'Lalu Lintas' ? 'selected' : '' }}>Lalu Lintas &amp; Kemacetan</option>
                        <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                    @error('kategori')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <!-- Layanan Terkait Optional -->
                <div>
                    <label class="form-label">Unit / Jenis Layanan Terkait (Opsional)</label>
                    <select name="layanan_id" class="form-input text-xs bg-white cursor-pointer">
                        <option value="">-- Tanpa Spesifik Layanan --</option>
                        @foreach($layanans as $l)
                            <option value="{{ $l->id }}" {{ (request('layanan_id') == $l->id || old('layanan_id') == $l->id) ? 'selected' : '' }}>
                                {{ $l->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Judul Pengaduan -->
            <div>
                <label class="form-label">Subjek / Judul Pengaduan <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul') }}" required class="form-input text-xs"
                       placeholder="Contoh: Permohonan tindak lanjut balap liar di Jl. Raya Kepanjen">
                @error('judul')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <!-- Isi Pengaduan -->
            <div>
                <label class="form-label">Uraian Kronologi / Detail Laporan <span class="text-red-500">*</span></label>
                <textarea name="isi_pengaduan" rows="5" required class="form-input text-xs"
                          placeholder="Jelaskan secara runtut kronologi kejadian, tempat/lokasi kejadian, waktu/tanggal, serta pihak-pihak yang terlibat...">{{ old('isi_pengaduan') }}</textarea>
                @error('isi_pengaduan')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <!-- Lampiran File -->
            <div>
                <label class="form-label">Dokumen / Bukti Pendukung (Opsional)</label>
                <input type="file" name="lampiran" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                       class="form-input text-xs file:mr-3 file:py-1.5 file:px-3 file:border-0 file:text-xs file:font-semibold file:bg-navy-50 file:text-navy-700 hover:file:bg-navy-100">
                <p class="text-[11px] text-slate-400 mt-1">Format berkas: JPG, PNG, PDF, DOCX (Maksimal 5 MB).</p>
                @error('lampiran')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <!-- Form Actions -->
            <div class="pt-6 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <a href="{{ route('home') }}" class="text-xs font-medium text-slate-500 hover:text-slate-800 transition-colors">
                    &larr; Batalkan dan Kembali
                </a>
                <button type="submit" class="btn-gold text-xs px-8 py-3 w-full sm:w-auto justify-center">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    Kirim Laporan Pengaduan
                </button>
            </div>
        </form>
    </div>

    <!-- Info Lacak Pengaduan Alternatif -->
    <div class="mt-8 text-center text-xs text-slate-500">
        Sudah pernah mengirim pengaduan sebelumnya?
        <a href="{{ route('pengaduan.lacak') }}" class="text-navy-700 font-bold hover:underline ml-1">
            Lacak Status Tiket Pengaduan di Sini &rarr;
        </a>
    </div>
</div>
@endsection
