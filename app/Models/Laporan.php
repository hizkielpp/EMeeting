<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Laporan extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_rapat',
        'tanggal_rapat',
        'tempat',
        'pemimpin_rapat',
        // 'pencatat',
        'bukti_presensi_kehadiran',
        'file_pendukung_rapat',
        'nama_jabatan_pejabat',
        'tanda_tangan_pejabat',
        'nama_pejabat',
        'NIP_pejabat',
        'nama_jabatan_KSM',
        'tanda_tangan_KSM',
        'nama_KSM',
        'NIP_KSM',
        'nama_jabatan_Kabag',
        'tanda_tangan_Kabag',
        'nama_Kabag',
        'NIP_Kabag',
        'mahasiswa',
        'dosen',
        'tendik',
        'sarpras',
        'lain_lain',
        'tanggapan_peserta_rapat',
        'simpulan',
        'evaluasi',
        'pembinaan',
    ];
    public function post()
    {
        return $this->belongsTo(User::class);
    }
    public function pesertas()
    {
        return $this->hasMany(Peserta::class, 'fk_laporan', 'id');
    }
    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'fk_laporan', 'id');
    }
}
