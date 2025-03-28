<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
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
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'password' => ['required', 'confirmed'],
            'role' => 'required|in:nasabah,admin', // Validasi role
        ]);

        DB::beginTransaction();
        try {
            // Buat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone, // Simpan nomor telepon
                'address' => $request->address, // Simpan alamat
                'password' => Hash::make($request->password),
                'role' => $request->role, // Simpan role ke database
            ]);

            // Log untuk memastikan user berhasil dibuat
            Log::info('User berhasil dibuat: ', $user->toArray());

            // Jika menggunakan Spatie Role, pastikan role ada lalu assign
            if (class_exists(Role::class)) {
                $role = Role::firstOrCreate(['name' => $request->role]);
                $user->assignRole($role);
            }

            DB::commit(); // Simpan perubahan ke database

            return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');

        } catch (\Exception $e) {
            DB::rollBack(); // Kembalikan transaksi jika gagal
            Log::error('Gagal registrasi: ' . $e->getMessage());

            return back()->with('error', 'Registrasi gagal. Silakan coba lagi.');
        }
    }
}
