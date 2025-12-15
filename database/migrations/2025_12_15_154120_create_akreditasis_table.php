<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('akreditasis', function (Blueprint $table) {
        $table->id();
        $table->string('peringkat');        // A / B / dll
        $table->string('nomor_sk');
        $table->date('tanggal_sk');
        $table->text('keterangan')->nullable();
        $table->timestamps();
    });

    // Insert data default
    DB::table('akreditasis')->insert([
        'peringkat' => 'A',
        'nomor_sk' => '1179/BAN-SM/SK/2021',
        'tanggal_sk' => '2021-11-16',
        'keterangan' => 'Terakreditasi A (Sangat Baik) oleh BAN-S/M',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasis');
    }
};
