<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@cursosdesarrolloweb.es',
            'is_admin' => true,
            'is_active' => true,
        ]);
    }
}
