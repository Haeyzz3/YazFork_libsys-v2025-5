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
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $super = Role::firstOrCreate(['name' => 'super_admin']);
        Role::Create(['name' => 'patron']);

        // 2) Create permissions
        $perms = [
            'manage_admins'    => 'Manage admin accounts and permissions',
            'manage_patrons'   => 'Manage patron accounts and permissions',
            'manage_books'     => 'Manage book catalog',
            'circulate'        => 'Handle borrowing and returns',
        ];
        foreach ($perms as $name => $desc) {
            Permission::firstOrCreate([
                'name'        => $name,
                'description' => $desc,
            ]);
        }

        // 3) Attach permissions to roles

        $admin->permissions()->sync(
            Permission::whereIn('name', [
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
            'middle_name' => 'Middle',
            'username' => '@superadmin',
            'birth_date' => '1990-01-01',
            'email' => 's.admin@email.com',
            'role_id' => $super->id,
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'first_name' => 'Admin',
            'last_name' => 'Only',
            'middle_name' => 'Middle',
            'birth_date' => '1990-01-01',
            'username' => '@admin',
            'email' => 'admin@email.com',
            'role_id' => $admin->id,
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'first_name' => 'Juan',
            'middle_name' => 'Ayy',
            'last_name' => 'Dela Cruz',
            'birth_date' => '1990-01-01',
            'username' => '@juan',
            'email' => 'juan@email.com',
            'role_id' => $admin->id,
            'password' => bcrypt('admin123'),
        ]);

        User::create([
            'first_name' => 'John',
            'middle_name' => 'Kennedy',
            'last_name' => 'Doe',
            'birth_date' => '1990-01-01',
            'username' => '@john',
            'email' => 'john@email.com',
            'role_id' => $admin->id,
            'password' => bcrypt('admin123'),
        ]);
    }
}
