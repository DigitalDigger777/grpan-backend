<?php

namespace App\Http\Controllers;

use App\JobCategory;
use Illuminate\Http\Request;

/**
 * Class JobCategoryController
 * @package App\Http\Controllers
 */
class JobCategoryController extends Controller
{
    /**
     * GameCategoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

        $categories = JobCategory::where('locale', $locale)->get();
        return view('admin/job/category/items', [
            'categories' => $categories,
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
        $category = new JobCategory();

        return view('admin/job/category/form', [
            'category' => $category
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
            'name'    => 'required',
            'locale' => 'required'
        ]);


        $category = new JobCategory([
            'name'    => $request->get('name'),
            'locale' => $request->get('locale')
        ]);

        $category->save();

        return redirect('admin/job-category')->with('success', 'Category has been added');
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
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $category = JobCategory::find($id);
        return view('admin/job/category/form', [
            'category' => $category
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
            'name'    => 'required',
            'locale' => 'required'
        ]);

        $category = JobCategory::find($id);
        $category->name = $request->get('name');
        $category->locale = $request->get('locale');

        $category->save();

        return redirect('admin/job-category')->with('success', 'Category has been updated');
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
