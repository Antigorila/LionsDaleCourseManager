<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = ['BMSZC Bláthy Ottó Titusz Informatikai Technikum', 
        'BGSZC Eötvös Loránd Technikum', 
        'BMSZC Petrik Lajos Két tanítási Nyelvű Technikum',
        'BMSZC Trefort Ágoston Két Tanítási Nyelvű Technikum'
        ];

        foreach ($schools as $school)
        {
            School::factory()->create([
                'name' => $school
            ]);
        }  
    }
}
