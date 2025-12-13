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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title');                          // Judul berita
            $table->text('content');                          // Isi berita (bisa panjang)
            $table->string('slug')->unique();                 // Untuk URL cantik: /berita/ini-judul-berita
            $table->string('source')->nullable();             // Sumber berita: "Kontan", "CNBC", "Bisnis.com", dll.
            $table->date('news_date')->nullable();            // Tanggal berita (bukan tanggal input)
            $table->string('image')->nullable();              // URL atau path gambar berita
            $table->string('tipe')->default('manual');        // manual | scraped | prediksi
            // Jika nanti mau pakai enum, bisa ganti jadi: $table->enum('tipe', ['manual', 'scraped', 'prediksi'])->default('manual');

            // Sentimen dari NLP (bisa diisi otomatis atau manual)
            $table->enum('sentiment', ['positif', 'negatif', 'netral'])
                  ->default('netral');
            $table->float('sentiment_score', 5, 4)->nullable(); // contoh: 0.8421

            // Relasi ke saham yang dibahas (opsional, untuk fitur lanjutan)
            $table->string('stock_code')->nullable();         // contoh: BBCA, TLKM, dll.
            
            // Siapa yang input berita (admin atau sistem)
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');

            $table->boolean('is_published')->default(true);     // tampilkan di frontend atau tidak
            $table->timestamps();                             // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};