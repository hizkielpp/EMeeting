<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Get the search query from the input
        $search = $request->input('search');
        // Fetch reports with pagination and search filter'
        $users = User::when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('username', 'like', '%' . $search . '%')
                    ->orWhere('nickname', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('role', 'like', '%' . $search . '%');
            });
        })
            ->paginate(10);
        return view('remake.user.index', compact('users'));
    }
    public function edit(Request $request)
    {
        try {
            $user = User::find($request->id);
            return view('remake.user.edit', compact('user'));
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
            $user->nickname = $request->nickname;
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
