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
            ['section_name' => 'Balmaceda','grade_level_id'=>1],
            ['section_name' => 'Atalia','grade_level_id'=>2],
            ['section_name' => 'Bakawan','grade_level_id'=>3],
        ];
        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}
