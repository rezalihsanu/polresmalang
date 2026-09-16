<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Satuan;
use App\Models\Pejabat;

class SatuanPejabatSeeder extends Seeder
{
    public function run(): void
    {
        // Level 1: Polresta (Root)
        $polresta = Satuan::firstOrCreate(
            ['nama' => 'Polres Malang'],
            ['singkatan' => 'Polresta', 'level' => 1, 'urutan' => 1,
             'deskripsi' => 'Kepolisian Resor Kota Malang']
        );

        // Kapolresta
        Pejabat::firstOrCreate(
            ['nrp' => '80010001'],
            [
                'satuan_id'     => $polresta->id,
                'nama'          => 'Kombes Pol. Drs. Budi Hermanto, S.H., M.H.',
                'pangkat'       => 'Komisaris Besar Polisi',
                'nrp'           => '80010001',
                'jabatan'       => 'KaPolres Malang',
                'is_kapolresta' => true,
                'urutan'        => 1,
            ]
        );
        Pejabat::firstOrCreate(
            ['nrp' => '80010002'],
            [
                'satuan_id' => $polresta->id,
                'nama'      => 'AKBP Drs. Agus Wahyudi, M.Si.',
                'pangkat'   => 'Ajun Komisaris Besar Polisi',
                'nrp'       => '80010002',
                'jabatan'   => 'WakaPolres Malang',
                'urutan'    => 2,
            ]
        );

        // Level 2: Bag / Sat
        $satuanList = [
            ['nama' => 'Bagian Operasi',              'singkatan' => 'Bagops',      'urutan' => 1],
            ['nama' => 'Bagian SDM',                  'singkatan' => 'Bagsdm',      'urutan' => 2],
            ['nama' => 'Satuan Intelkam',             'singkatan' => 'Satintelkam', 'urutan' => 3],
            ['nama' => 'Satuan Reserse Kriminal',     'singkatan' => 'Satreskrim',  'urutan' => 4],
            ['nama' => 'Satuan Reserse Narkoba',      'singkatan' => 'Satresnarkoba', 'urutan' => 5],
            ['nama' => 'Satuan Lalu Lintas',          'singkatan' => 'Satlantas',   'urutan' => 6],
            ['nama' => 'Satuan Samapta Bhayangkara',  'singkatan' => 'Satsabhara',  'urutan' => 7],
            ['nama' => 'Satuan Binmas',               'singkatan' => 'Satbinmas',   'urutan' => 8],
            ['nama' => 'SPKT',                        'singkatan' => 'SPKT',        'urutan' => 9],
            ['nama' => 'Bagian Humas',                'singkatan' => 'Baghumas',    'urutan' => 10],
        ];

        $jabatanKasat = [
            'Satuan Reserse Kriminal'    => ['nama' => 'Kompol Drs. Rudi Santoso, S.H.', 'pangkat' => 'Komisaris Polisi', 'jabatan' => 'Kasatreskrim', 'nrp' => '80020004'],
            'Satuan Lalu Lintas'         => ['nama' => 'Kompol Hendra Prasetyo, S.H.', 'pangkat' => 'Komisaris Polisi', 'jabatan' => 'Kasatlantas', 'nrp' => '80020006'],
            'Satuan Reserse Narkoba'     => ['nama' => 'Kompol Andi Firmansyah, S.H.', 'pangkat' => 'Komisaris Polisi', 'jabatan' => 'Kasatresnarkoba', 'nrp' => '80020005'],
            'Satuan Binmas'              => ['nama' => 'AKP Dra. Sri Rahayu, M.Si.', 'pangkat' => 'Ajun Komisaris Polisi', 'jabatan' => 'Kasatbinmas', 'nrp' => '80020008'],
        ];

        foreach ($satuanList as $sat) {
            $satuan = Satuan::firstOrCreate(
                ['nama' => $sat['nama']],
                ['singkatan' => $sat['singkatan'], 'parent_id' => $polresta->id, 'level' => 2, 'urutan' => $sat['urutan']]
            );

            // Tambah pejabat kepala satuan jika ada
            if (isset($jabatanKasat[$sat['nama']])) {
                $pej = $jabatanKasat[$sat['nama']];
                Pejabat::firstOrCreate(
                    ['nrp' => $pej['nrp']],
                    array_merge($pej, ['satuan_id' => $satuan->id, 'urutan' => 1])
                );
            }
        }

        $this->command->info('✅ Satuan & Pejabat seeded.');
    }
}
