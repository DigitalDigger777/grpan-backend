<?php

use Illuminate\Database\Seeder;
use App\JobCategory;

class JobCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new JobCategory();
        $category->name = 'Business';
        $category->locale = 'EN';

        $category->save();

        $category = new JobCategory();
        $category->name = 'Marketing';
        $category->locale = 'EN';

        $category->save();

        $category = new JobCategory();
        $category->name = 'Product';
        $category->locale = 'EN';

        $category->save();

        $category = new JobCategory();
        $category->name = 'Human resources';
        $category->locale = 'EN';

        $category->save();
    }
}
