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
        $students = [
            [
                'student_lrn' => '123456789101',
                'last_name' => 'Latayan',
                'first_name' => 'Roy Joseph',
                'middle_name' => 'Mendoza',
                'gender' => 'Male',
                'age' => '2',
                'email' => 'rjml@gmail.com',
                'birthdate' => '2021-01-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'section_id' => '1',
                'grade_level_id' => '1',
                'sy_id' => '1',
            ], [
                'student_lrn' => '012345678912',
                'last_name' => 'Tamad',
                'first_name' => 'Juan',
                'middle_name' => 'Dy',
                'gender' => 'Male',
                'age' => '3',
                'email' => 'jdyt@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'section_id' => '1',
                'grade_level_id' => '1',
                'sy_id' => '1',
            ]
        ];
        foreach ($students as $student) {
            Student::create($student);
        }
        $families = [
            [
                'student_lrn' => '012345678910',
                'name' => 'Dino Sy Tamad',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship' => 'Father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_lrn' => '012345678910',
                'name' => 'Gina Dy Tamad',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship' => 'Mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ]
        ];

        foreach ($families as $family) {
            Family::create($family);
        }
        $guardians = [
            [
                'student_lrn' => '012345678910',
                'name' => 'Gina Dy Tamad',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
            ]
        ];
        foreach ($guardians as $guardian) {
            Guardian::create($guardian);
        }
    }
}
