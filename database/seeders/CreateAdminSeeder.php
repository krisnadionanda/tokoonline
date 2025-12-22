<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateAdminSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat / ambil role Super Admin
        $role = Role::firstOrCreate([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        // 2. Buat / update user admin
        $user = User::updateOrCreate(
            ['email' => 'admin@local.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('123456'),
            ]
        );

        // 3. Assign role ke user
        if (! $user->hasRole('Super Admin')) {
            $user->assignRole($role);
        }
    }
}
