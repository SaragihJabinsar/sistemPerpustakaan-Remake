<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::find($request->username);

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('username', $user->username);
            return redirect()->route('beranda'); // ke /
        }

        return back()->withErrors(['login' => 'Username atau password salah.']);
    }

    // Tampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:tbusers,username',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Proses logout
    public function logout()
    {
        // Menghapus session username saat logout
        session()->forget('username');

        // Redirect ke halaman login
        return redirect()->route('login');
    }

}
