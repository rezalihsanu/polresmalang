<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'nama_instansi',     'value' => 'Polres Malang',                           'group' => 'general', 'label' => 'Nama Instansi'],
            ['key' => 'singkatan',         'value' => 'Polres Malang',                           'group' => 'general', 'label' => 'Singkatan'],
            ['key' => 'tagline',           'value' => 'Melayani, Melindungi, dan Mengayomi Masyarakat', 'group' => 'general', 'label' => 'Tagline'],
            ['key' => 'logo',              'value' => null,                                              'group' => 'general', 'label' => 'Logo'],
            ['key' => 'favicon',           'value' => null,                                              'group' => 'general', 'label' => 'Favicon'],
            ['key' => 'meta_description',  'value' => 'Website resmi Polres Malang — pusat informasi, layanan publik, dan pengaduan masyarakat.', 'group' => 'general', 'label' => 'Meta Description'],

            // Contact
            ['key' => 'alamat',            'value' => 'Jl. Jaksa Agung Suprapto No.19, Klojen, Kota Malang, Jawa Timur 65111', 'group' => 'contact', 'label' => 'Alamat'],
            ['key' => 'telepon',           'value' => '(0341) 362044',   'group' => 'contact', 'label' => 'Telepon'],
            ['key' => 'email_kontak',      'value' => 'polrestamalang@gmail.com', 'group' => 'contact', 'label' => 'Email Kontak'],
            ['key' => 'nomor_darurat',     'value' => '110',              'group' => 'contact', 'label' => 'Nomor Darurat'],
            ['key' => 'jam_pelayanan',     'value' => 'Senin – Jumat: 08.00 – 15.00 WIB', 'group' => 'contact', 'label' => 'Jam Pelayanan'],
            ['key' => 'google_maps_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.5456!2d112.6286!3d-7.9826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zUG9scmVzdGEgTWFsYW5nIEtvdGE!5e0!3m2!1sid!2sid!4v1000000000000', 'group' => 'contact', 'label' => 'Google Maps Embed URL'],

            // Social Media
            ['key' => 'instagram',  'value' => 'https://www.instagram.com/polrestamalangkota/', 'group' => 'social', 'label' => 'Instagram'],
            ['key' => 'facebook',   'value' => 'https://www.facebook.com/polrestamalangkota',   'group' => 'social', 'label' => 'Facebook'],
            ['key' => 'twitter',    'value' => 'https://twitter.com/polrestamlgkota',           'group' => 'social', 'label' => 'Twitter / X'],
            ['key' => 'youtube',    'value' => 'https://www.youtube.com/@polrestamalangkota',   'group' => 'social', 'label' => 'YouTube'],
            ['key' => 'tiktok',     'value' => 'https://www.tiktok.com/@polrestamalangkota',    'group' => 'social', 'label' => 'TikTok'],
            ['key' => 'threads',    'value' => '',                                               'group' => 'social', 'label' => 'Threads'],

            // Hero / Beranda
            ['key' => 'hero_title',    'value' => 'Polres Malang',                      'group' => 'hero', 'label' => 'Hero Title'],
            ['key' => 'hero_subtitle', 'value' => 'Melayani, Melindungi, dan Mengayomi Masyarakat Kota Malang', 'group' => 'hero', 'label' => 'Hero Subtitle'],
            ['key' => 'super_app_url', 'value' => 'https://presisi.polri.go.id/',              'group' => 'hero', 'label' => 'URL Super App Presisi'],
        ];

        foreach ($settings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }

        $this->command->info('✅ Settings seeded.');
    }
}
