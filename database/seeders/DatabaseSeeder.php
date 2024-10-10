<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Approver',
            'email' => 'approver@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'approver',
        ]);

        User::factory()->create([
            'name' => 'Creator',
            'email' => 'creator@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'creator',
        ]);
    }
}
