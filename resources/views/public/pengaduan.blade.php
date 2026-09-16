@extends('layouts.app')

@section('title', 'Form Pengaduan Masyarakat Online — Polres Malang')

@section('content')
<div class="bg-navy-900 text-white py-12 border-b border-gold-500/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <span class="text-xs font-bold uppercase tracking-widest text-gold-400">Layanan Transparansi Publik</span>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-white mt-1">Form Pengaduan Masyarakat Online</h1>
        <p class="text-slate-300 text-sm mt-2 max-w-2xl">Sampaikan pengaduan, laporan kejadian, atau masukan pelayanan secara langsung. Pengaduan Anda akan diproses secara rahasia dan akuntabel.</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 py-12">
    <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-xl">
        <x-alert />

        <form method="POST" action="{{ route('pengaduan.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="border-b border-slate-100 pb-4 mb-6">
                <h2 class="text-lg font-bold text-navy-800">1. Data Diri Pelapor</h2>
                <p class="text-xs text-slate-500">Identitas Anda terlindungi sesuai ketentuan perundang-undangan.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nama Pelapor -->
                <div>
                    <label class="form-label">Nama Lengkap (Sesuai KTP) <span class="text-red-500">*</span></label>
                    <input type="text" name="nama_pelapor" value="{{ old('nama_pelapor') }}" required class="form-input text-xs" placeholder="Contoh: Budi Santoso">
                    @error('nama_pelapor')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <!-- NIK -->
                <div>
                    <label class="form-label">NIK (16 Digit Angka) <span class="text-red-500">*</span></label>
                    <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16" required class="form-input text-xs" placeholder="357301xxxxxxxxxx">
                    @error('nik')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="form-label">Alamat Email Aktif <span class="text-red-500">*</span></label>
                    <input type="email" name="email_pelapor" value="{{ old('email_pelapor') }}" required class="form-input text-xs" placeholder="nama@email.com">
                    @error('email_pelapor')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <!-- No HP / WA -->
                <div>
                    <label class="form-label">Nomor WhatsApp / Telp <span class="text-red-500">*</span></label>
                    <input type="text" name="no_hp_pelapor" value="{{ old('no_hp_pelapor') }}" required class="form-input text-xs" placeholder="081234567890">
                    @error('no_hp_pelapor')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- Alamat -->
            <div>
                <label class="form-label">Alamat Domisili <span class="text-red-500">*</span></label>
                <textarea name="alamat" rows="2" required class="form-input text-xs" placeholder="Jl. Raya No. XX, Kecamatan Klojen, Kota Malang">{{ old('alamat') }}</textarea>
                @error('alamat')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="border-b border-slate-100 pb-4 pt-6 mb-6">
                <h2 class="text-lg font-bold text-navy-800">2. Rincian Laporan Pengaduan</h2>
                <p class="text-xs text-slate-500">Jelaskan kronologi atau informasi pengaduan dengan jelas.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Kategori Pengaduan -->
                <div>
                    <label class="form-label">Kategori Pengaduan <span class="text-red-500">*</span></label>
                    <select name="kategori" required class="form-input text-xs appearance-none cursor-pointer">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Layanan Kepolisian" {{ old('kategori') == 'Layanan Kepolisian' ? 'selected' : '' }}>Pelayanan Kepolisian (SIM, SKCK, SPKT)</option>
                        <option value="Kamtibmas" {{ old('kategori') == 'Kamtibmas' ? 'selected' : '' }}>Gangguan Kamtibmas / Keamanan</option>
                        <option value="Keluhan Publik" {{ old('kategori') == 'Keluhan Publik' ? 'selected' : '' }}>Keluhan Kinerja / Etika Anggota</option>
                        <option value="Lalu Lintas" {{ old('kategori') == 'Lalu Lintas' ? 'selected' : '' }}>Lalu Lintas & Kemacetan</option>
                        <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lain-lain</option>
                    </select>
                    @error('kategori')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <!-- Layanan Terkait Optional -->
                <div>
                    <label class="form-label">Layanan Terkait (Opsional)</label>
                    <select name="layanan_id" class="form-input text-xs appearance-none cursor-pointer">
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
                <label class="form-label">Judul Pengaduan <span class="text-red-500">*</span></label>
                <input type="text" name="judul" value="{{ old('judul') }}" required class="form-input text-xs" placeholder="Ringkasan inti pengaduan Anda">
                @error('judul')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <!-- Isi Pengaduan -->
            <div>
                <label class="form-label">Isi Pengaduan / Kronologi Kejadian <span class="text-red-500">*</span></label>
                <textarea name="isi_pengaduan" rows="5" required class="form-input text-xs" placeholder="Tuliskan secara lengkap lokasi, waktu kejadian, serta detail pengaduan yang ingin Anda sampaikan...">{{ old('isi_pengaduan') }}</textarea>
                @error('isi_pengaduan')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <!-- Lampiran File -->
            <div>
                <label class="form-label">Lampiran Bukti Foto / Dokumen (Opsional)</label>
                <input type="file" name="lampiran" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx" class="form-input text-xs">
                <p class="text-[11px] text-slate-400 mt-1">Format yang didukung: JPG, PNG, PDF, DOCX (Maksimal 5 MB).</p>
                @error('lampiran')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-between">
                <a href="{{ route('home') }}" class="text-xs font-semibold text-slate-500 hover:underline">
                    Batal
                </a>
                <button type="submit" class="btn-gold text-xs px-8 py-3.5 shadow-lg">
                    Kirim Laporan Pengaduan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
