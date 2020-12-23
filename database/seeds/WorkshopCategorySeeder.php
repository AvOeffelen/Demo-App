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
<<<<<<< HEAD
=======
        //useless comment
>>>>>>> development
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
        ]);
        DB::table('category')->insert([
            'name' => 'Fysieke vitaliteit',
        ]);
        DB::table('category')->insert([
            'name' => 'Mentale vitaliteit',
        ]);
        DB::table('category')->insert([
            'name' => 'Ontwikkeling',
        ]);
        DB::table('category')->insert([
            'name' => '1 op 1',
        ]);
    }
}
