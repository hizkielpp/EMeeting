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
            $table->unsignedBigInteger('fk_unit');
            $table->foreign('fk_unit')->references('id')->on('units');
            $table->unsignedBigInteger('fk_user');
            $table->foreign('fk_user')->references('id')->on('users');
            $table->string('nama_rapat');
            $table->datetime('tanggal_rapat');
            $table->string('tempat');
            $table->string('pemimpin_rapat');
            // $table->string('pencatat');
            $table->string('nama_jabatan_pejabat')->nullable();
            $table->text('tanda_tangan_pejabat')->nullable();
            $table->text('nama_pejabat')->nullable();
            $table->text('NIP_pejabat')->nullable();
            $table->string('nama_jabatan_KSM')->nullable();
            $table->text('tanda_tangan_KSM')->nullable();
            $table->text('nama_KSM')->nullable();
            $table->text('NIP_KSM')->nullable();
            $table->string('bukti_presensi_kehadiran')->nullable();
            $table->string('file_pendukung_rapat')->nullable();
            $table->text('mahasiswa')->nullable();
            $table->text('dosen')->nullable();
            $table->text('tendik')->nullable();
            $table->text('sarpras')->nullable();
            $table->text('lain_lain')->nullable();
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
