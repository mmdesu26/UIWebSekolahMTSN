<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->text('image')->nullable()->change(); // unlimited
        });
    }

    public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('image')->nullable()->change();
        });
    }
};