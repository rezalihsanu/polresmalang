<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Buat roles
        $superadmin = Role::firstOrCreate(['name' => 'superadmin', 'guard_name' => 'web']);
        $admin      = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // Permissions
        $permissions = [
            'manage-berita',
            'manage-layanan',
            'manage-organisasi',
            'manage-pengaduan',
            'manage-dokumen',
            'manage-galeri',
            'manage-settings',
            'manage-users',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // Superadmin dapat semua
        $superadmin->syncPermissions($permissions);

        // Admin dapat semua kecuali manage-users & manage-settings
        $admin->syncPermissions(array_diff($permissions, ['manage-users', 'manage-settings']));

        // Buat superadmin user
        $superUser = User::firstOrCreate(
            ['email' => 'superadmin@polrestamalang.go.id'],
            [
                'name'     => 'Super Admin',
                'password' => bcrypt('password'),
            ]
        );
        $superUser->assignRole('superadmin');

        // Buat admin biasa
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@polrestamalang.go.id'],
            [
                'name'     => 'Admin Operator',
                'password' => bcrypt('password'),
            ]
        );
        $adminUser->assignRole('admin');

        $this->command->info('✅ Users & roles seeded.');
    }
}
