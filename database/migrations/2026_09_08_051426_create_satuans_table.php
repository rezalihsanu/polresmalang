<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('satuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('satuans')->onDelete('set null');
            $table->string('nama');
            $table->string('singkatan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->unsignedSmallInteger('level')->default(1); // 1=Polresta, 2=Bag/Sat, 3=Unit
            $table->unsignedSmallInteger('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('satuans');
    }
};
