<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Kegiatan;
use App\Models\Pejabat;
use App\Models\Setting;
use App\Models\Pengaduan;

class HomeController extends Controller
{
    public function index()
    {
        // Berita highlight untuk Hero/Slider
        $heroBeritas = Berita::with('kategori')
            ->published()
            ->highlight()
            ->latest('published_at')
            ->take(4)
            ->get();

        // 3 Berita Utama Beranda
        $latestBeritas = Berita::with('kategori')
            ->published()
            ->latest('published_at')
            ->take(6)
            ->get();

        // Layanan Publik Utama
        $layanans = Layanan::aktif()
            ->ordered()
            ->take(8)
            ->get();

        // Kegiatan & Galeri Dokumentasi
        $kegiatans = Kegiatan::with('galeris')
            ->latest('tanggal_kegiatan')
            ->take(6)
            ->get();

        // Pejabat Utama (Kapolresta & Wakapolresta)
        $kapolresta = Pejabat::where('jabatan', 'LIKE', '%Kapolresta%')->first();

        // Statistik Singkat
        $stats = [
            'total_berita'   => Berita::published()->count(),
            'total_layanan'  => Layanan::aktif()->count(),
            'total_pengaduan'=> Pengaduan::count(),
            'pengaduan_selesai' => Pengaduan::where('status', 'selesai')->count(),
        ];

        return view('public.beranda', compact(
            'heroBeritas',
            'latestBeritas',
            'layanans',
            'kegiatans',
            'kapolresta',
            'stats'
        ));
    }
}
