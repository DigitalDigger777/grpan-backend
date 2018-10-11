<?php

namespace App\Http\Controllers;

use App\Game;
use App\GameCategory;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locale = $request->get('locale', "EN");
        $games = Game::where('locale', $locale)->get();
        return view('admin/game/items', [
            'games' => $games,
            'locale' => $locale
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = GameCategory::all();
        $game = new Game();
        return view('admin/game/form', [
            'game' => $game,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url'    => 'required',
            'image'  => 'required',
            'locale' => 'required'
        ]);

        $path = $request->file('image')->store('public/images');

        $game = new Game([
            'url'    => $request->get('url'),
            'image'  => $path,
            'locale' => $request->get('locale')
        ]);

        $game->save();

        return redirect('/admin/game')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = GameCategory::all();

        $game = Game::find($id);
        return view('admin/game/form', [
            'game' => $game,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'url'    => 'required',
            'image'  => 'required',
            'locale' => 'required'
        ]);

        $path = $request->file('image')->store('public/images');

        $game = Game::find($id);
        $game->url = $request->get('url');
        if ($path) {
            $game->image = $path;
        }
        $game->locale = $request->get('locale');

        $game->save();

        return redirect('/admin/game')->with('success', 'Game has been updated');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
