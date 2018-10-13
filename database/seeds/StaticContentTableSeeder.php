<?php

use Illuminate\Database\Seeder;
use App\StaticContent;
use App\Library\StaticContentBuilder;

/**
 * Class StaticContentTableSeeder
 */
class StaticContentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->load('EN');
        $this->load('FR');
        $this->load('RU');
    }

    /**
     * @param $locale
     */
    private function load($locale)
    {
        $homePage = new StaticContent();
        $homePage->route = '/';
        $homePage->data = [
            'header' => [
                'title' => 'We make your game a hit'
            ],
            'our_story' => [
                'title' => 'Our Story',
                'text' => 'Green Panda Games began in 2013 as a mobile gaming studio developing various hit classical games such as Solitaire, Blackjack, Logo Quiz and Sudoku. After much success in this field, we pivoted to a much bigger genre of games.
We are now a leading mobile games publisher dedicated to making your hyper-casual game a HIT.'
            ],
            'success_story' => [
                'slides' => [
                    [
                        'title' => 'Success story',
                        'text' => '« The Green Panda team impressed us at every stage with their expertise, professionalism and dedication. (…) They were with us every step of the way to create Golf Orbit and together we&apos;ve made it a success !  We found a genuine partner in Green Panda and will continue to work closely with them to create hit games.»'
                    ],
                    [
                        'title' => 'Success story',
                        'text' => '« The Green Panda team impressed us at every stage with their expertise, professionalism and dedication. (…) They were with us every step of the way to create Golf Orbit and together we&apos;ve made it a success !  We found a genuine partner in Green Panda and will continue to work closely with them to create hit games.»'
                    ],
                    [
                        'title' => 'Success story',
                        'text' => '« The Green Panda team impressed us at every stage with their expertise, professionalism and dedication. (…) They were with us every step of the way to create Golf Orbit and together we&apos;ve made it a success !  We found a genuine partner in Green Panda and will continue to work closely with them to create hit games.»'
                    ],
                ]
            ],
            'news' => [
                'title' => 'Green Panda News',
                'text' => 'Stay in touch and get fresh updates about Green Panda Games!'
            ]
        ];
        $homePage->locale = $locale;

        $homePage->save();

        $homePage = new StaticContent();
        $homePage->route = '/publishing';
        $homePage->data = [
            'header' => [

                'title' => 'Let’s create a successful story together',
                'text' => 'A team of mobile experts dedicated to your success'
            ],
            'success_story' => [
                'slides' => [
                    [
                        'title' => 'Pinpin Team',
                        'text' => '«The Green Panda team impressed us at every stage with their expertise, professionalism and dedication. (…) They were with us every step of the way to create Golf Orbit and together we&apos;ve made it a success !  We found a genuine partner in Green Panda and will continue to work closely with them to create hit games.»'
                    ],
                    [
                        'title' => 'Pinpin Team',
                        'text' => '« The Green Panda team impressed us at every stage with their expertise, professionalism and dedication. (…) They were with us every step of the way to create Golf Orbit and together we&apos;ve made it a success !  We found a genuine partner in Green Panda and will continue to work closely with them to create hit games.»'
                    ],
                    [
                        'title' => 'Pinpin Team',
                        'text' => '« The Green Panda team impressed us at every stage with their expertise, professionalism and dedication. (…) They were with us every step of the way to create Golf Orbit and together we&apos;ve made it a success !  We found a genuine partner in Green Panda and will continue to work closely with them to create hit games.»'
                    ],
                ]
            ],
            'bottom' => [
                'title' => 'Learn more about our published games ?'
            ]
        ];
        $homePage->locale = $locale;

        $homePage->save();

        //==========================
        $homePage = new StaticContent();
        $homePage->route = '/games';
        $homePage->data = [
            'header' => [
                'title' => 'Our games',
                'text' => 'We create successful games with talented partners'
            ],
            'bottom' => [
                'title' => 'Want to learn more about publishing?',
                'text' => 'Please contact our team if you need more information or if you have a
game you want to publish with us. We will reply to you as soon as possible !'
            ]
        ];
        $homePage->locale = $locale;

        $homePage->save();

        //=================================
        $homePage = new StaticContent();
        $homePage->route = '/jobs';
        $homePage->data = [
            'header' => [
                'title' => 'Jobs',
                'text' => 'Join & help us to build next hit games'
            ],
            'bottom' => [
                'title' => 'Learn more about our published games ?'
            ]
        ];
        $homePage->locale = $locale;

        $homePage->save();

        //===========================
        $homePage = new StaticContent();
        $homePage->route = '/support';
        $homePage->data = [
            'header' => [
                'title' => 'Player support',
                'text' => 'A question​?​ ​Perhaps even a suggestion? We\'d be happy to hear from you, and we\'ll get back to you with an answer as soon as we can!'
            ]
        ];
        $homePage->locale = $locale;

        $homePage->save();        
    }
}
