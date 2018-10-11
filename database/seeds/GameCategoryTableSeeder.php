<?php

use Illuminate\Database\Seeder;
use App\GameCategory;

class GameCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new GameCategory();
        $category->name = 'Published Games';
        $category->locale = 'EN';

        $category->save();

        $category = new GameCategory();
        $category->name = 'Classic Games';
        $category->locale = 'EN';

        $category->save();
    }
}
