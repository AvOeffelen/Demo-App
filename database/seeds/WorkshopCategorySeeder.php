<?php

use Illuminate\Database\Seeder;

class WorkshopCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('workshop_category')->insert([
            'name' => 'Fysieke vitaliteit',
            'tag' => 'physical'
        ]);
        DB::table('workshop_category')->insert([
            'name' => 'Mentale vitaliteit',
            'tag' => 'mental'
        ]);
        DB::table('workshop_category')->insert([
            'name' => 'Ontwikkeling',
            'tag' => 'growth'
        ]);
    }
}
