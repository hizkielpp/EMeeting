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
            $table->string('nama_rapat');
            $table->datetime('tanggal_rapat');
            $table->string('tempat');
            $table->string('pemimpin_rapat');
            $table->string('pencatat');
            $table->string('nama_jabatan_pejabat');
            $table->text('tanda_tangan_pejabat');
            $table->text('nama_pejabat');
            $table->text('NIP_pejabat');
            $table->string('nama_jabatan_KSM')->nullable();
            $table->text('tanda_tangan_KSM')->nullable();
            $table->text('nama_KSM')->nullable();
            $table->text('NIP_KSM')->nullable();
            $table->string('bukti_presensi_kehadiran');
            $table->string('file_pendukung_rapat')->nullable();
            $table->text('persoalan_yang_dibahas');
            $table->text('tanggapan_peserta_rapat');
            $table->text('simpulan');
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
