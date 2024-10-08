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
        (new User(['username' => 'Dekan', 'fk_unit' => 60,'nickname' => 'Yan Wisnu Prajoko', 'role' => 'pimpinan', 'email' => 'dekan@gmail.com', 'password' => 'password']))->save();
        (new User(['username' => 'S1 Kedokteran', 'fk_unit' => 34, 'nickname' => 'Hizkiel Putra Pakubumi', 'role' => 'bawahan', 'email' => 's1dokter@gmail.com', 'password' => 'password']))->save();
        (new User(['username' => 'IT', 'nickname' => 'Ardi', 'fk_unit' => 53, 'role' => 'admin', 'email' => 'it@gmail.com', 'password' => 'password']))->save();
        User::all();
        foreach (User::all() as $value) {
            for ($a = 1; $a <= 20; $a++) {
                $laporan = new Laporan([
                    'fk_user' => $value->id,
                    'fk_unit' => $value->fk_unit,
                    'nama_rapat' => 'Rapat ke-' . $a,
                    'tempat' => 'RSG',
                    'pemimpin_rapat' => 'Pak Musa',
                    'pencatat' => 'Pak Wawan',
                    'tanggal_rapat' => '2024-03-' . $a . ' 10:00:00',
                    'bukti_presensi_kehadiran' => '2_48687_2.jpg',
                    'persoalan_yang_dibahas' =>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit, mi a interdum mattis, leo dolor congue nunc, ut suscipit orci arcu sit amet erat. Mauris pellentesque turpis quis velit auctor tincidunt. Mauris suscipit ex ut bibendum semper. Cras quis leo orci. Sed posuere lorem ante, id molestie tortor laoreet a. Nunc sit amet congue felis, sed cursus tellus. Etiam semper ligula lacus, vel semper purus cursus sed. Nullam et efficitur diam, id pharetra velit. In nibh turpis, sollicitudin non viverra eget, convallis sed mi. Etiam hendrerit sed urna ut tempor. Nam interdum ex placerat, mattis erat vitae, luctus felis. Vivamus porttitor mauris in bibendum iaculis.
        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam sit amet metus in erat aliquet venenatis et et magna. Praesent eget orci dolor. Curabitur vel vestibulum ex. Donec non dolor sit amet eros rhoncus suscipit nec eget nulla. In ligula arcu, egestas quis sodales ac, euismod nec dolor. Integer lacus tortor, consectetur feugiat dictum quis, interdum ut erat. Mauris ac mauris facilisis, vestibulum lorem sit amet, dignissim ante. Fusce pulvinar molestie tristique. Donec quis lorem dictum, luctus orci eget, maximus mi.",
                    'tanggapan_peserta_rapat' =>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit, mi a interdum mattis, leo dolor congue nunc, ut suscipit orci arcu sit amet erat. Mauris pellentesque turpis quis velit auctor tincidunt. Mauris suscipit ex ut bibendum semper. Cras quis leo orci. Sed posuere lorem ante, id molestie tortor laoreet a. Nunc sit amet congue felis, sed cursus tellus. Etiam semper ligula lacus, vel semper purus cursus sed. Nullam et efficitur diam, id pharetra velit. In nibh turpis, sollicitudin non viverra eget, convallis sed mi. Etiam hendrerit sed urna ut tempor. Nam interdum ex placerat, mattis erat vitae, luctus felis. Vivamus porttitor mauris in bibendum iaculis.
        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam sit amet metus in erat aliquet venenatis et et magna. Praesent eget orci dolor. Curabitur vel vestibulum ex. Donec non dolor sit amet eros rhoncus suscipit nec eget nulla. In ligula arcu, egestas quis sodales ac, euismod nec dolor. Integer lacus tortor, consectetur feugiat dictum quis, interdum ut erat. Mauris ac mauris facilisis, vestibulum lorem sit amet, dignissim ante. Fusce pulvinar molestie tristique. Donec quis lorem dictum, luctus orci eget, maximus mi.",
                    'simpulan' =>
                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit, mi a interdum mattis, leo dolor congue nunc, ut suscipit orci arcu sit amet erat. Mauris pellentesque turpis quis velit auctor tincidunt. Mauris suscipit ex ut bibendum semper. Cras quis leo orci. Sed posuere lorem ante, id molestie tortor laoreet a. Nunc sit amet congue felis, sed cursus tellus. Etiam semper ligula lacus, vel semper purus cursus sed. Nullam et efficitur diam, id pharetra velit. In nibh turpis, sollicitudin non viverra eget, convallis sed mi. Etiam hendrerit sed urna ut tempor. Nam interdum ex placerat, mattis erat vitae, luctus felis. Vivamus porttitor mauris in bibendum iaculis.
        Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam sit amet metus in erat aliquet venenatis et et magna. Praesent eget orci dolor. Curabitur vel vestibulum ex. Donec non dolor sit amet eros rhoncus suscipit nec eget nulla. In ligula arcu, egestas quis sodales ac, euismod nec dolor. Integer lacus tortor, consectetur feugiat dictum quis, interdum ut erat. Mauris ac mauris facilisis, vestibulum lorem sit amet, dignissim ante. Fusce pulvinar molestie tristique. Donec quis lorem dictum, luctus orci eget, maximus mi.",
                    'nama_jabatan_pejabat' => 'Kepala Prodi',
                    'tanda_tangan_pejabat' => 'data:image/png;base64,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',
                    'nama_pejabat' => 'Dr. Ardi',
                    'NIP_pejabat' => '255',
                ]);
                $laporan->save();
                DB::table('susunans')->insert(['fk_laporan' => $laporan->id, 'nama_susunan' => 'nama_susunan 1']);
                DB::table('susunans')->insert(['fk_laporan' => $laporan->id, 'nama_susunan' => 'nama_susunan 2']);
                DB::table('susunans')->insert(['fk_laporan' => $laporan->id, 'nama_susunan' => 'nama_susunan 3']);
                DB::table('susunans')->insert(['fk_laporan' => $laporan->id, 'nama_susunan' => 'nama_susunan 4']);
                DB::table('pesertas')->insert(['fk_laporan' => $laporan->id, 'nama_peserta' => 'nama_peserta 1']);
                DB::table('pesertas')->insert(['fk_laporan' => $laporan->id, 'nama_peserta' => 'nama_peserta 2']);
                DB::table('pesertas')->insert(['fk_laporan' => $laporan->id, 'nama_peserta' => 'nama_peserta 3']);
                DB::table('pesertas')->insert(['fk_laporan' => $laporan->id, 'nama_peserta' => 'nama_peserta 4']);
            }
        }
    }
}
