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


/* Course Listing With A Posted Search 'place' */
/* Route::post('golfcourses', 'PagesController@courses');*/

/* Courses */
Route::any('golfcourses', 'CourseSearchController@courses');
Route::get('golfcourses/profile/{urlid}',  'CourseProfileController@profile');
Route::get('enquiries', 'EnquiriesController@enquiries');

/* Golf Breaks */
Route::any('golfbreaks', 'GolfbreaksSearchController@golfbreaks');
Route::get('golfbreaks/profile/{urlid}',  'GolfbreaksProfileController@profile');

/* About Page */
Route::get('about', 'PagesController@about');

/* News Page */
//Route::get('news', 'NewsController@news');

/* golfdays Page */
Route::get('golfdays', 'GolfdaysController@golfdays');

/* golfmembership Page */
Route::get('golfmembership', 'GolfmembershipController@golfmembership');

/* Offers Page */
Route::get('offers', 'OffersController@offers');

/* Terms Page */
Route::get('terms', 'TermsController@terms');

/* Privacy Page */
Route::get('privacy', 'PrivacyController@privacy');

/* Maps Page */
Route::get('maps', 'MapsController@maps');

/* ALL AJAX ROUTES */
Route::get('ajax/coursesearch','AjaxController@coursesearch');