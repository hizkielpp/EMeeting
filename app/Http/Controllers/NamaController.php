<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NamaController extends Controller
{
    public function get_namas(Request $request)
    {
        try {
            $namas = DB::table('namas');
            if ($request->keyword) $namas = $namas->where('nama_lengkap', 'LIKE', "%$request->keyword%");
            $namas = $namas->orderBy('nama_lengkap')->get();
            return $namas;
        } catch (\Exception $e) {
            return $e;
        }
    }
}
