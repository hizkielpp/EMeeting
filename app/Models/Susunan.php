<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Susunan extends Model
{
    use HasFactory;
    protected $fillable = [
        'fk_laporan',
        'nama_susunan',
    ];
}
