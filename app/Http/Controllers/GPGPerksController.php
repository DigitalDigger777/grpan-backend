<?php

namespace App\Http\Controllers;

use App\GPGPerk;
use Illuminate\Http\Request;

class GPGPerksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $locale = $request->get('locale', "EN");
        $testimonials = GPGPerk::where('locale', $locale)->get();

        return view('admin/gpg_perks/items', [
            'testimonials' => $testimonials,
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
        $testimonial = new GPGPerk();
        return view('admin/gpg_perks/form', [
            'testimonial' => $testimonial
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
            'name'          => 'required',
            'description'   => 'required',
            'image'         => 'required',
            'ordering'      => 'required',
            'locale'        => 'required'
        ]);

        $path = $request->file('image')->store('public/testimonial_images');

        $testimonial = new GPGPerk([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'image' => $path,
            'ordering' => $request->get('ordering'),
            'locale' => $request->get('locale')
        ]);

        $testimonial->save();

        return redirect('admin/gpg-perks?locale=' . $request->get('locale'))->with('success', 'GPGPerks has been added');
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
        $testimonial = GPGPerk::find($id);

        return view('admin/gpg_perks/form', [
            'testimonial' => $testimonial
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
            'name'          => 'required',
            'description'   => 'required',
            'locale'        => 'required'
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('public/testimonial_images');
        }

        $testimonial = GPGPerk::find($id);
        $testimonial->name = $request->get('name');
        $testimonial->description = $request->get('description');

        if ($request->file('image')) {
            $testimonial->image = $path;
        }

        $testimonial->ordering = $request->get('ordering');
        $testimonial->locale = $request->get('locale');

        $testimonial->save();

        return redirect('admin/gpg-perks?locale=' . $request->get('locale'))->with('success', 'GPGPerks has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = GPGPerk::find($id);
        $locale = $testimonial->locale;
        $testimonial->delete();

        return redirect('admin/gpg-perks?locale=' . $locale)->with('success', 'GPGPerks has been remove');
    }
}
