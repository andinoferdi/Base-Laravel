<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
   $this->call(JenisUserSeeder::class);
   $this->call(MenuSeeder::class);
   $this->call(UserSeeder::class);
   $this->call(KecamatanSeeder::class);

    }
}
