<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/admin/game-category','GameCategoryController');
Route::resource('/admin/game','GameController');
Route::resource('/admin/job-category','JobCategoryController');
Route::resource('/admin/job','JobController');
Route::resource('/admin/legal-pages','LegalPageController');
Route::resource('/admin/testimonials','TestimonialController');
Route::resource('/admin/static-content','StaticContentController');
Route::resource('/admin/setting','SettingController');
