<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Client;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        foreach (range(0, 19) as $i)
        {
            Client::factory()->create();
        }

        foreach (range(0, 59) as $i)
        {
            Book::factory()->create();
        }
    }
}
