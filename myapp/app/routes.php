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
Route::any('golfcourses', 'CourseSearchController@courses');

/* Course Listing With A Posted Search 'place' */
/* Route::post('golfcourses', 'PagesController@courses');*/

/* Course Profile Page */
Route::get('golfcourses/profile/{urlid}',  'CourseProfileController@profile');

/* About Page */
Route::get('about', 'PagesController@about');

/* News Page */
//Route::get('news', 'NewsController@news');

/* Terms Page */
Route::get('terms', 'TermsController@terms');

/* Privacy Page */
Route::get('privacy', 'PrivacyController@privacy');

/* Maps Page */
Route::get('maps', 'MapsController@maps');

/* ALL AJAX ROUTES */
Route::get('ajax/coursesearch','AjaxController@coursesearch');