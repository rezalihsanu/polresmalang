<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('kategori_dokumen_id')->nullable()->constrained('kategori_dokumens')->onDelete('set null');
            $table->string('judul');
            $table->string('slug')->unique()->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_type')->nullable(); // pdf, docx, xlsx, dsb
            $table->unsignedBigInteger('file_size')->nullable(); // bytes
            $table->unsignedSmallInteger('tahun')->nullable();
            $table->boolean('aktif')->default(true);
            $table->unsignedInteger('download_count')->default(0);
            $table->timestamps();

            $table->index(['kategori_dokumen_id', 'aktif']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumens');
    }
};
