<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the input
        $search = $request->input('search');
        // Fetch reports with pagination and search filter'
        $units = DB::table('units')->when($search, function ($query, $search) {
            return $query->where('nama_unit', 'like', '%' . $search . '%');
        })->paginate(10);
        // return view with units
        return view('remake.unit.index', compact('units'));
    }
    public function edit(Request $request)
    {
        $unit = DB::table('units')->where('id', '=', $request->id_unit)->first();
        return view('remake.unit.edit', compact('unit'));
    }
    public function update(Request $request)
    {
        try {
            DB::table('units')->where('id', '=', $request->id_unit)->update(['nama_unit' => $request->nama_unit]);
            return redirect('units')->with('success', 'Berhasil mengupdate data unit');
        } catch (\Exception) {
            return redirect()->back()->with('error', 'Gagal mengupdate data unit');
        }
    }
    public function create()
    {
        return view('remake.unit.create');
    }
    public function input(Request $request)
    {
        try {
            DB::table('units')->insert(['nama_unit' => $request->nama_unit]);
            return redirect('units')->with('success', 'Berhasil membuat data unit');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal membuat unit baru');
        }
    }
}
