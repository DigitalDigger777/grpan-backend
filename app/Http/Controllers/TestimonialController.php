<?php

namespace App\Http\Controllers;

use App\Game;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $locale = $request->get('locale', "EN");
        $testimonials = Testimonial::where('locale', $locale)->get();

        return view('admin/testimonial/items', [
            'testimonials' => $testimonials,
            'locale' => $locale
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $testimonial = new Testimonial();
        $games = Game::all();

        return view('admin/testimonial/form', [
            'testimonial' => $testimonial,
            'games' => $games
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
        $request->user()->authorizeRoles(['admin']);
        $request->validate([
            'name'          => 'required',
            'signature'     => 'required',
            'description'   => 'required',
            'image'         => 'required',
            'ordering'      => 'required',
            'locale'        => 'required'
        ]);

        $path = $request->file('image')->store('public/testimonial_images');

        $testimonial = new Testimonial([
            'name'          => $request->get('name'),
            'signature'     => $request->get('signature'),
            'description'   => $request->get('description'),
            'image'         => $path,
            'ordering'      => $request->get('ordering'),
            'locale'        => $request->get('locale')
        ]);

        $gameId = $request->get('game');

        if ($gameId) {
            $game = Game::find($gameId);
            $testimonial->game()->associate($game);
        }
        $testimonial->save();

        return redirect('admin/testimonials')->with('success', 'Testimonials has been added');
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
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $testimonial = Testimonial::find($id);
        $games = Game::where('locale', 'en')->get();

        return view('admin/testimonial/form', [
            'testimonial' => $testimonial,
            'games' => $games
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
        $request->user()->authorizeRoles(['admin']);
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'locale'        => 'required'
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('public/testimonial_images');
        }

        $gameId = $request->get('game');



        $testimonial = Testimonial::find($id);
        $testimonial->name = $request->get('name');
        $testimonial->signature = $request->get('signature');
        $testimonial->description = $request->get('description');

        if ($request->file('image')) {
            $testimonial->image = $path;
        }

        $testimonial->ordering = $request->get('ordering');
        $testimonial->locale = $request->get('locale');

        if ($gameId) {
            $game = Game::find($gameId);
            $testimonial->game()->associate($game);
        }

        $testimonial->save();

        return redirect('admin/testimonials')->with('success', 'Testimonials has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $request->user()->authorizeRoles(['admin']);
        $testimonial = Testimonial::find($id);
        $testimonial->delete();

        return redirect('admin/testimonials')->with('success', 'Testimonials has been delete');
    }
}
