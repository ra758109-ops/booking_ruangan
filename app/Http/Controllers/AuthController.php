<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; // 👈 Menghilangkan error 'Request is not imported'
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function storeLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 🟢 PERBAIKAN DI LOGIN: Paksa input login juga jadi huruf kecil biar sinkron
        $credentials['email'] = strtolower($credentials['email']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    // Menampilkan halaman register
    public function register()
    {
        return view('auth.register');
    }

    // Memproses data registrasi ke MongoDB dengan Role Otomatis (VERSI AMAN)
    public function storeRegister(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        /* |--------------------------------------------------------------------------
        | LOGIKA ROLE OTOMATIS (KEBAL HURUF BESAR/KECIL)
        |--------------------------------------------------------------------------
        | Kita paksa inputan email menjadi huruf kecil semua menggunakan strtolower().
        | Jadi mau ngetik ADMIN@gmail.com atau admin@gmail.com tetap sah jadi admin.
        */
        $email_lowercase = strtolower($request->email);
        $role_otomatis = ($email_lowercase === 'admin@gmail.com') ? 'admin' : 'user';

        User::create([
            'name'     => $request->name,
            'email'    => $email_lowercase, // 👈 Simpan versi huruf kecil ke MongoDB biar rapi
            'password' => bcrypt($request->password),
            'role'     => $role_otomatis
        ]);

        return redirect('/login')->with('success', 'Registrasi sukses! Silakan login.');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
