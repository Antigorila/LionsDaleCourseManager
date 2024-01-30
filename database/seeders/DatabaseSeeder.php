<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SchoolSeeder::class,
            TypeSeeder::class,          
        ]);

        User::factory()->create([
            'name' => 'dev',
            'fullname' => 'Admin',
            'email' => 'dev@gmail.com',
            'password' => '123456',
            'activity' => true,
        ]);

        $this->call([
            UserSeeder::class,
            CourseSeeder::class,
            QuestionSeeder::class,
            ChapterSeeder::class,
        ]);
    }
}
