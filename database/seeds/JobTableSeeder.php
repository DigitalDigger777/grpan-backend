<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_business = \App\JobCategory::where('name', 'Business')->first();

        $job = new Job();
        $job->name = 'Business developper STAGE)';
        $job->city = 'Paris, Stage';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_business);
        $job->save();


        $job = new Job();
        $job->name = 'Business developper H/F CDI';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_business);
        $job->save();


        $category_marketing = \App\JobCategory::where('name', 'Marketing')->first();

        $job = new Job();
        $job->name = 'Digital marketing analyst H/F (STAGE FIN D’ETUDE)';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_marketing);
        $job->save();


        $job = new Job();
        $job->name = 'Digital marketing manager H/F (CDI)';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_marketing);
        $job->save();


        $job = new Job();
        $job->name = 'Digital advertising analyst H/F (STAGE)';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_marketing);
        $job->save();



        $job = new Job();
        $job->name = 'Digital advertising analyst H/F CDI';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_marketing);
        $job->save();


        $category_product = \App\JobCategory::where('name', 'Product')->first();
        $job = new Job();
        $job->name = 'Designer mobile CDI H/F';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_product);
        $job->save();


        $job = new Job();
        $job->name = 'HTML5 developer (STAGE FIN D’ETUDE)';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_product);
        $job->save();



        $job = new Job();
        $job->name = 'HTML5 developer';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_product);
        $job->save();


        $category_hr = \App\JobCategory::where('name', 'Human resources')->first();

        $job = new Job();
        $job->name = 'HR recruiter CDI H/F';
        $job->city = 'Paris, CDI';
        $job->ordering = 0;
        $job->locale = 'EN';
        $job->category()->associate($category_hr);
        $job->save();



    }
}
