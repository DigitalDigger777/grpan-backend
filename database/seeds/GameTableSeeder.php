<?php

use Illuminate\Database\Seeder;
use App\Game;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $category_public_games = \App\GameCategory::where('name', 'Published Games')->first();
        $category_classic_games = \App\GameCategory::where('name', 'Classic Games')->first();

        $this->load('EN', $category_public_games);
        $this->load('EN', $category_classic_games);

    }
    
    private function load($locale, $category)
    {
        $game = new Game();
        $game->name = 'Golf Orbit';
        $game->url = '#';
        $game->image = 'public/images/preview_golf_orbit.png';
        $game->locale = $locale;
        $game->category()->associate($category);
        $game->save();


        $game = new Game();
        $game->name = 'Bee factory';
        $game->url = '#';
        $game->image = 'public/images/preview_bee_factory.png';
        $game->locale = $locale;
        $game->category()->associate($category);
        $game->save();

        $game = new Game();
        $game->name = 'Emoji craft';
        $game->url = '#';
        $game->image = 'public/images/preview_emoji_craft.png';
        $game->locale = $locale;
        $game->category()->associate($category);
        $game->save();

        $game = new Game();
        $game->name = 'Axe climber';
        $game->url = '#';
        $game->image = 'public/images/preview_axe_climber.png';
        $game->locale = $locale;
        $game->category()->associate($category);
        $game->save();

        $game = new Game();
        $game->name = 'Terrarium';
        $game->url = '#';
        $game->image = 'public/images/preview_terrarium.png';
        $game->locale = $locale;
        $game->category()->associate($category);
        $game->save();

        $game = new Game();
        $game->name = 'Golf boy';
        $game->url = '#';
        $game->image = 'public/images/preview_golf_boy.png';
        $game->locale = $locale;
        $game->category()->associate($category);
        $game->save();

        $game = new Game();
        $game->name = 'Fish Orbit';
        $game->url = '#';
        $game->image = 'public/images/preview_fish_orbit.png';
        $game->locale = $locale;
        $game->category()->associate($category);
        $game->save();        
    }
}

