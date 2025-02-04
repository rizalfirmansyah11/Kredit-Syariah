<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek role dengan Spatie
            if ($user->hasRole('admin')) {
                return redirect()->route('admin.dashboard');
            } elseif ($user->hasRole('nasabah')) {
                return redirect()->route('nasabah.dashboard');
            }

            return abort(403, 'Unauthorized');
        }

        return redirect()->route('login')->with('failed', 'Email atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }
}


    // public function register()
    // {
    //     return view('auth.register');
    // }

    // public function register_proses(Request $request)
    // {
    //     $request->validate([
    //         'nama' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6',
    //         'role' => 'required|in:admin,nasabah' // Validasi role hanya menerima admin atau nasabah
    //     ]);

    //     // Buat user baru dengan role sesuai input
    //     $user = User::create([
    //         'name' => $request->nama,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'role' => $request->role // Simpan role dari input
    //     ]);

    //     // Login otomatis setelah registrasi
    //     Auth::login($user);

    //     // Redirect sesuai role
    //     if ($user->role === 'admin') {
    //         return redirect()->route('admin.dashboard')->with('success', 'Registrasi dan login berhasil sebagai Admin.');
    //     } elseif ($user->role === 'nasabah') {
    //         return redirect()->route('nasabah.dashboard')->with('success', 'Registrasi dan login berhasil sebagai Nasabah.');
    //     }

    //     return redirect()->route('login')->with('failed', 'Login otomatis gagal.');
    // }

