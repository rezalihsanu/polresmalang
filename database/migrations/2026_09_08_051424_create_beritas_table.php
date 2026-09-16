<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('set null')->nullable();
            $table->foreignId('kategori_berita_id')->nullable()->constrained('kategori_beritas')->onDelete('set null');
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->string('gambar_utama')->nullable();
            $table->string('alt_gambar')->nullable();
            $table->enum('status', ['draft', 'publish'])->default('draft');
            $table->boolean('highlight')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->string('meta_description')->nullable();
            $table->unsignedInteger('view_count')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'published_at']);
            $table->index('highlight');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
