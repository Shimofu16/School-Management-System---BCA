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
            ['subject' => 'Math'],
            ['subject' => 'English'],
            ['subject' => 'English',]
        ];
        foreach ($subjects as $subject) {
            Subject::create($subject);
        }


    }
}
