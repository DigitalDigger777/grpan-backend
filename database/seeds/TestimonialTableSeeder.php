<?php

use Illuminate\Database\Seeder;
use App\Testimonial;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonial = new Testimonial();
        $testimonial->name = "Large Scale User Acquisition";
        $testimonial->description = "We’ve acquired more than 50M active users in the last 6 months for our hyper-casual games. We have the know-how and cross promotion to scale your game to the top rankings without sacrificing ROI.";
        $testimonial->image = "public/testimonial_images/illu_UA.png";
        $testimonial->ordering = 0;
        $testimonial->locale = "EN";

        $testimonial->save();

        $testimonial = new Testimonial();
        $testimonial->name = "Smart Monetization";
        $testimonial->description = "We’re always working to find the right balance of user experience and revenue generation across all our games. We have special advertising deals with all top networks to achieve the best LTV.";
        $testimonial->image = "public/testimonial_images/illu_monetization.png";
        $testimonial->ordering = 0;
        $testimonial->locale = "EN";

        $testimonial->save();

        $testimonial = new Testimonial();
        $testimonial->name = "Project Management";
        $testimonial->description = "Marketing and advertising is half the battle. We have a dedicated game design and project management team to support game development. Our best practices and A/B testing framework guarantee continuous improvement in your game metrics.";
        $testimonial->image = "public/testimonial_images/illu_project.png";
        $testimonial->ordering = 0;
        $testimonial->locale = "EN";

        $testimonial->save();

        $testimonial = new Testimonial();
        $testimonial->name = "Clear terms";
        $testimonial->description = "We aim for long term partnerships. Our terms are simple, transparent and attractive.";
        $testimonial->image = "public/testimonial_images/illu_terms.png";
        $testimonial->ordering = 0;
        $testimonial->locale = "EN";

        $testimonial->save();
    }
}
