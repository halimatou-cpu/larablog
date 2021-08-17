<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Sport','Cuisine','Science','IT'];

        for ($categoryNumber=0; $categoryNumber < count($categories); $categoryNumber++) { 
            Category::create([
                'label' => $categories[$categoryNumber],
                ]);
        }
    }
}
