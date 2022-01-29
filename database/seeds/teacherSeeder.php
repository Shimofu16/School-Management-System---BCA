<?php

use Illuminate\Database\Seeder;
use App\Teacher;
class teacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = [
            ['name' => 'Roy Joseph M. Latayan','gender' => 'Male','age' => '26','contact' => '09512370553','email' => 'royjosephlatayan16@gmail.com',],
            ['name' => 'Moureen L. Potanoza','gender' => 'Female','age' => '26','contact' => '09512370551','email' => 'moureenlpontanoza@gmail.com',],
            ['name' => 'Paul Aedrian Albaytan','gender' => 'Male','age' => '26','contact' => '09512370511','email' => 'paulaedrianalbaytar@gmail.com',]
        ];
        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
