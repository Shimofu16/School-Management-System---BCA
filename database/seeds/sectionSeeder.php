<?php

use Illuminate\Database\Seeder;
use App\Section;
class sectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            ['section_name' => 'Balmaceda'],
            ['section_name' => 'Atalia'],
            ['section_name' => 'Bakawan'],
        ];
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
