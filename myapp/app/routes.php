<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('users/{id}', function($id)
{
	$users = User::all();
	$user = User::find($id);

    return View::make('pages.users')->with('user', $user);
});

Route::get('/', 'PagesController@index');

/* Default Course Listing */
Route::any('golfcourses', 'PagesController@courses');

/* Course Listing With A Posted Search 'place' */
/* Route::post('golfcourses', 'PagesController@courses');*/

/* Course Profile Page */
Route::get('golfcourses/profile/{urlid}', 'PagesController@course_show');

/* About Page */
Route::get('about', 'PagesController@about');

/* News Page */
Route::get('news', 'NewsController@news');

/* Maps Page */
Route::get('maps', 'MapsController@maps');

/* ALL AJAX ROUTES */
Route::get('ajax/coursesearch','AjaxController@coursesearch');