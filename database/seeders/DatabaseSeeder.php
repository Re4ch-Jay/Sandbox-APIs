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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'reach',
            'email' => 'reach@example.com',
            'password' => '12345678'
        ]);

        \App\Models\User::factory()->create([
            'name' => 'john',
            'email' => 'john@example.com',
            'password' => '12345678'
        ]);

        \App\Models\Category::create([
            'name' => "Coding",
        ]);

        \App\Models\Post::factory(10)->create();

        \App\Models\Comment::factory(20)->create();

    }
}
