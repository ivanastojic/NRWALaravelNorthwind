<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dohvati 'admin' rolu
        $adminRole = Role::where('name', 'admin')->first();
        $editorRole = Role::where('name', 'editor')->first();
        $userRole = Role::where('name', 'user')->first();
        
        User::create([
            'name' => 'Ivana',
            'email' => 'ivana@gmail.com',
            'password' => Hash::make('ivana23'),
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'password' => Hash::make('editor123'),
            'role_id' => $editorRole->id,
        ]);

        User::create([
            'name' => 'Creator',
            'email' => 'createor@gmail.com',
            'password' => Hash::make('creator123'),
            'role_id' => $userRole->id,
        ]);
    }
}
