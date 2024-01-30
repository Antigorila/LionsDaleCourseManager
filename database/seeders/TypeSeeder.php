<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typesDictionary = [
            'C#-backend developer' => 'c#Dev',
            'Web development' => 'webDev',
            'Front-end developer' => 'frontDev',
            'Database administrator' => 'dbAdmin'
        ];
        
        foreach ($typesDictionary as $name => $slug) {
            Type::factory()->create([
                'type' => $name,
                'slug' => $slug
            ]);
        }
    }
}
