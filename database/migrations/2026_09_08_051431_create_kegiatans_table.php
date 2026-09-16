<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('deskripsi')->nullable();
            $table->string('cover')->nullable();
            $table->string('foto_utama')->nullable();
            $table->string('lokasi')->nullable();
            $table->date('tanggal_kegiatan')->nullable();
            $table->boolean('tampil_beranda')->default(false);
            $table->timestamps();

            $table->index('tanggal_kegiatan');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kegiatans');
    }
};
