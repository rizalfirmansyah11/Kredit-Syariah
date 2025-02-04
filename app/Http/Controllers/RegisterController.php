<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function registerProses(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => 'required|in:nasabah,admin', // Validasi role
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Pastikan role tersedia di database
        if (Role::where('name', $request->role)->exists()) {
            $user->assignRole($request->role);
        } else {
            return redirect()->back()->with('error', 'Role tidak ditemukan.');
        }

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
