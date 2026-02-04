<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::updateOrCreate([
            'name' => 'admin',
            ],
            ['name' => 'admin']
        );
        $role_pic =Role::updateOrCreate([
            'name' => 'pic',
            ],
            ['name' => 'pic']
        );

        $role_pamdal =Role::updateOrCreate([
            'name' => 'pamdal',
            ],
            ['name' => 'pamdal']
        );

        $role_mahasiswa =Role::updateOrCreate([
            'name' => 'mahasiswa',
            ],
            ['name' => 'mahasiswa']
        );

        $permission = Permission::updateOrCreate([
            'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );

        $role_admin->givePermissionTo($permission);
    }
}
