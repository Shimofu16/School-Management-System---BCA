<?php

use App\Family;
use App\Guardian;
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
        Student::create([
            'student_lrn' => '012345678912',
            'last_name' => 'Tamad',
            'first_name' => 'Juan',
            'middle_name' => 'Dy',
            'gender' => 'Male',
            'age' => '3',
            'email' => 'jdyt@gmail.com',
            'contact' => '09123456789',
            'birthdate' => '2019-05-23',
            'birthplace' => 'calauan,laguna',
            'address' => 'calauan,laguna',
            'section_id' => '1',
            'grade_level_id' => '1',
        ]);
        $families = [
            ['student_lrn' => '012345678910', 'name' => 'Dino Sy Tamad', 'birthdate' => '2000-05-23', 'contact_no' => '09123456782', 'email' => 'dinosyt@gmail.com', 'occupation' => 'Teacher', 'office_contact_no' => '09123456785',],
            ['student_lrn' => '012345678910', 'name' => 'Gina Dy Tamad', 'birthdate' => '2000-05-23', 'contact_no' => '09123456789', 'email' => 'ginadyt@gmail.com', 'occupation' => 'Teacher', 'office_contact_no' => '09123456785',]
        ];
        foreach ($families as $family) {
            Family::create($family);
        }
        Guardian::create([
            'student_lrn' => '012345678910',
            'name' => 'Gina Dy Tamad',
            'birthdate' => '2000-05-23',
            'contact_no' => '09123456789',
        ]);
    }
}
