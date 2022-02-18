<?php

use App\Enrollee;
use App\Enrollee_Student_Family;
use App\Family;
use App\Guardian;
use Illuminate\Database\Seeder;

class enrolleeSeeder extends Seeder
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
                'student_lrn' => '123456789103',
                'last_name' => 'Albaytar',
                'first_name' => 'Poul Aedrian',
                'middle_name' => 'R',
                'gender' => 'Male',
                'age' => '3',
                'email' => 'para@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'status' => 1,//new
                'grade_level_id' => '1',
            ],
            [
                'student_lrn' => '123456789104',
                'last_name' => 'Pontanoza',
                'first_name' => 'Ma. Moureen',
                'middle_name' => 'L',
                'gender' => 'Female',
                'age' => '3',
                'email' => 'mmlp@gmail.com',
                'birthdate' => '2019-05-23',
                'birthplace' => 'calauan,laguna',
                'address' => 'calauan,laguna',
                'status' => 0,//new
                'grade_level_id' => '1',
            ]
        ];
        foreach ($students as $student) {
            Enrollee::create($student);
        }
        $families = [
            [
                'student_lrn' => '123456789103',
                'name' => 'Dino Sy Tamad 1',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship' => 'Father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_lrn' => '123456789103',
                'name' => 'Gina Dy Tamad 1',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship' => 'Mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_lrn' => '123456789103',
                'name' => 'Gina Dy Tamad 1',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
            ],
            [
                'student_lrn' => '123456789104',
                'name' => 'Dino Sy Tamad 2',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456782',
                'email' => 'dinosyt@gmail.com',
                'relationship' => 'Father',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_lrn' => '123456789104',
                'name' => 'Gina Dy Tamad 2',
                'birthdate' => '2000-05-23',
                'contact_no' => '09123456789',
                'email' => 'ginadyt@gmail.com',
                'relationship' => 'Mother',
                'occupation' => 'Teacher',
                'office_contact_no' => '09123456785',
            ],
            [
                'student_lrn' => '123456789104',
                'name' => 'Gina Dy Tamad 2',
                'relationship' => 'Guardian',
                'contact_no' => '09123456789',
            ]
        ];
        foreach ($families as $family) {
            Enrollee_Student_Family::create($family);
        }
    }
}
