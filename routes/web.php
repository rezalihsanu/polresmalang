<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\KategoriBeritaController as AdminKategoriBeritaController;
use App\Http\Controllers\Admin\LayananController as AdminLayananController;
use App\Http\Controllers\Admin\SatuanPejabatController as AdminSatuanPejabatController;
use App\Http\Controllers\Admin\PengaduanController as AdminPengaduanController;
use App\Http\Controllers\Admin\DokumenController as AdminDokumenController;
use App\Http\Controllers\Admin\KegiatanGaleriController as AdminKegiatanGaleriController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Web Routes — Polres Malang
|--------------------------------------------------------------------------
*/

// =========================================
// PUBLIC ROUTES
// =========================================

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');

// Berita
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Layanan Publik
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan.index');
Route::get('/layanan/{slug}', [LayananController::class, 'show'])->name('layanan.show');

// Struktur Organisasi
Route::get('/organisasi', [OrganisasiController::class, 'index'])->name('organisasi');

// Pengaduan Masyarakat
Route::get('/pengaduan', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
Route::get('/pengaduan/sukses', [PengaduanController::class, 'sukses'])->name('pengaduan.sukses');
Route::get('/pengaduan/lacak', [PengaduanController::class, 'lacak'])->name('pengaduan.lacak');

// Dokumen Publik / PPID
Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
Route::get('/dokumen/{dokumen}/download', [DokumenController::class, 'download'])->name('dokumen.download');

// Galeri & Kegiatan
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');
Route::get('/galeri/{slug}', [GaleriController::class, 'show'])->name('galeri.show');

// Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');


// =========================================
// AUTH ROUTES (ADMIN LOGIN / LOGOUT)
// =========================================

Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [LoginController::class, 'login']);
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('logout');


// =========================================
// ADMIN PANEL ROUTES (PROTECTED BY AUTH)
// =========================================

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Berita
    Route::resource('berita', AdminBeritaController::class);

    // Kategori Berita
    Route::resource('kategori-berita', AdminKategoriBeritaController::class)->except(['create', 'show', 'edit']);

    // Layanan Publik
    Route::resource('layanan', AdminLayananController::class);

    // Satuan & Pejabat (Organisasi)
    Route::get('/organisasi', [AdminSatuanPejabatController::class, 'index'])->name('organisasi.index');
    Route::post('/organisasi/satuan', [AdminSatuanPejabatController::class, 'storeSatuan'])->name('organisasi.satuan.store');
    Route::delete('/organisasi/satuan/{satuan}', [AdminSatuanPejabatController::class, 'destroySatuan'])->name('organisasi.satuan.destroy');
    Route::post('/organisasi/pejabat', [AdminSatuanPejabatController::class, 'storePejabat'])->name('organisasi.pejabat.store');
    Route::put('/organisasi/pejabat/{pejabat}', [AdminSatuanPejabatController::class, 'updatePejabat'])->name('organisasi.pejabat.update');
    Route::delete('/organisasi/pejabat/{pejabat}', [AdminSatuanPejabatController::class, 'destroyPejabat'])->name('organisasi.pejabat.destroy');

    // Pengaduan
    Route::get('/pengaduan', [AdminPengaduanController::class, 'index'])->name('pengaduan.index');
    Route::get('/pengaduan/{pengaduan}', [AdminPengaduanController::class, 'show'])->name('pengaduan.show');
    Route::put('/pengaduan/{pengaduan}/status', [AdminPengaduanController::class, 'updateStatus'])->name('pengaduan.update-status');
    Route::delete('/pengaduan/{pengaduan}', [AdminPengaduanController::class, 'destroy'])->name('pengaduan.destroy');

    // Dokumen Publik
    Route::resource('dokumen', AdminDokumenController::class)->only(['index', 'store', 'destroy']);

    // Kegiatan & Galeri
    Route::resource('kegiatan', AdminKegiatanGaleriController::class);
    Route::delete('/galeri/{galeri}', [AdminKegiatanGaleriController::class, 'destroyFoto'])->name('galeri.destroy');

    // Settings (Kontak & Medsos)
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');

    // User / Admin Management (Role Superadmin)
    Route::middleware(['role:superadmin'])->group(function () {
        Route::resource('users', AdminUserController::class)->except(['create', 'show', 'edit']);
    });
});
