<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriDokumen;
use App\Models\Dokumen;

class DokumenSeeder extends Seeder
{
    public function run(): void
    {
        $kategoriDokumens = [
            ['nama' => 'Laporan Kinerja',       'slug' => 'laporan-kinerja',       'deskripsi' => 'Laporan Akuntabilitas Kinerja Instansi Pemerintah (LAKIP) dan dokumen kinerja'],
            ['nama' => 'Rencana Strategis',     'slug' => 'rencana-strategis',     'deskripsi' => 'Rencana Strategis (Renstra) dan Rencana Kerja (Renja) Polres Malang'],
            ['nama' => 'DIPA & Anggaran',       'slug' => 'dipa-anggaran',         'deskripsi' => 'Daftar Isian Pelaksanaan Anggaran (DIPA) dan Rencana Kerja Anggaran'],
            ['nama' => 'Informasi Publik / PPID', 'slug' => 'informasi-publik-ppid', 'deskripsi' => 'Dokumen informasi publik serta regulasi dan standar pelayanan'],
        ];

        foreach ($kategoriDokumens as $kat) {
            KategoriDokumen::firstOrCreate(['slug' => $kat['slug']], $kat);
        }

        $katLakip = KategoriDokumen::where('slug', 'laporan-kinerja')->first();
        $katRenstra = KategoriDokumen::where('slug', 'rencana-strategis')->first();
        $katDipa = KategoriDokumen::where('slug', 'dipa-anggaran')->first();

        $dokumens = [
            [
                'kategori_dokumen_id' => $katLakip?->id,
                'judul'               => 'Laporan Akuntabilitas Kinerja Instansi Pemerintah (LAKIP) Polres Malang Tahun 2025',
                'slug'                => 'lakip-polresta-malang-kota-2025',
                'deskripsi'           => 'Dokumen LAKIP Polres Malang Tahun 2025 sebagai wujud akuntabilitas kinerja transparansi publik.',
                'file_path'           => null,
                'file_name'           => 'lakip-2025.pdf',
                'file_size'           => 2450000,
                'file_type'           => 'pdf',
                'tahun'               => 2025,
                'download_count'      => 42,
            ],
            [
                'kategori_dokumen_id' => $katRenstra?->id,
                'judul'               => 'Rencana Strategis (RENSTRA) Polres Malang Tahun 2025-2029',
                'slug'                => 'renstra-polresta-malang-kota-2025-2029',
                'deskripsi'           => 'Rencana Strategis jangka menengah Polres Malang periode 2025-2029.',
                'file_path'           => null,
                'file_name'           => 'renstra-2025-2029.pdf',
                'file_size'           => 3800000,
                'file_type'           => 'pdf',
                'tahun'               => 2025,
                'download_count'      => 85,
            ],
            [
                'kategori_dokumen_id' => $katDipa?->id,
                'judul'               => 'Daftar Isian Pelaksanaan Anggaran (DIPA) T.A. 2026',
                'slug'                => 'dipa-polresta-malang-kota-ta-2026',
                'deskripsi'           => 'Rincian alokasi anggaran belanja Polres Malang Tahun Anggaran 2026.',
                'file_path'           => null,
                'file_name'           => 'dipa-ta-2026.pdf',
                'file_size'           => 1900000,
                'file_type'           => 'pdf',
                'tahun'               => 2026,
                'download_count'      => 19,
            ],
        ];

        foreach ($dokumens as $dok) {
            Dokumen::firstOrCreate(['slug' => $dok['slug']], $dok);
        }

        $this->command->info('✅ Dokumen seeded.');
    }
}
