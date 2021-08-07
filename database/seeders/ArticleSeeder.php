<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker\Factory;
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
        $faker = Factory::create();

        for ($articleNumber=0; $articleNumber < 26; $articleNumber++) { 
            Article::create([
                'title' => $faker->sentence(),
                'subtitle' => $faker->sentence(),
                'content' => $faker->text($maxNbChars = 600),
            ]);
        }
    }
}
