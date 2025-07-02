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

        // 1) Create roles
        $admin = Role::firstOrCreate(['role_name' => 'admin']);
        $super = Role::firstOrCreate(['role_name' => 'super_admin']);

        // 2) Create permissions
        $perms = [
            'manage_admins'    => 'Manage admin accounts and permissions',
            'manage_patrons'   => 'Manage patron accounts and permissions',
            'manage_books'     => 'Manage book catalog',
            'circulate'        => 'Handle borrowing and returns',
        ];
        foreach ($perms as $name => $desc) {
            Permission::firstOrCreate([
                'permission_name'        => $name,
                'permission_description' => $desc,
            ]);
        }

        // 3) Attach permissions to roles

        $admin->permissions()->sync(
            Permission::whereIn('permission_name', [
                'manage_patrons',
                'manage_books',
                'circulate',
            ])->pluck('id')
        );

        // Super admin gets everything:
        $super->permissions()->sync(Permission::pluck('id'));

        // Default Users

        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'username' => '@superadmin',
            'email' => 's.admin@email.com',
            'role_id' => $super->id,
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Only',
            'username' => '@admin',
            'email' => 'admin@email.com',
            'role_id' => $admin->id,
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'first_name' => 'Juan',
            'last_name' => 'Dela Cruz',
            'username' => '@juan',
            'email' => 'juan@email.com',
            'role_id' => $admin->id,
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'username' => '@john',
            'email' => 'john@email.com',
            'role_id' => $admin->id,
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'first_name' => 'Patron',
            'last_name' => 'Student',
            'username' => '@patron',
            'email' => 'patron@email.com',
            'password' => bcrypt('patron123'),
        ]);

    }
}
