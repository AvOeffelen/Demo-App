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
            'name' => 'physical_vitality',
            'display_name' => 'Fysieke vitaliteit',
            'tag' => 'physical'
        ]);
        DB::table('workshop_category')->insert([
            'name' => 'mental_vitality',
            'display_name' => 'Mentale vitaliteit',
            'tag' => 'mental'
        ]);
        DB::table('workshop_category')->insert([
            'name' => 'growth',
            'display_name' => 'Ontwikkeling',
            'tag' => 'growth'
        ]);
        DB::table('category')->insert([
            'name' => 'topical',
            'display_name' => 'Actueel',
        ]);
        DB::table('category')->insert([
            'name' => 'physical_vitality',
            'display_name' => 'Fysieke vitaliteit',
        ]);
        DB::table('category')->insert([
            'name' => 'mental_vitality',
            'display_name' => 'Mentale vitaliteit',
        ]);
        DB::table('category')->insert([
            'name' => 'growth',
            'display_name' => 'Ontwikkeling',
        ]);
        DB::table('category')->insert([
            'name' => 'one_on_one',
            'display_name' => 'Persoonlijke begeleiding',
        ]);
    }
}
