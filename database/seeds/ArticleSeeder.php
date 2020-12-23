<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => 'Covid',
        ]);

        DB::table('article')->insert([
            'title' => 'Has video',
            'has_video' => 1,
            'category_id' => 6,
            'text' => "bla bla bla",
            'video_link' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/gsWPpE4Rid0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'image_link' => null,
            'button_text' => 'google',
            'button_link' => 'www.google.com',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('article')->insert([
            'title' => 'Has Image',
            'has_video' => 0,
            'category_id' => 6,
            'text' => "bla bla bla",
            'video_link' => null,
            'image_link' => "https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg",
            'button_text' => 'google',
            'button_link' => 'www.google.com',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('article')->insert([
            'title' => 'Has video',
            'has_video' => 1,
            'category_id' => 5,
            'text' => "bla bla bla",
            'video_link' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/gsWPpE4Rid0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
            'image_link' => null,
            'button_text' => 'google',
            'button_link' => 'www.google.com',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);

        DB::table('article')->insert([
            'title' => 'Has Image',
            'has_video' => 0,
            'category_id' => 5,
            'text' => "bla bla bla",
            'video_link' => null,
            'image_link' => "https://www.bravissamenvitaal.nl/wp-content/uploads/2020/02/iStock-1058457940-2-495x400.jpg",
            'button_text' => 'google',
            'button_link' => 'www.google.com',
            'updated_at' => \Carbon\Carbon::now(),
            'created_at' => \Carbon\Carbon::now(),

        ]);
    }
}
