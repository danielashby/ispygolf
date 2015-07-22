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
Route::any('golf-courses', 'CourseSearchController@courses');
Route::get('golf-courses/{urlid}',  'CourseProfileController@profile');
Route::get('enquiries', 'EnquiriesController@enquiries');

/* Golf Breaks */
Route::any('golf-breaks', 'GolfbreaksSearchController@golfbreaks');
Route::get('golf-breaks/{urlid}',  'GolfbreaksProfileController@profile');

/* About Page */
Route::get('about', 'PagesController@about');

/* News Page */
//Route::get('news', 'NewsController@news');

/* golfdays Page */
Route::get('golf-days', 'GolfdaysController@golfdays');

/* golfmembership Page */
Route::get('golf-membership', 'GolfmembershipController@golfmembership');

/* Offers Page */
Route::get('offers', 'OffersController@offers');

/* Terms Page */
Route::get('terms', 'TermsController@terms');

/* Privacy Page */
Route::get('privacy', 'PrivacyController@privacy');

/* Maps Page */
Route::get('golf-course-maps/united-kingdom', 'MapsController@maps');

/* ALL AJAX ROUTES */
Route::get('ajax/coursesearch','AjaxController@coursesearch');
Route::get('ajax/golfbreakssearch','AjaxController@golfbreakssearch');