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
        'tanggal_rapat',
        'mahasiswa',
        'dosen',
        'tendik',
        'sarpras',
        'lain-lain',
        'bukti_presensi_kehadiran',
        'file_pendukung_rapat',
        'tanda_tangan_kadep',
        'tanda_tangan_kaprodi'
    ];
    public function post()
    {
        return $this->belongsTo(User::class);
    }
}
