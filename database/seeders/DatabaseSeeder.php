<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Prvo pokreni RoleSeeder kako bi role bile u bazi
         $this->call([
            RoleSeeder::class,
            UserSeeder::class,
        ]);

    }   
}