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
            subjectsSeeder::class,
            sectionSeeder::class,
            gradelevelSeeder::class,
            sySeeder::class,
            enrolledSeeder::class,
            enrolleeSeeder::class,
            userSeeder::class,
            adminSeeder::class,

        ]);
    }
}
