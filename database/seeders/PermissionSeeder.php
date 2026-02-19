<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::updateOrCreate([
            'name' => 'view_dashboard',
            ],
            ['name' => 'view_dashboard']
        );
        Permission::updateOrCreate([
            'name' => 'view_ruangan',
            ],
            ['name' => 'view_ruangan']
        );
        Permission::updateOrCreate([
            'name' => 'user_all',
            ],
            ['name' => 'user_all']
        );
    }
}
