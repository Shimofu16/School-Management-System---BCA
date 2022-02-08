<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            teacherSeeder::class,
            gradelevelSeeder::class,
            subjectsSeeder::class,
            sectionSeeder::class,
            sySeeder::class,
            enrolledSeeder::class,
            enrolleeSeeder::class,
            userSeeder::class,
            adminSeeder::class,

        ]);
    }
}
