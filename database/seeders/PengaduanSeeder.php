<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pengaduan;

class PengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $pengaduans = [
            [
                'nomor_tiket'       => 'PGD-20260901-0001',
                'nama_pelapor'      => 'Budi Santoso',
                'nik'               => '3573011203850001',
                'email_pelapor'     => 'budi.santoso@gmail.com',
                'no_hp_pelapor'     => '081234567890',
                'alamat'            => 'Jl. Sukarno Hatta No. 45, Lowokwaru, Kota Malang',
                'kategori'          => 'Layanan Kepolisian',
                'judul'             => 'Mohon Informasi Jam Operasional SIM Keliling di Sawojajar',
                'isi_pengaduan'     => 'Selamat siang Polres Malang, saya ingin menanyakan jadwal dan lokasi pelayanan SIM Keliling untuk wilayah Sawojajar bulan ini. Terima kasih.',
                'status'            => 'selesai',
                'tanggapan'         => 'Selamat siang Bapak Budi. Pelayanan SIM Keliling di Sawojajar beroperasi setiap hari Rabu pukul 08.00 - 12.00 WIB di Depan Pasar Sawojajar. Terima kasih.',
                'ditangani_pada'    => now()->subDays(4),
            ],
            [
                'nomor_tiket'       => 'PGD-20260905-0002',
                'nama_pelapor'      => 'Siti Rahmawati',
                'nik'               => '3573025508920003',
                'email_pelapor'     => 'siti.rahma@yahoo.com',
                'no_hp_pelapor'     => '085712345678',
                'alamat'            => 'Jl. Galunggung No. 12, Klojen, Kota Malang',
                'kategori'          => 'Kamtibmas',
                'judul'             => 'Laporan Balap Liar di Jalan Bandung Setiap Akhir Pekan',
                'isi_pengaduan'     => 'Mohon bantuan penertiban aksi balap liar pemuda yang resah di sepanjang Jalan Bandung pada hari Sabtu malam minggu jam 01.00 WIB.',
                'status'            => 'diproses',
                'tanggapan'         => 'Terima kasih atas laporan Anda. Tim Tim Patroli Jogo Malang telah meneruskan laporan ini ke Satlantas & Satsamapta untuk ditingkatkan patrolinya di kawasan tersebut.',
                'ditangani_pada'    => now()->subDays(1),
            ],
            [
                'nomor_tiket'       => 'PGD-20260908-0003',
                'nama_pelapor'      => 'Ahmad Fauzi',
                'nik'               => '3573032110900002',
                'email_pelapor'     => 'ahmad.fauzi@gmail.com',
                'no_hp_pelapor'     => '082198765432',
                'alamat'            => 'Jl. Borobudur No. 8, Blimbing, Kota Malang',
                'kategori'          => 'Keluhan Publik',
                'judul'             => 'Antrean Pembuatan SKCK Online',
                'isi_pengaduan'     => 'Bagaimana cara konfirmasi apabila sudah mendaftar SKCK online via Super App Presisi? Apakah bisa langsung datang ke Mapolresta?',
                'status'            => 'baru',
                'tanggapan'         => null,
                'ditangani_pada'    => null,
            ],
        ];

        foreach ($pengaduans as $pgd) {
            Pengaduan::firstOrCreate(['nomor_tiket' => $pgd['nomor_tiket']], $pgd);
        }

        $this->command->info('✅ Pengaduan seeded.');
    }
}
