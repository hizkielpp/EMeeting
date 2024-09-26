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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_user');
            $table->foreign('fk_user')->references('id')->on('users');
            $table->date('tanggal_rapat');
            $table->text('mahasiswa');
            $table->text('dosen');
            $table->text('tendik');
            $table->text('sarpras');
            $table->text('lain_lain');
            $table->string('bukti_presensi_kehadiran');
            $table->string('file_pendukung_rapat')->nullable();
            $table->text('tanda_tangan_kadep');
            $table->text('tanda_tangan_kaprodi');
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
        Schema::dropIfExists('laporans');
    }
};