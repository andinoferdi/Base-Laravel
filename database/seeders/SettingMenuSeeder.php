<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('setting_menus')->truncate(); // Clear the table

        // Define menu IDs for each jenis_user_id
        $menuAssignments = [
            1 => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], // Admin
            2 => [1, 5, 6, 7, 9, 10, 11],                // User
            3 => [1, 5, 6, 7, 9, 10, 11],                // Mahasiswa
        ];

        // Insert menu settings
        foreach ($menuAssignments as $jenis_user_id => $menu_ids) {
            foreach ($menu_ids as $menu_id) {
                DB::table('setting_menus')->insert([
                    'jenis_user_id' => $jenis_user_id,
                    'menu_id' => $menu_id,
                ]);
            }
        }
    }
}
