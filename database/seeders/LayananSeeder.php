<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $layanans = [
            [
                'nama'              => 'SPKT (Laporan Polisi)',
                'slug'              => 'spkt',
                'deskripsi_singkat' => 'Sentral Pelayanan Kepolisian Terpadu untuk laporan kejahatan dan kecelakaan.',
                'konten'            => '<h3>Layanan SPKT</h3><p>Sentra Pelayanan Kepolisian Terpadu (SPKT) adalah pintu utama pelaporan masyarakat kepada Polri. Layanan ini buka 24 jam.</p><h4>Persyaratan</h4><ul><li>KTP/Identitas diri</li><li>Kronologi kejadian</li><li>Bukti pendukung (jika ada)</li></ul>',
                'ikon'              => 'shield-check',
                'aktif'             => true,
                'urutan'            => 1,
            ],
            [
                'nama'              => 'SKCK',
                'slug'              => 'skck',
                'deskripsi_singkat' => 'Surat Keterangan Catatan Kepolisian untuk keperluan melamar kerja, studi, dan lainnya.',
                'konten'            => '<h3>Layanan SKCK</h3><p>SKCK diterbitkan oleh Polri sebagai surat keterangan resmi yang menginformasikan ada atau tidaknya catatan kriminal pemohon.</p><h4>Persyaratan</h4><ul><li>Fotokopi KTP</li><li>Fotokopi KK</li><li>Pas foto 4×6 (6 lembar, latar merah)</li><li>Sidik jari (dilayani di loket)</li></ul>',
                'ikon'              => 'document-check',
                'aktif'             => true,
                'urutan'            => 2,
            ],
            [
                'nama'              => 'SIM (Surat Izin Mengemudi)',
                'slug'              => 'sim',
                'deskripsi_singkat' => 'Pengurusan SIM baru dan perpanjangan SIM di Satuan Lalu Lintas.',
                'konten'            => '<h3>Layanan SIM</h3><p>Polres Malang menyediakan layanan penerbitan dan perpanjangan SIM A, B1, B2, C, dan D.</p><h4>Persyaratan SIM Baru</h4><ul><li>KTP asli dan fotokopi</li><li>Surat keterangan sehat dari dokter</li><li>Lulus ujian teori dan praktik</li></ul>',
                'ikon'              => 'identification',
                'aktif'             => true,
                'urutan'            => 3,
            ],
            [
                'nama'              => 'SAMSAT',
                'slug'              => 'samsat',
                'deskripsi_singkat' => 'Layanan pembayaran pajak kendaraan bermotor dan pengesahan STNK.',
                'konten'            => '<h3>Layanan SAMSAT</h3><p>SAMSAT Malang Kota melayani pembayaran PKB, pengesahan STNK tahunan, dan penerbitan TNKB baru.</p>',
                'ikon'              => 'currency-dollar',
                'aktif'             => true,
                'urutan'            => 4,
            ],
            [
                'nama'              => 'Izin Keramaian',
                'slug'              => 'izin-keramaian',
                'deskripsi_singkat' => 'Permohonan izin kegiatan/keramaian yang memerlukan pengamanan Polri.',
                'konten'            => '<h3>Layanan Izin Keramaian</h3><p>Setiap kegiatan yang berpotensi menimbulkan keramaian wajib memiliki izin dari kepolisian setempat.</p><h4>Persyaratan</h4><ul><li>Surat permohonan dari penyelenggara</li><li>Denah lokasi kegiatan</li><li>Perkiraan jumlah peserta</li></ul>',
                'ikon'              => 'users',
                'aktif'             => true,
                'urutan'            => 5,
            ],
            [
                'nama'              => 'Jogo Malang Presisi',
                'slug'              => 'jogo-malang-presisi',
                'deskripsi_singkat' => 'Program keamanan lingkungan berbasis komunitas Polres Malang.',
                'konten'            => '<h3>Jogo Malang Presisi</h3><p>Program Jogo Malang Presisi merupakan inovasi Polres Malang dalam membangun sinergi antara polisi dan masyarakat untuk menjaga keamanan lingkungan secara bersama-sama.</p>',
                'ikon'              => 'home',
                'aktif'             => true,
                'urutan'            => 6,
            ],
            [
                'nama'              => 'Pelayanan Reskrim',
                'slug'              => 'pelayanan-reskrim',
                'deskripsi_singkat' => 'Layanan penyelidikan dan penyidikan tindak pidana oleh Satuan Reskrim.',
                'konten'            => '<h3>Pelayanan Reskrim</h3><p>Satuan Reserse Kriminal (Satreskrim) Polres Malang menangani proses penyelidikan dan penyidikan berbagai jenis tindak pidana.</p>',
                'ikon'              => 'magnifying-glass',
                'aktif'             => true,
                'urutan'            => 7,
            ],
            [
                'nama'              => 'Jenguk Tahanan',
                'slug'              => 'jenguk-tahanan',
                'deskripsi_singkat' => 'Informasi prosedur dan jadwal kunjungan tahanan di Rutan Polres Malang.',
                'konten'            => '<h3>Layanan Jenguk Tahanan</h3><p>Kunjungan tahanan dilayani setiap hari kerja dengan prosedur yang telah ditetapkan.</p><h4>Ketentuan Kunjungan</h4><ul><li>Membawa KTP pengunjung</li><li>Pengunjung tidak dalam keadaan mabuk</li><li>Waktu kunjungan maksimal 30 menit</li></ul>',
                'ikon'              => 'heart',
                'aktif'             => true,
                'urutan'            => 8,
            ],
            [
                'nama'              => 'Super App Presisi',
                'slug'              => 'super-app-presisi',
                'deskripsi_singkat' => 'Aplikasi layanan Polri terintegrasi dalam genggaman tangan Anda.',
                'konten'            => '<h3>Super App Presisi</h3><p>Super App Presisi adalah platform digital Polri yang mengintegrasikan berbagai layanan kepolisian ke dalam satu aplikasi.</p>',
                'ikon'              => 'device-phone-mobile',
                'url_eksternal'     => 'https://presisi.polri.go.id/',
                'aktif'             => true,
                'urutan'            => 9,
            ],
            [
                'nama'              => 'Sosialisasi Bahaya Narkoba',
                'slug'              => 'sosialisasi-bahaya-narkoba',
                'deskripsi_singkat' => 'Program edukasi dan sosialisasi bahaya narkotika kepada masyarakat.',
                'konten'            => '<h3>Sosialisasi Bahaya Narkoba</h3><p>Satuan Reserse Narkoba Polres Malang aktif melaksanakan program sosialisasi di sekolah, kampus, dan komunitas masyarakat.</p>',
                'ikon'              => 'exclamation-triangle',
                'aktif'             => true,
                'urutan'            => 10,
            ],
        ];

        foreach ($layanans as $layanan) {
            Layanan::firstOrCreate(['slug' => $layanan['slug']], $layanan);
        }

        $this->command->info('✅ Layanan seeded (' . count($layanans) . ' layanan).');
    }
}
