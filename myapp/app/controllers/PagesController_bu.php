<?php


class PagesController extends \BaseController {


	public function index()
	{
	
		return View::make('pages.home');
	}


	public function about()
	{
	
		return View::make('pages.about');
	}


	public function courses()
	{
		
		$venues_per_page = 20;
		$venues_order = "PHL";
		
		if (Input::has('vpp'))
		{
			$venues_per_page = 	Input::get( 'vpp' );
		}
		
		if (Input::has('vorder'))
		{
			$venues_order = 	Input::get( 'vorder' );
		}
		
		
		/* Show courses. If place post variable set then use for search else display all */
		if (Input::has('place'))
		{
			$searchStr = Input::get( 'place' );
			$clubs = Club::where('CLUB_ADD1', 'LIKE', "%$searchStr%" )->paginate($venues_per_page);
			
		}
		else
		{
			//Course page loaded from fresh or option selected from sort.
			
			//$clubs = Club::paginate($venues_per_page);
			//$courses = Course::orderBy('COURSE_NAME','DESC')->paginate($venues_per_page);
			
			$courses = Course::with(array(
			'courseimages' => function($query)
			{
				 //$query->where('IMG_SEARCH2','!=',' ');
				 $query->Where('IMG_SEARCH2','!=','');
			},
			'siteuser' => function($query)
			{
				$query->where('COURSES','=', 1);
			}
			))->orderBy('COURSE_HIGH_WEEK','DESC')
			->paginate($venues_per_page);

			//var_dump($query);
			//dd(DB::getQueryLog());

			//dd($courses);

		    //$courses = Course::orderBy('COURSE_NAME','DESC')->leftjoin('courses','courses.CLUB_ID','=','sys_clubs_users.CLUB_ID')->paginate($venues_per_page);
		}
		
		
		//dd($courses);
		
		return View::make('courses.search')->with('courses',$courses)->with('venues_per_page',$venues_per_page)->with('venues_order',$venues_order);
		
		
		
		//NOTE - Below are alternative ways of passing data to the view 
		//return View::make('pages.courses',['courses'=>$courses,'name'=>$name]);
		//return View::make('pages.courses')->with('courses',$courses);
	}
	
	
	public function course_show($urlid)
	{
		$club = Club::findOrFail($urlid);

		return View::make('courses.profile',compact('club'));
	
	}
	

	

}
