<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobCategory;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $locale = $request->get('locale', "EN");
        $jobs = Job::where('locale', $locale)->get();
        return view('admin/job/items', [
            'jobs' => $jobs,
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
        $job = new Job();
        $categories = JobCategory::all();
        return view('admin/job/form', [
            'job' => $job,
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
            'name'    => 'required',
            'locale' => 'required'
        ]);

        $categoryId = $request->get('category');

        $category = JobCategory::find($categoryId);

        $job = new Job([
            'name'    => $request->get('name'),
            'city'    => $request->get('city'),
            'ordering'    => $request->get('ordering'),
            'locale' => $request->get('locale')
        ]);
        $job->category()->associate($category);

        $job->save();

        return redirect('admin/job')->with('success', 'Job has been added');
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
        $categories = JobCategory::all();
        $job = Job::find($id);

        return view('admin/job/form', [
            'job' => $job,
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
            'name'    => 'required',
            'locale' => 'required'
        ]);

        $categoryId = $request->get('category');

        $category = JobCategory::find($categoryId);

        $job = Job::find($id);
        $job->name = $request->get('name');
        $job->locale = $request->get('locale');
        $job->category()->associate($category);

        $job->save();

        return redirect('admin/job')->with('success', 'Job has been updated');
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
