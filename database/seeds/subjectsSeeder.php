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
        Subject::create([
            'subject' => 'Math',
        ]);
        Subject::create([
            'subject' => 'English',
        ]);
        Subject::create([
            'subject' => 'P.E',
        ]);
    }
}
