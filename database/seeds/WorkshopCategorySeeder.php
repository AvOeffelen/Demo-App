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
        DB::table('category')->insert([
            'name' => 'Actueel',
            'display_name' => 'Actueel',
        ]);
        DB::table('category')->insert([
            'name' => 'Fysieke vitaliteit',
            'display_name' => 'Fysieke vitaliteit',
        ]);
        DB::table('category')->insert([
            'name' => 'Mentale vitaliteit',
            'display_name' => 'Mentale vitaliteit',
        ]);
        DB::table('category')->insert([
            'name' => 'Ontwikkeling',
            'display_name' => 'Ontwikkeling',
        ]);
        DB::table('category')->insert([
            'name' => '1 op 1',
            'display_name' => 'Persoonlijke begeleiding',
        ]);
    }
}
