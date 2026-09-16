<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Layanan;
use App\Models\Pengaduan;
use App\Models\Dokumen;
use App\Models\Kegiatan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_berita'      => Berita::count(),
            'berita_publish'    => Berita::published()->count(),
            'total_layanan'     => Layanan::count(),
            'total_pengaduan'   => Pengaduan::count(),
            'pengaduan_baru'    => Pengaduan::baru()->count(),
            'pengaduan_diproses'=> Pengaduan::byStatus('diproses')->count(),
            'pengaduan_selesai' => Pengaduan::byStatus('selesai')->count(),
            'total_dokumen'     => Dokumen::count(),
            'total_kegiatan'    => Kegiatan::count(),
            'total_admin'       => User::count(),
        ];

        $latestPengaduans = Pengaduan::latest()->take(5)->get();
        $latestBeritas    = Berita::with('penulis')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestPengaduans', 'latestBeritas'));
    }
}
