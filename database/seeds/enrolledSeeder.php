<?php

use App\Enrolled_Student_Family;
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
                'student_lrn' => '123456789102',
                'last_name' => 'Tamad',
                'first_name' => 'Juan',
                'middle_name' => 'Dy',
                'gender' => 'Male',
                'age' => '3',
                'email' => 'jdyt@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'grade_level_id' => '1',
                'section_id' => '1',
                'sy_id' => '1',
                'status' => 0, //old
                'created_at' => now(),
            ]
        ];
        foreach ($students as $student) {
            Student::create($student);
        }
        $families = [
            [
                'student_lrn' => '123456789102',
                'name' => 'Dino Sy Tamad',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship' => 'Father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',

            ],
            [
                'student_lrn' => '123456789102',
                'name' => 'Gina Dy Tamad',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship' => 'Mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_lrn' => '123456789102',
                'name' => 'Gina Dy Tamad',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
            ]
        ];

        foreach ($families as $family) {
            Enrolled_Student_Family::create($family);
        }
    }
}
