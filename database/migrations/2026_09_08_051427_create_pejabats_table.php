<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pejabats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satuan_id')->constrained('satuans')->onDelete('cascade');
            $table->string('nama');
            $table->string('pangkat')->nullable();
            $table->string('nrp')->nullable();
            $table->string('jabatan');
            $table->string('foto')->nullable();
            $table->boolean('is_kapolresta')->default(false);
            $table->unsignedSmallInteger('urutan')->default(0);
            $table->timestamps();

            $table->index(['satuan_id', 'urutan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pejabats');
    }
};
