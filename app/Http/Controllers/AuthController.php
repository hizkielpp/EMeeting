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
        return view('login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();
        if (!Auth::validate($credentials)) :
            return redirect()->to('login')->withErrors(['failed' => 'Username atau password tidak sesuai']);
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
}
