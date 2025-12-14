<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ppdbs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->date('dibuka');
            $table->date('ditutup');
            $table->integer('kuota');
            $table->text('persyaratan');
            $table->text('konten');
            $table->json('timeline')->nullable(); // Kolom untuk menyimpan jadwal
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('ppdbs');
    }
};