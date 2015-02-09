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
		$search_term = "";
		$search_name = "";
		$search_town = "";
		$search_region = "";
		$search_country = "";
		
		
		//if (Input::has('place')) {$search_term = Input::get( 'place' );}
		
		//Get post variables if passed from search
		if (Input::has('vpp')){$selected_venues_per_page = 	Input::get( 'vpp' );}
		if (Input::has('vorder')){$selected_venues_order = 	Input::get( 'vorder' );}	
		if (Input::has('country')){$search_country = 	Input::get( 'country' );}
		if (Input::has('region')){$search_region= 	Input::get( 'region' );}
		if (Input::has('town')){$search_town = 	Input::get( 'town' );}
		if (Input::has('name')){$search_name = 	Input::get( 'name' );}
		
		//SETUP SORT ORDER
		if($selected_venues_order=="PLH") 
		{
			$venues_order_field = "COURSES.COURSE_HIGH_WEEK";
			$venues_order = "asc";
		}
		else if($selected_venues_order=="IEH") 
		{
			$venues_order_field = "COURSES.COURSE_IDR_CHAMP";
			$venues_order = "asc";	
		
		}
		else if($selected_venues_order=="IHE") 
		{
			$venues_order_field = "COURSES.COURSE_IDR_CHAMP";
			$venues_order = "desc";	
		
		}
		else if($selected_venues_order=="VAZ") 
		{
			$venues_order_field = "CLUBS.CLUB_ADD1";
			$venues_order = "asc";	
		
		}
		else if($selected_venues_order=="VZA") 
		{
			$venues_order_field = "CLUBS.CLUB_ADD1";
			$venues_order = "desc";	
		
		}	
		else if($selected_venues_order=="CAZ") 
		{
			$venues_order_field = "CLUBS.CLUB_COUNTY";
			$venues_order = "asc";	
		
		}
		else if($selected_venues_order=="CZA") 
		{
			$venues_order_field = "CLUBS.CLUB_COUNTY";
			$venues_order = "desc";	
		
		}		
		else if($selected_venues_order=="SAZ") 
		{
			$venues_order_field = "COURSES.COURSE_STYLE";
			$venues_order = "asc";	
		
		}
		else if($selected_venues_order=="SZA") 
		{
			$venues_order_field = "COURSES.COURSE_STYLE";
			$venues_order = "desc";	
		
		}		
		else
		{
			//Default sort order 
			$venues_order_field = "COURSES.COURSE_HIGH_WEEK";
			$venues_order = "desc";
		}
		

						  
		$courses = DB::table('CLUBS')
			->leftJoin('SERVICES', 'CLUBS.CLUB_ID', '=', 'SERVICES.SERV_ID')
			->leftJoin('COURSES', 'CLUBS.CLUB_ID', '=', 'COURSES.CLUB_ID')
			->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')
			->leftJoin('SPECOFFERS', 'COURSES.CLUB_ID', '=', 'SPECOFFERS.OFFER_ID')
			->leftJoin('FACILITIES', 'CLUBS.CLUB_ID', '=', 'FACILITIES.FAC_ID')				
			->leftJoin('SYS_CLUBS_USERS', 'CLUBS.CLUB_ID', '=', 'SYS_CLUBS_USERS.CLUB_ID')
			->leftJoin('ISPYCARD', 'COURSES.CLUB_ID', '=', 'ISPYCARD.CLUB_ID')				
			->where('SYS_CLUBS_USERS.COURSES','1')
			->where("CLUBS.CLUB_ADD1","like","%".$search_name."%")
			->where("CLUBS.CLUB_COUNTRY","like","%".$search_country."%")
			->where("CLUBS.CLUB_CITY","like","%".$search_town."%")
			->where("CLUBS.CLUB_COUNTY","like","%".$search_region."%")
			->orderBy('SYS_CLUBS_USERS.ONSTOP','asc')->orderBy($venues_order_field,$venues_order)
			->paginate($selected_venues_per_page);
	
		
		
		//SET STANDARD FIELD OPTIONS
		foreach($courses as $course)
		{
			if($course->IMG_SEARCH2 == "") {$course->IMG_SEARCH2 = "/images/noimage.jpg";}
			
		}
		
		//SQL DEBUG OUTPUT
		/*$queries = DB::getQueryLog();
		$last_query = end($queries);
		//dd($last_query);
		echo $last_query['query'];
		die;
		exit;*/
		
		
		return View::make('courses.search')->with('courses',$courses)->with('venues_per_page',$selected_venues_per_page)->with('venues_order',$selected_venues_order);
		
	}
	
	
	public function course_show($urlid)
	{
		$club = Club::findOrFail($urlid);

		return View::make('courses.profile',compact('club'));
	
	}
	

	

}
