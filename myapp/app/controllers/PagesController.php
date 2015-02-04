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
		
		$selected_venues_per_page = 10;
		$selected_venues_order = "PHL";
		
		//Get post variables if passed from search
		if (Input::has('vpp')){$selected_venues_per_page = 	Input::get( 'vpp' );}
		if (Input::has('vorder')){$selected_venues_order = 	Input::get( 'vorder' );}
		
		//Sort by price
		if($selected_venues_order=="PLH") 
		{
			$venues_order_field = "COURSES.COURSE_HIGH_WEEK";
			$venues_order = "asc";
		}
		else
		{
			//Default sort order 
			$venues_order_field = "COURSES.COURSE_HIGH_WEEK";
			$venues_order = "desc";
		}
		
		/* Show courses. If place post variable set then use for search else display all */
		if (Input::has('place'))
		{
			
			$searchStr = Input::get( 'place' );
			
			$courses = DB::table('CLUBS')
			    ->leftJoin('SERVICES', 'CLUBS.CLUB_ID', '=', 'SERVICES.SERV_ID')
				->leftJoin('COURSES', 'CLUBS.CLUB_ID', '=', 'COURSES.CLUB_ID')
				->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')
				->leftJoin('SPECOFFERS', 'COURSES.CLUB_ID', '=', 'SPECOFFERS.OFFER_ID')
				->leftJoin('FACILITIES', 'CLUBS.CLUB_ID', '=', 'FACILITIES.FAC_ID')				
				->leftJoin('SYS_CLUBS_USERS', 'CLUBS.CLUB_ID', '=', 'SYS_CLUBS_USERS.CLUB_ID')
				->leftJoin('ISPYCARD', 'COURSES.CLUB_ID', '=', 'ISPYCARD.CLUB_ID')				
				->where('SYS_CLUBS_USERS.COURSES','1')
				->orderBy('SYS_CLUBS_USERS.ONSTOP','asc')->orderBy($venues_order_field,$venues_order)
				->paginate($selected_venues_per_page);
		}
		else
		{
			//Course page loaded from fresh or option selected from sort.
			
			$orderby = "order by SYS_CLUBS_USERS.ONSTOP, COURSES.COURSE_HIGH_WEEK DESC";
				  			  
			$courses = DB::table('CLUBS')
			    ->leftJoin('SERVICES', 'CLUBS.CLUB_ID', '=', 'SERVICES.SERV_ID')
				->leftJoin('COURSES', 'CLUBS.CLUB_ID', '=', 'COURSES.CLUB_ID')
				->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')
				->leftJoin('SPECOFFERS', 'COURSES.CLUB_ID', '=', 'SPECOFFERS.OFFER_ID')
				->leftJoin('FACILITIES', 'CLUBS.CLUB_ID', '=', 'FACILITIES.FAC_ID')				
				->leftJoin('SYS_CLUBS_USERS', 'CLUBS.CLUB_ID', '=', 'SYS_CLUBS_USERS.CLUB_ID')
				->leftJoin('ISPYCARD', 'COURSES.CLUB_ID', '=', 'ISPYCARD.CLUB_ID')				
				->where('SYS_CLUBS_USERS.COURSES','1')
				->orderBy('SYS_CLUBS_USERS.ONSTOP','asc')->orderBy($venues_order_field,$venues_order)
				->paginate($selected_venues_per_page);
		}
		
		
		//SET STANDARD FIELD OPTIONS
		foreach($courses as $course)
		{
			if($course->IMG_SEARCH2 == "") {$course->IMG_SEARCH2 = "/images/noimage.jpg";}
			
		}
		
		
		/*$queries = DB::getQueryLog();
		$last_query = end($queries);
		//dd($last_query);
		echo $last_query['query'];
		die;
		exit;*/
		
		//$courses = Paginator::make($courses,count($courses),$venues_per_page);
		
		//dd($courses);
		
		return View::make('courses.search')->with('courses',$courses)->with('venues_per_page',$selected_venues_per_page)->with('venues_order',$selected_venues_order);
		
	}
	
	
	public function course_show($urlid)
	{
		$club = Club::findOrFail($urlid);

		return View::make('courses.profile',compact('club'));
	
	}
	

	

}
