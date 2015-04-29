<?php


class CourseProfileController extends \BaseController {

	
	public function profile($urlid)
	{
		$club = Club::findOrFail($urlid);

		return View::make('courses.profile',compact('club'));
	
	}
	

	

}
