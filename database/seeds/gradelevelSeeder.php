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
        $gradelevels = [
            ['grade_name' => 'Nursery', 'grade_level' => 'Nursery'],
            ['grade_name' => 'Kindergarten', 'grade_level' => 'Kindergarten'],
            ['grade_name' => 'Preparatory', 'grade_level' => 'Preparatory'],
            ['grade_name' => 'Grade - 1', 'grade_level' => '1', 'description' => 'Elementary'],
            ['grade_name' => 'Grade - 2', 'grade_level' => '2', 'description' => 'Elementary'],
            ['grade_name' => 'Grade - 3', 'grade_level' => '3', 'description' => 'Elementary'],
            ['grade_name' => 'Grade - 4', 'grade_level' => '4', 'description' => 'Elementary'],
            ['grade_name' => 'Grade - 5', 'grade_level' => '5', 'description' => 'Elementary'],
            ['grade_name' => 'Grade - 6', 'grade_level' => '6', 'description' => 'Elementary'],
            ['grade_name' => 'Grade - 7', 'grade_level' => '7', 'description' => 'Junior High School'],
            ['grade_name' => 'Grade - 8', 'grade_level' => '8', 'description' => 'Junior High School'],
            ['grade_name' => 'Grade - 9', 'grade_level' => '9', 'description' => 'Junior High School'],
            ['grade_name' => 'Grade - 10', 'grade_level' => '10', 'description' => 'Junior High School'],
        ];
        foreach ($gradelevels as $gradelevel) {
            Grade_level::create($gradelevel);
        }
    }
}
