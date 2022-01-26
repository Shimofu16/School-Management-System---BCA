<?php

use App\Student;
use Illuminate\Database\Seeder;

class enrolledSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'student_lrn' => '123456789101',
            'last_name' => 'Latayan',
            'first_name' => 'Roy Joseph',
            'middle_name' => 'Mendoza',
            'gender' => 'Male',
            'age' => '2',
            'email' => 'rjml@gmail.com',
            'contact' => '09123456789',
            'birthdate' => '2021-01-23',
            'birthplace' => 'calauan,laguna',
            'address' => 'calauan,laguna',
            'section_id' => '1',
            'grade_level_id' => '1',
        ]);
    }
}
