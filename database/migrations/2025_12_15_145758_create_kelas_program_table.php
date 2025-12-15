<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelas_program', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('icon_class'); // contoh: 'fa-flask', 'fa-atom'
            $table->string('warna', 20); // contoh: '#9B59B6'
            $table->json('fitur')->nullable(); // array fitur-fitur program
            $table->enum('kategori', ['unggulan', 'kelas'])->default('kelas');
            $table->integer('urutan')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_program');
    }
};