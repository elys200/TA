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
            'name' => 'borang_ruangan',
            ],
            ['name' => 'borang_ruangan']
        );

        Permission::updateOrCreate([
            'name' => 'borang_ruangan_all',
            ],
            ['name' => 'borang_ruangan_all']
        );

        Permission::updateOrCreate([
            'name' => 'view_barang',
            ],
            ['name' => 'view_barang']
        );

        Permission::updateOrCreate([
            'name' => 'borang_barang',
            ],
            ['name' => 'borang_barang']
        );

        Permission::updateOrCreate([
            'name' => 'borang_barang_all',
            ],
            ['name' => 'borang_barang_all']
        );

        Permission::updateOrCreate([
            'name' => 'status_peminjaman_all',
            ],
            ['name' => 'status_peminjaman_all']
        );

        Permission::updateOrCreate([
            'name' => 'approve_ruangan',
            ],
            ['name' => 'approve_ruangan']
        );

        Permission::updateOrCreate([
            'name' => 'approve_ruangan_all',
            ],
            ['name' => 'approve_ruangan_all']
        );

        Permission::updateOrCreate([
            'name' => 'approve_barang',
            ],
            ['name' => 'approve_barang']
        );

        Permission::updateOrCreate([
            'name' => 'give_barang',
            ],
            ['name' => 'give_barang']
        );

         Permission::updateOrCreate([
            'name' => 'return_barang',
            ],
            ['name' => 'return_barang']
        );

        Permission::updateOrCreate([
            'name' => 'view_kunci',
            ],
            ['name' => 'view_kunci']
        );

        Permission::updateOrCreate([
            'name' => 'give_kunci',
            ],
            ['name' => 'give_kunci']
        );

        Permission::updateOrCreate([
            'name' => 'return_kunci',
            ],
            ['name' => 'return_kunci']
        );

        Permission::updateOrCreate([
            'name' => 'view_kelola_ruangan',
            ],
            ['name' => 'view_kelola_ruangan']
        );

        Permission::updateOrCreate([
            'name' => 'kelola_ruangan_all',
            ],
            ['name' => 'kelola_ruangan_all']
        );

        Permission::updateOrCreate([
            'name' => 'view_user',
            ],
            ['name' => 'view_user']
        );

        Permission::updateOrCreate([
            'name' => 'user_all',
            ],
            ['name' => 'user_all']
        );

        Permission::updateOrCreate([
            'name' => 'view_role',
            ],
            ['name' => 'view_role']
        );

        Permission::updateOrCreate([
            'name' => 'role_all',
            ],
            ['name' => 'role_all']
        );

        Permission::updateOrCreate([
            'name' => 'view_ormawa',
            ],
            ['name' => 'view_ormawa']
        );

        Permission::updateOrCreate([
            'name' => 'ormawa_all',
            ],
            ['name' => 'ormawa_all']
        );

        Permission::updateOrCreate([
            'name' => 'view_detail_ormawa',
            ],
            ['name' => 'view_detail_ormawa']
        );

        Permission::updateOrCreate([
            'name' => 'barang_all',
            ],
            ['name' => 'barang_all']
        );
    }
}
