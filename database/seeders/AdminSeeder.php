<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default Roles

        Role::create([
            'role_name' => 'super_admin',
        ]);

        Role::create([
            'role_name' => 'admin',
        ]);

        // Default Admin

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'username' => 'Admin Ko',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin123'),
            'role_id' => 1,
        ]);

        // Permissions

        Permission::create([
            'permission_name' => 'manage_users',
            'permission_description' => 'Manage user accounts and permissions',
        ])->roles()->attach(1); // only the super admin can manage users

        Permission::create([
            'permission_name' => 'manage_books',
            'permission_description' => 'Manage book catalog',
        ])->roles()->attach([1,2]);

        Permission::create([
            'permission_name' => 'circulate',
            'permission_description' => 'Handle borrowing and returns',
        ])->roles()->attach([1,2]);

    }
}
