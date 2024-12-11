<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat atau mendapatkan role admin
        $role_admin = Role::updateOrCreate(
            ['name' => 'admin'],
            ['name' => 'admin']
        );

        // Membuat atau mendapatkan role nasabah
        $role_nasabah = Role::updateOrCreate(
            ['name' => 'nasabah'],
            ['name' => 'nasabah']
        );

        // Membuat atau mendapatkan permission
        $permission = Permission::updateOrCreate(
            ['name' => 'view_dashboard'],
            ['name' => 'view_dashboard']
        );

        $permission2 = Permission::updateOrCreate(
            ['name' => 'view_chart_on_dashboard'],
            ['name' => 'view_chart_on_dashboard']
        );

        // Memberikan permission kepada role
        $role_admin->givePermissionTo($permission);
        $role_admin->givePermissionTo($permission2);
        $role_nasabah->givePermissionTo($permission2);

        // Menetapkan role pada pengguna yang ada
        $user = User::find(1);
        $user2 = User::find(2);

        $user->assignRole('admin');
        $user2->assignRole('nasabah');

        // Menambahkan pengguna baru
        $user3 = User::create([
            'name' => 'New Nasabah',
            'email' => 'newnasabah@example.com',
            'password' => bcrypt('password123'), // Jangan lupa enkripsi password
        ]);
        $user3->assignRole('nasabah');
    }
}
