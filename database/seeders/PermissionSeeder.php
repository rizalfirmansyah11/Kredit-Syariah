<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Buat role
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $nasabahRole = Role::firstOrCreate(['name' => 'nasabah', 'guard_name' => 'web']);

        // Buat user admin dan nasabah
        $adminUser = User::firstOrCreate(['id' => 1], ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => bcrypt('password')]);
        $nasabahUser = User::firstOrCreate(['id' => 2], ['name' => 'Nasabah User', 'email' => 'nasabah@example.com', 'password' => bcrypt('password')]);

        // Assign role ke user
        $adminUser->assignRole('admin');
        $nasabahUser->assignRole('nasabah');

        $this->command->info('PermissionSeeder sukses dijalankan!');
    }
}
