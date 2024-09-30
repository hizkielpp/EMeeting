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
            return view('remake.index_pimpinan');
        } else {
            return view('remake.create_laporan');
        }
    }
    public function index_register()
    {
        return view('register');
    }
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validationData());
        auth()->login($user);
        return redirect('/')->with('success', "Akun telah berhasil dibuat");
    }
    public function index_login()
    {
        return view('remake.authentication-login');
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
    public function profile()
    {
        return view('remake.profile');
    }
    public function ubah_password(Request $request)
    {
        try {
            // return $request;
            if ($request->password !== $request->password_konfirmasi) return redirect()->back()->with('error', 'Gagal mengubah password karena password dan kofirmasinya tidak sesuai<br>tolong pastikan keduanya sesuai');
            $user = User::find(Auth::id());
            $user->nickname = $request->nickname;
            $user->password = $request->password;
            $user->save();
            return redirect()->back()->with('success', "Berhasil merubah password mu <br>Passwordmu adalah $request->password");
        } catch (\Exception $e) {
            return $e;
        }
    }
}
