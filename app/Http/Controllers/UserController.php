<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the input
        $search = $request->input('search');
        // Fetch reports with pagination and search filter'
        $users = User::leftJoin('units', 'units.id', '=', 'users.fk_unit')->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('units.nama_unit', 'like', '%' . $search . '%')
                    ->orWhere('role', 'like', '%' . $search . '%');
            });
        })
            ->select('units.nama_unit', 'users.*')
            ->paginate(10);
        return view('remake.user.index', compact('users'));
    }
    public function edit(Request $request)
    {
        try {
            $user = User::find($request->id);
            $units = DB::table('units')->orderBy('nama_unit')->get();
            return view('remake.user.edit', compact('user', 'units'));
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function update(Request $request)
    {
        try {
            // fetch model from id
            $user = User::find($request->id);
            // password not null condition
            if (!is_null($request->password)) $user->password = $request->password;
            // setup value from form into model
            $user->username = $request->username;
            $user->fk_unit = $request->fk_unit;
            $user->email = $request->email;
            $user->role = $request->role;
            // save model to the db
            $user->save();
            return redirect()->back()->with('success', "Berhasil mengubah data pengguna");
        } catch (\Exception $e) {
            return $e;
        }
    }
}
