<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run()
    {
        DB::table('menu')->insert([
            [
                'nama_menu' => 'Polosan',
                'link_menu' => 'polosan',
                'icon_menu' => 'bi bi-tablet',
                'status_menu' => 1,
                'urutan_menu' => 2
            ],
            [
                'nama_menu' => 'User',
                'link_menu' => 'master/user',
                'icon_menu' => 'bi bi-person',
                'status_menu' => 1,
                'urutan_menu' => 3
            ],
            [
                'nama_menu' => 'Jenis User',
                'link_menu' => 'master/jenis_user',
                'icon_menu' => 'bi bi-person',
                'status_menu' => 1,
                'urutan_menu' => 4
            ],
            [
                'nama_menu' => 'Satuan',
                'link_menu' => 'master/satuan',
                'icon_menu' => 'bi bi-shift',
                'status_menu' => 1,
                'urutan_menu' => 5
            ],
            [
                'nama_menu' => 'Kecamatan',
                'link_menu' => 'master/kecamatan',
                'icon_menu' => 'bi bi-justify',
                'status_menu' => 1,
                'urutan_menu' => 6
            ],
            [
                'nama_menu' => 'Kategori Buku',
                'link_menu' => 'master/kategori_buku',
                'icon_menu' => 'bi bi-book-fill',
                'status_menu' => 1,
                'urutan_menu' => 7
            ],
            [
                'nama_menu' => 'Buku',
                'link_menu' => 'master/buku',
                'icon_menu' => 'bi bi-book',
                'status_menu' => 1,
                'urutan_menu' => 8
            ],
            [
                'nama_menu' => 'Mahasiswa',
                'link_menu' => 'master/mahasiswa',
                'icon_menu' => 'bi bi-collection',
                'status_menu' => 1,
                'urutan_menu' => 9
            ],
            [
                'nama_menu' => 'Aktivitas User',
                'link_menu' => 'aktivitas/user',
                'icon_menu' => 'bi bi-stopwatch',
                'status_menu' => 1,
                'urutan_menu' => 10
            ],
            [
                'nama_menu' => 'Error Aplikasi',
                'link_menu' => 'aktivitas/error_aplikasi',
                'icon_menu' => 'bi bi-exclamation-octagon',
                'status_menu' => 1,
                'urutan_menu' => 11
            ],
            [
                'nama_menu' => 'Profile',
                'link_menu' => 'settings/profile',
                'icon_menu' => 'bi bi-gear',
                'status_menu' => 1,
                'urutan_menu' => 12
            ]
        ]);
    }
}
