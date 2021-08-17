<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
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
        Category::get()->each(function($category){
            Article::factory(5)->create([
                "category_id" => $category->id, // surcharge create to pass the current category id
            ]); //create 5 articles per catory with the fields in definition() in ArticleFactory
        });
        // $faker = Factory::create();

        // for ($articleNumber=0; $articleNumber < 26; $articleNumber++) { 
        //     Article::create([
        //         'title' => $faker->sentence(),
        //         'subtitle' => $faker->sentence(),
        //         'content' => $faker->text($maxNbChars = 600),
        //         'category_id' => Category::inRandomOrder()->first()->id,
        //     ]);
        // }
    }
}
