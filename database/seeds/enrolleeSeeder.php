<?php

use App\Enrollee;
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
        Enrollee::create([
            'student_lrn' => '012345678910',
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
        ]);
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
