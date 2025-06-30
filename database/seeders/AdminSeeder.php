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

        $super_admin_role = Role::create([
            'id' => 1,
            'role_name' => 'super_admin',
        ]);

        $admin_role = Role::create([
            'id' => 2,
            'role_name' => 'admin',
        ]);

        // Default Admins

        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => '@superadmin',
            'email' => 's.admin@email.com',
            'password' => bcrypt('admin123'),
        ])->assignRole($super_admin_role);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Only',
            'username' => '@admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('admin123'),
        ])->assignRole($admin_role);

        // Ordinary User (Patron)
        User::create([
            'first_name' => 'Patron',
            'last_name' => 'Student',
            'username' => '@patron',
            'email' => 'patron@email.com',
            'password' => bcrypt('patron123'),
        ]);

        // Permissions

        Permission::create([
            'permission_name' => 'manage_admins',
            'permission_description' => 'Manage admin accounts and permissions',
        ])->roles()->attach(1); // only the super admin can manage users

        Permission::create([
            'permission_name' => 'manage_patrons',
            'permission_description' => 'Manage patron accounts and permissions',
        ])->roles()->attach([1,2]); // only the super admin can manage users

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
