<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KategoriBerita;
use App\Models\Berita;
use App\Models\User;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::whereHas('roles', fn ($q) => $q->where('name', 'superadmin'))->first();

        $kategoris = [
            ['nama' => 'Berita Umum',        'slug' => 'berita-umum',        'deskripsi' => 'Informasi umum kegiatan Polres Malang'],
            ['nama' => 'Pengungkapan Kasus', 'slug' => 'pengungkapan-kasus', 'deskripsi' => 'Berita pengungkapan kasus kriminal'],
            ['nama' => 'Kegiatan Sosial',    'slug' => 'kegiatan-sosial',    'deskripsi' => 'Kegiatan bakti sosial dan kemasyarakatan'],
            ['nama' => 'Humas & Protokol',   'slug' => 'humas-protokol',     'deskripsi' => 'Berita dari bidang humas dan protokoler'],
            ['nama' => 'Lalu Lintas',        'slug' => 'lalu-lintas',        'deskripsi' => 'Informasi dan imbauan lalu lintas'],
        ];

        foreach ($kategoris as $kat) {
            KategoriBerita::firstOrCreate(['slug' => $kat['slug']], $kat);
        }

        $katUmum    = KategoriBerita::where('slug', 'berita-umum')->first();
        $katSosial  = KategoriBerita::where('slug', 'kegiatan-sosial')->first();
        $katLantas  = KategoriBerita::where('slug', 'lalu-lintas')->first();

        $beritas = [
            [
                'judul'             => 'Polres Malang Gelar Apel Besar Dalam Rangka HUT Bhayangkara ke-79',
                'slug'              => 'polresta-malang-kota-gelar-apel-besar-hut-bhayangkara-79',
                'ringkasan'         => 'Polres Malang menggelar apel besar dalam rangka peringatan Hari Ulang Tahun (HUT) Bhayangkara ke-79 yang dihadiri seluruh personel.',
                'konten'            => '<p>Polres Malang menggelar apel besar dalam rangka peringatan Hari Ulang Tahun (HUT) Bhayangkara ke-79. Kegiatan ini dihadiri oleh seluruh personel Polres Malang beserta jajaran satuan kerja di lingkungan Polres Malang.</p><p>KaPolres Malang memimpin langsung upacara tersebut dan menyampaikan amanat mengenai pentingnya menjaga integritas dan profesionalisme anggota Polri dalam melayani masyarakat.</p>',
                'kategori_berita_id' => $katUmum?->id,
                'status'            => 'publish',
                'highlight'         => true,
                'published_at'      => now()->subDays(2),
                'meta_description'  => 'Polres Malang gelar apel besar HUT Bhayangkara ke-79 dihadiri seluruh personel.',
            ],
            [
                'judul'             => 'Jogo Malang Presisi: Polresta Intensifkan Patroli Malam di Kawasan Rawan',
                'slug'              => 'jogo-malang-presisi-polresta-intensifkan-patroli-malam',
                'ringkasan'         => 'Dalam rangka program Jogo Malang Presisi, Polres Malang mengintensifkan kegiatan patroli malam di sejumlah titik rawan kejahatan.',
                'konten'            => '<p>Polres Malang terus mengintensifkan kegiatan patroli malam dalam rangka program Jogo Malang Presisi. Patroli dilaksanakan di sejumlah titik yang dipetakan sebagai kawasan rawan kejahatan berdasarkan data Crime Mapping yang dimiliki oleh Satuan Reserse Kriminal.</p>',
                'kategori_berita_id' => $katUmum?->id,
                'status'            => 'publish',
                'highlight'         => true,
                'published_at'      => now()->subDays(5),
                'meta_description'  => 'Polresta intensifkan patroli malam Jogo Malang Presisi di kawasan rawan kejahatan.',
            ],
            [
                'judul'             => 'Polres Malang Bagikan Sembako kepada Warga Kurang Mampu',
                'slug'              => 'polresta-malang-kota-bagikan-sembako-warga-kurang-mampu',
                'ringkasan'         => 'Sebagai bentuk kepedulian sosial, Polres Malang membagikan ratusan paket sembako kepada warga kurang mampu di wilayah hukumnya.',
                'konten'            => '<p>Polres Malang kembali menunjukkan kepedulian terhadap masyarakat dengan membagikan ratusan paket sembako kepada warga kurang mampu. Kegiatan bakti sosial ini merupakan bagian dari program rutin Polresta sebagai bentuk kehadiran polisi di tengah masyarakat.</p>',
                'kategori_berita_id' => $katSosial?->id,
                'status'            => 'publish',
                'highlight'         => false,
                'published_at'      => now()->subDays(7),
                'meta_description'  => 'Polres Malang bagikan ratusan paket sembako kepada warga kurang mampu.',
            ],
            [
                'judul'             => 'Imbauan Keselamatan Berlalu Lintas Jelang Libur Akhir Tahun',
                'slug'              => 'imbauan-keselamatan-berlalu-lintas-jelang-libur-akhir-tahun',
                'ringkasan'         => 'Satlantas Polres Malang mengimbau masyarakat untuk selalu mematuhi aturan lalu lintas menjelang libur akhir tahun.',
                'konten'            => '<p>Menjelang periode libur akhir tahun, Satuan Lalu Lintas (Satlantas) Polres Malang mengimbau seluruh pengguna jalan untuk meningkatkan ketertiban dan keselamatan berlalu lintas. Patroli lalu lintas akan diperketat di sejumlah titik strategis.</p>',
                'kategori_berita_id' => $katLantas?->id,
                'status'            => 'publish',
                'highlight'         => false,
                'published_at'      => now()->subDays(10),
                'meta_description'  => 'Imbauan keselamatan berlalu lintas dari Satlantas Polres Malang jelang libur akhir tahun.',
            ],
            [
                'judul'             => 'Draft: Program Pencegahan Narkoba di Lingkungan Sekolah',
                'slug'              => 'draft-program-pencegahan-narkoba-sekolah',
                'ringkasan'         => 'Draft berita program sosialisasi bahaya narkoba.',
                'konten'            => '<p>Konten masih dalam proses penulisan.</p>',
                'kategori_berita_id' => $katSosial?->id,
                'status'            => 'draft',
                'highlight'         => false,
                'published_at'      => null,
                'meta_description'  => null,
            ],
        ];

        foreach ($beritas as $berita) {
            Berita::firstOrCreate(
                ['slug' => $berita['slug']],
                array_merge($berita, ['user_id' => $admin?->id])
            );
        }

        $this->command->info('✅ Berita seeded (' . count($beritas) . ' artikel).');
    }
}
