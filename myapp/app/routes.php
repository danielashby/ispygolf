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



/*============================= COURSE SEARCH AND PROFILE PAGE ROUTES ============================= 

/* Course Search Page*/
Route::any('golfcourses', 'CourseSearchController@courses');
/* Course Profile Page */
Route::get('golfcourses/profile/{urlid}', 'CourseProfileController@profile');


/* Offers Search Page */
Route::get('offers', 'OffersController@offers');



/* About Page */
Route::get('about', 'AboutController@about');
/* News Page */
Route::get('news', 'NewsController@news');
/* Maps Page */
Route::get('maps', 'MapsController@maps');




/* ALL AJAX ROUTES */
Route::get('ajax/coursesearch','AjaxController@coursesearch');