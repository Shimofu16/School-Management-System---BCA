<?php

use Illuminate\Database\Seeder;
use App\Subject;

class subjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            ['subject' => 'Math','grade_level_id'=>1],
            ['subject' => 'English','grade_level_id'=>1],
            ['subject' => 'English','grade_level_id'=>1],
        ];
        foreach ($subjects as $subject) {
            Subject::create($subject);
        }


    }
}
