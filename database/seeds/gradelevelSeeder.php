<?php

use App\Grade_level;
use Illuminate\Database\Seeder;

class gradelevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade_level::create([
            'grade_name' => 'Nursery',
        ]);
        Grade_level::create([
            'grade_name' => 'Kindergarten',
        ]);
        Grade_level::create([
            'grade_name' => 'Preparatory',
        ]);
        Grade_level::create([
            'grade_name' => 'Elementary',
        ]);
        Grade_level::create([
            'grade_name' => 'Junior High School',
        ]);
    }
}
