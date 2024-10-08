<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index(){
        // get data units
        $units = DB::table('units')->paginate(5);
        // return view with units
        return view('remake.unit.index',compact('units'));
    }
}
