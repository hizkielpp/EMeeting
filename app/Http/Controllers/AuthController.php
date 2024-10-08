<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'pimpinan') {
            $users = User::where('role', '<>', 'pimpinan')->get();
            return view('remake.index_pimpinan', compact('users'));
        } else {
            return redirect('create_laporan');
        }
    }
    public function index_register()
    {
        return view('remake.authentication.register');
    }
    public function register(RegisterRequest $request)
    {
        try {

            $user = new User();
            $user->nickname = $request->nickname;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = 'bawahan';
            $user->password = 'abc';
            $user->save();
            auth()->login($user);
            return redirect('/')->with('success', "Akun telah berhasil dibuat");
        } catch (\Exception $e) {
            return $e;
        }
    }
    public function index_login()
    {
        return view('remake.authentication.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) :
            return redirect()->to('login')->with(['error' => 'Username atau password tidak sesuai']);
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return redirect()->to('/')->with('success', "Berhasil login");
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('login')->with('success', "Berhasil logout");
    }
    public function edit_password(Request $request)
    {
        // get user from id
        $user = User::find($request->id);
        return view('remake.authentication.edit', compact('user'));
    }
    public function update_password(Request $request)
    {
        try {
            // return $request;
            if ($request->password !== $request->password_konfirmasi) return redirect()->back()->with('error', 'Gagal mengubah password karena password dan kofirmasinya tidak sesuai<br>tolong pastikan keduanya sesuai');
            $user = User::find(Auth::id());
            $user->password = $request->password;
            $user->save();
            return redirect()->back()->with('success', "Berhasil merubah password mu <br>Passwordmu adalah $request->password");
        } catch (\Exception $e) {
            return $e;
        }
    }
}
