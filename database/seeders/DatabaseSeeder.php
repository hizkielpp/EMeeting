<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('units')->insert(['nama_unit' => 'Departemen Kedokteran']);
        DB::table('units')->insert(['nama_unit' => 'Departemen Kedokteran Spesialis']);
        DB::table('units')->insert(['nama_unit' => 'Departemen Ilmu Keperawatan']);
        DB::table('units')->insert(['nama_unit' => 'Departemen Gizi']);
        DB::table('units')->insert(['nama_unit' => 'llmu Kesehatan THT-KL']);
        DB::table('units')->insert(['nama_unit' => 'Ophthalmologi']);
        DB::table('units')->insert(['nama_unit' => 'Patologi Klinik']);
        DB::table('units')->insert(['nama_unit' => 'llmu Bedah']);
        DB::table('units')->insert(['nama_unit' => 'llmu Penyakit Dalam']);
        DB::table('units')->insert(['nama_unit' => 'Dermatologi, Venereologi dan Estetika']);
        DB::table('units')->insert(['nama_unit' => 'Mikrobiologi Klinik']);
        DB::table('units')->insert(['nama_unit' => 'Jantung dan Pembuluh Darah']);
        DB::table('units')->insert(['nama_unit' => 'Obsgin']);
        DB::table('units')->insert(['nama_unit' => 'llmu Kesehatan Anak']);
        DB::table('units')->insert(['nama_unit' => 'llmu Kesehatan Jiwa']);
        DB::table('units')->insert(['nama_unit' => 'Neurologi']);
        DB::table('units')->insert(['nama_unit' => 'Patologi Anatomik']);
        DB::table('units')->insert(['nama_unit' => 'Anestesiologi dan Terapi lntensif']);
        DB::table('units')->insert(['nama_unit' => 'Radiologi']);
        DB::table('units')->insert(['nama_unit' => 'llmu Kedokteran Forensik dan Medikolegal']);
        DB::table('units')->insert(['nama_unit' => 'Gizi Klinik']);
        DB::table('units')->insert(['nama_unit' => 'llmu Kedokteran Fisik & Rehabilitasi']);
        DB::table('units')->insert(['nama_unit' => 'Bedah Saraf']);
        DB::table('units')->insert(['nama_unit' => 'Sub Spesialis llmu Bedah']);
        DB::table('units')->insert(['nama_unit' => 'Sub Spesialis llmu Penyakit Dalam']);
        DB::table('units')->insert(['nama_unit' => 'DIKK']);
        DB::table('units')->insert(['nama_unit' => 'MEDU']);
        DB::table('units')->insert(['nama_unit' => 'DMSC']);
        DB::table('units')->insert(['nama_unit' => 'Komisi Etik Penelitian Kesehatan']);
        DB::table('units')->insert(['nama_unit' => 'Skill Laboratorium']);
        DB::table('units')->insert(['nama_unit' => 'Lab Uji Hewan Coba']);
        DB::table('units')->insert(['nama_unit' => 'Lab Sentral']);
        DB::table('units')->insert(['nama_unit' => 'Parasitologi']);
        DB::table('units')->insert(['nama_unit' => 'S1 Kedokteran']);
        DB::table('units')->insert(['nama_unit' => 'Profesi Dokter']);
        DB::table('units')->insert(['nama_unit' => 'Biologi Kedokteran dan Biokimia']);
        DB::table('units')->insert(['nama_unit' => 'Magister llmu Biomedik']);
        DB::table('units')->insert(['nama_unit' => 'Anatomi - Histologi']);
        DB::table('units')->insert(['nama_unit' => 'Fisiologi']);
        DB::table('units')->insert(['nama_unit' => 'Farmasi']);
        DB::table('units')->insert(['nama_unit' => 'IKM']);
        DB::table('units')->insert(['nama_unit' => 'Farmakologi & Terapi']);
        DB::table('units')->insert(['nama_unit' => 'Kedokteran Gigi']);
        DB::table('units')->insert(['nama_unit' => 'Profesi Dokter Gigi']);
        DB::table('units')->insert(['nama_unit' => 'S1 Gizi']);
        DB::table('units')->insert(['nama_unit' => 'Magister llmu Gizi']);
        DB::table('units')->insert(['nama_unit' => 'Dietisien']);
        DB::table('units')->insert(['nama_unit' => 'Profesi Ners']);
        DB::table('units')->insert(['nama_unit' => 'S1 Keperawatan']);
        DB::table('units')->insert(['nama_unit' => 'Magister Keperawatan']);
        DB::table('units')->insert(['nama_unit' => 'Keuangan']);
        DB::table('units')->insert(['nama_unit' => 'Kepegawaian']);
        DB::table('units')->insert(['nama_unit' => 'Akademik']);
        DB::table('units')->insert(['nama_unit' => 'TPMF']);
        DB::table('units')->insert(['nama_unit' => 'UPA']);
        DB::table('units')->insert(['nama_unit' => 'UP3']);
        DB::table('units')->insert(['nama_unit' => 'KUI']);
        DB::table('units')->insert(['nama_unit' => 'Kemahasiswaan']);
        DB::table('units')->insert(['nama_unit' => 'Perpustakaan']);
        DB::table('units')->insert(['nama_unit' => 'Dekan']);
        DB::table('units')->insert(['nama_unit' => 'Wakil Dekan Sumberdaya']);
        DB::table('units')->insert(['nama_unit' => 'Wakil Dekan Akademik dan Kemahasiwaan']);
        (new User(['username' => 'Yan Wisnu Prajoko', 'fk_unit' => 60,  'role' => 'pimpinan', 'email' => 'dekan@gmail.com', 'password' => 'password']))->save();
        (new User(['username' => 'Hizkiel Putra Pakubumi', 'fk_unit' => 34,  'role' => 'bawahan', 'email' => 'hizkiel@gmail.com', 'password' => 'password']))->save();
        (new User(['username' => 'Pradipta Ary', 'fk_unit' => 34,  'role' => 'bawahan', 'email' => 'ipung@gmail.com', 'password' => 'password']))->save();
        (new User(['username' => 'Damianus Ardi', 'fk_unit' => 53, 'role' => 'admin', 'email' => 'ardi@gmail.com', 'password' => 'password']))->save();
        // (new Laporan([
        //     'fk_unit' => 34,
        //     'fk_user' => 2,
        //     'nama_rapat' => 'Rapat X',
        //     'tanggal_rapat' => now(),
        //     'tempat' => 'RSG',
        //     'pemimpin_rapat' => 'Bu Agnes',
        //     'nama_jabatan_pejabat' => 'Manager',
        //     'tanda_tangan_pejabat' => 'signature.jpg',
        //     'NIP_pejabat' => 123456789,
        // ]))->save();
    }
}
