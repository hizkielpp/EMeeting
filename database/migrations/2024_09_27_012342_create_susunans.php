<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('susunans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_laporan');
            $table->foreign('fk_laporan')->references('id')->on('laporans');
            $table->string('nama_susunan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('susunans');
    }
};
