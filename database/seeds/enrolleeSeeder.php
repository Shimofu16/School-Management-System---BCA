<?php

use App\Enrollee;
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
            'contact' => '09123456789',
            'birthdate' => '2019-05-23',
            'birthplace' => 'calauan,laguna',
            'address' => 'calauan,laguna',
            'grade_level_id' => '1',
        ]);
    }
}
