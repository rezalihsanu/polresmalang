<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kegiatan;
use App\Models\Galeri;

class KegiatanGaleriSeeder extends Seeder
{
    public function run(): void
    {
        $kegiatans = [
            [
                'judul'           => 'Bakti Sosial & Pengobatan Gratis Jogo Malang',
                'slug'            => 'bakti-sosial-pengobatan-gratis-jogo-malang',
                'deskripsi'       => 'Dokumentasi kegiatan bakti kesehatan dan pengobatan gratis bagi masyarakat kurang mampu di Kecamatan Klojen.',
                'tanggal_kegiatan'=> now()->subDays(12)->format('Y-m-d'),
                'lokasi'          => 'Kecamatan Klojen, Kota Malang',
                'foto_utama'      => null,
            ],
            [
                'judul'           => 'Patroli Skala Besar Antar Instansi (Sinergitas TNI-Polri & Pemkot)',
                'slug'            => 'patroli-skala-besar-sinergitas-tni-polri-pemkot',
                'deskripsi'       => 'Kegiatan patroli bersama menjaga kamtibmas di pusat keramaian Kota Malang.',
                'tanggal_kegiatan'=> now()->subDays(6)->format('Y-m-d'),
                'lokasi'          => 'Alun-alun & Pusat Kota Malang',
                'foto_utama'      => null,
            ],
            [
                'judul'           => 'Sosialisasi Tertib Lalu Lintas di SMA Negeri 1 Malang',
                'slug'            => 'sosialisasi-tertib-lalu-lintas-sman-1-malang',
                'deskripsi'       => 'Satlantas Polres Malang memberikan edukasi safety riding dan etika berlalu lintas kepada pelajar.',
                'tanggal_kegiatan'=> now()->subDays(3)->format('Y-m-d'),
                'lokasi'          => 'SMA Negeri 1 Malang',
                'foto_utama'      => null,
            ],
        ];

        foreach ($kegiatans as $kegData) {
            $kegiatan = Kegiatan::firstOrCreate(['slug' => $kegData['slug']], $kegData);

            // Buat galeri foto dummy per kegiatan
            for ($i = 1; $i <= 3; $i++) {
                Galeri::firstOrCreate([
                    'kegiatan_id' => $kegiatan->id,
                    'caption'     => "Foto dokumentasi {$kegiatan->judul} - Sesi {$i}",
                ], [
                    'foto_path'   => null,
                    'urutan'      => $i,
                ]);
            }
        }

        $this->command->info('✅ Kegiatan & Galeri seeded.');
    }
}
