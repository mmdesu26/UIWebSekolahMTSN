<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sejarah', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
        
        // Insert default data
        DB::table('sejarah')->insert([
            'content' => 'MTsN 1 Magetan didirikan pada tahun 1975 sebagai salah satu lembaga pendidikan menengah pertama di Kabupaten Magetan. Sekolah ini telah berkembang menjadi salah satu sekolah terkemuka di daerah ini dengan fasilitas modern dan tenaga pengajar yang berpengalaman.',
            'gambar' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('sejarah');
    }
};