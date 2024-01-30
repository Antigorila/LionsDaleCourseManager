<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $level = ['Beginner', 'Intermediate', 'Advanced', 'Master', 'Jedi Master'];

        return [
            'level' => fake()->randomElement($level),      
            'description' => fake()->paragraph(5, true),   
        ];
    }
}
