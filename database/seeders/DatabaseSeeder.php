<?php

namespace Database\Seeders;

use App\Models\Category;
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

        $categories = [
            "Politică",
            "Economie",
            "Sănătate",
            "Educație",
            "Tehnologie",
            "Cultură",
            "Sport",
            "Mediu",
            "Internațional",
            "Social",
            "Militar"
        ];

        foreach ($categories as $category) {
            Category::factory()->create([
                'title' => $category,
            ]);
        }
    }
}
