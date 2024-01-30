<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseNames = ['PHP basic', 'PHP authentication', 'WEB development', 'Software development', 'Backend development'];
        foreach ($courseNames as $course)
        {
            Course::factory()->create([
                'name' => $course
            ]);
        }      
    }
}
