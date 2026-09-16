<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->nullable()->constrained('layanans')->onDelete('set null');
            $table->string('nomor_tiket')->unique();
            $table->string('nama_pelapor');
            $table->string('nik')->nullable();
            $table->string('email_pelapor');
            $table->string('no_hp_pelapor');
            $table->text('alamat')->nullable();
            $table->string('kategori')->nullable();
            $table->string('judul')->nullable();
            $table->text('isi_pengaduan');
            $table->string('lampiran')->nullable();
            $table->enum('status', ['baru', 'diproses', 'selesai', 'ditolak'])->default('baru');
            $table->text('tanggapan')->nullable();
            $table->foreignId('ditangani_oleh')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('ditangani_pada')->nullable();
            $table->string('ip_address')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('nomor_tiket');
            $table->index('email_pelapor');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
