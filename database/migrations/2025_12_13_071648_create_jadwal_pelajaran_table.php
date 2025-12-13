<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
            $table->id();
            $table->string('kelas'); // 7, 8, 9
            $table->string('hari'); // Senin, Selasa, dst
            $table->string('jam_mulai'); // 07:00
            $table->string('jam_selesai'); // 07:40
            $table->string('mata_pelajaran');
            $table->boolean('is_istirahat')->default(false);
            $table->integer('urutan')->default(0); // untuk sorting
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_pelajaran');
    }
};