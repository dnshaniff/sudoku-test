<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Roles
        $admin = Role::create([
            'access_level' => 'admin',
            'menu' => 'dashboard.index',
        ]);

        $user = Role::create([
            'access_level' => 'user',
            'menu' => 'dashboard.index',
        ]);

        // Users
        User::create([
            'name' => 'administrator',
            'password' => Hash::make('administrator'),
            'description' => 'Administrator Account',
            'role_id' => $admin->id,
        ]);

        User::create([
            'name' => 'user',
            'password' => Hash::make('user'),
            'description' => 'User Account',
            'role_id' => $user->id,
        ]);
    }
}
