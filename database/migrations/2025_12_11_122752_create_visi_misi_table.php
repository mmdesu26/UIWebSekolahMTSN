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
        Schema::create('visi_misi', function (Blueprint $table) {
            $table->id();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->timestamps();
        });

        // Insert default data
        DB::table('visi_misi')->insert([
            'id' => 1,
            'visi' => 'Menjadi lembaga pendidikan Islam yang unggul dalam prestasi, berakhlak mulia, dan berwawasan global.',
            'misi' => "1. Menyelenggarakan pendidikan yang berkualitas berdasarkan nilai-nilai Islam\n2. Mengembangkan potensi peserta didik secara optimal\n3. Menciptakan lingkungan belajar yang kondusif dan inspiratif\n4. Membangun karakter peserta didik yang berakhlak mulia\n5. Mempersiapkan generasi yang kompeten dan berdaya saing global",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visi_misi');
    }
};