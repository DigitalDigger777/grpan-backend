<?php

namespace App\Http\Controllers;

use App\Library\StaticContentBuilder;
use App\StaticContent;
use Illuminate\Http\Request;

class StaticContentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $locale = $request->get('locale', "EN");
        $items = StaticContent::where('locale', $locale)->get();

        return view('admin/static_content/items', [
            'items' => $items,
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $content = StaticContent::find($id);
        return view('admin/static_content/form', [
            'content' => $content
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
        $staticContentBuilder = new StaticContentBuilder();
        $data = $staticContentBuilder->build($request);

        if (count($data) > 0) {
            $staticContent = StaticContent::find($id);
            $staticContent->data = $data;
            $staticContent->save();
        }

        return redirect('/admin/static-content')->with('success', 'Static Content has been updated');
    }

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
