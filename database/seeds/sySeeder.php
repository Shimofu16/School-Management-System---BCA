<?php

use App\School_year;
use Illuminate\Database\Seeder;

class sySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sys = [['school_year'=>'SY 2022 - 2023']];
        foreach ($sys as $sy) {
            School_year::create($sy);
        }
    }
}
