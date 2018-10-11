<?php

namespace App\Http\Controllers;

use App\LegalPage;
use Illuminate\Http\Request;

class LegalPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locale = $request->get('locale', "EN");
        $pages = LegalPage::where('locale', $locale)->get();
        return view('admin/legal_page/items', [
            'pages' => $pages,
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
        $page = new LegalPage();
        return view('admin/legal_page/form', [
            'page' => $page
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
            'title'     => 'required',
            'content'   => 'required',
            'locale'    => 'required'
        ]);

        $page = new LegalPage([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'locale' => $request->get('locale')
        ]);

        $page->save();

        return redirect('admin/legal-pages')->with('success', 'Legal Page has been added');
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
        $page = LegalPage::find($id);
        return view('admin/legal_page/form', [
            'page' => $page
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
            'title'     => 'required',
            'content'   => 'required',
            'locale'    => 'required'
        ]);

        $page = LegalPage::find($id);
        $page->title = $request->get('title');
        $page->content = $request->get('content');
        $page->locale = $request->get('locale');

        $page->save();

        return redirect('admin/legal-pages')->with('success', 'Legal Page has been updated');
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
