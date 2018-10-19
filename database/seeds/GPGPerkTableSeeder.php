<?php

use Illuminate\Database\Seeder;
use App\GPGPerk;

class GPGPerkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gpgPerk = new GPGPerk();
        $gpgPerk->name = "Large Scale User Acquisition";
        $gpgPerk->description = "We’ve acquired more than 50M active users in the last 6 months for our hyper-casual games. We have the know-how and cross promotion to scale your game to the top rankings without sacrificing ROI.";
        $gpgPerk->image = "public/testimonial_images/illu_UA.png";
        $gpgPerk->ordering = 0;
        $gpgPerk->locale = "EN";

        $gpgPerk->save();

        $gpgPerk = new GPGPerk();
        $gpgPerk->name = "Smart Monetization";
        $gpgPerk->description = "We’re always working to find the right balance of user experience and revenue generation across all our games. We have special advertising deals with all top networks to achieve the best LTV.";
        $gpgPerk->image = "public/testimonial_images/illu_monetization.png";
        $gpgPerk->ordering = 0;
        $gpgPerk->locale = "EN";

        $gpgPerk->save();

        $gpgPerk = new GPGPerk();
        $gpgPerk->name = "Project Management";
        $gpgPerk->description = "Marketing and advertising is half the battle. We have a dedicated game design and project management team to support game development. Our best practices and A/B testing framework guarantee continuous improvement in your game metrics.";
        $gpgPerk->image = "public/testimonial_images/illu_project.png";
        $gpgPerk->ordering = 0;
        $gpgPerk->locale = "EN";

        $gpgPerk->save();

        $gpgPerk = new GPGPerk();
        $gpgPerk->name = "Clear terms";
        $gpgPerk->description = "We aim for long term partnerships. Our terms are simple, transparent and attractive.";
        $gpgPerk->image = "public/testimonial_images/illu_terms.png";
        $gpgPerk->ordering = 0;
        $gpgPerk->locale = "EN";

        $gpgPerk->save();
    }
}
