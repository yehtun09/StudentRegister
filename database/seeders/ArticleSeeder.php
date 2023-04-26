<?php

namespace Database\Seeders;

use App\Models\Article;
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
        Article::truncate();

        $data= \Faker\Factory::create();

        for($i=0; $i < 50; $i++) {
            Article::create([
                "title"=> $data->sentence,
                "description"=> $data->paragraph,
            ]);
        }


    }
}
