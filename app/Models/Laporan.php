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
        'perihal_mahasiswa',
        'perihal_dosen',
        'perihal_tendik',
        'perihal_sarpras',
        'lain-lain',
        'bukti_presensi',
    ];
    public function post()
    {
        return $this->belongsTo(User::class);
    }
}
