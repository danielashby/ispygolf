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
		$search_distance = "10";
		
		$orderby_opt1 = "PHL";
		$orderby_opt2 = "";
		
		$orderby_colname_1 = "";
		$orderby_colsort_1 = "";
		$orderby_colname_2 = "";
		$orderby_colsort_2 = "";		
		
		$search_term = "";
		$search_name = "";
		$search_town = "";
		$search_region = "";
		$search_country = "";
		$search_postcode ="";
		$place = "";
		

		
		
		//if (Input::has('place')) {$search_term = Input::get( 'place' );}
		
		//Get post variables if passed from search
		if (Input::has('vpp')){$selected_venues_per_page = 	Input::get( 'vpp' );}
		if (Input::has('ob1')){$orderby_opt1 = 	Input::get( 'ob1' );}	
		if (Input::has('country')){$search_country = 	Input::get( 'country' );}
		if (Input::has('region')){$search_region= 	Input::get( 'region' );}
		if (Input::has('town')){$search_town = 	Input::get( 'town' );}
		if (Input::has('postcode')){$search_postcode = 	Input::get( 'postcode' );}
		if (Input::has('place')){$place = 	Input::get( 'place' );}
		
		//SETUP SORT ORDER
		if($orderby_opt1=="PLH") 
		{
			$orderby_colname_1 = "COURSES.COURSE_LOW_WEEK";
			$orderby_colsort_1 = "asc";
		}

		else if($orderby_opt1=="VAZ") 
		{
			$orderby_colname_1 = "CLUBS.CLUB_ADD1";
			$orderby_colsort_1 = "asc";	
		
		}
		else if($orderby_opt1=="VZA") 
		{
			$orderby_colname_1 = "CLUBS.CLUB_ADD1";
			$orderby_colsort_1 = "desc";	
		
		}	
		else if($orderby_opt1=="CAZ") 
		{
			$orderby_colname_1 = "CLUBS.CLUB_COUNTY";
			$orderby_colsort_1 = "asc";	
		
		}
		else if($orderby_opt1=="CZA") 
		{
			$orderby_colname_1 = "CLUBS.CLUB_COUNTY";
			$orderby_colsort_1 = "desc";	
		
		}			
		else
		{
			//Default sort order 
			$orderby_colname_1 = "COURSES.COURSE_LOW_WEEK";
			$orderby_colsort_1 = "desc";
		}
		
		
		//postcode used as search so we need to get lon lat to determine 
		//geofence distance for clubs closest to furthest. 
		//STILL NEEDS IMPLEMENTING
		if($search_postcode)
		{
			//Get postcode centre
			$search_centre_lon_lat = Postcodes::where('POSTCODE', 'LIKE',$search_postcode)->firstOrFail();
			
			//build sql for main query
			$search_centresql = '*, 
					( 3959 * acos( cos( radians('.$search_centre_lon_lat->LAT.') ) * cos( radians( CLUBS.CLUB_LAT ) ) * cos( radians( CLUBS.CLUB_LON ) 
					- radians('.$search_centre_lon_lat->LON.') ) + sin( radians('.$search_centre_lon_lat->LAT.') ) * sin( radians( CLUBS.CLUB_LAT ) ) ) ) AS DISTANCE '; 
			$orderby_colname_2 = "DISTANCE";
			$orderby_colsort_2 = "ASC";		
			
		}

		if(!isset($search_centresql)) {$search_centresql="* ";}
							  		
		//		->select(DB::raw($search_centresql))								
		//->whereRaw('\'DISTANCE\' < 10'	, []) 
									
		$courses = DB::table('CLUBS')			
		->leftJoin('SERVICES', 'CLUBS.CLUBS_ID', '=', 'SERVICES.SERV_ID')
		->leftJoin('COURSES', 'CLUBS.CLUBS_ID', '=', 'COURSES.CLUB_ID')
		->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')
		->leftJoin('SPECOFFERS', 'COURSES.CLUB_ID', '=', 'SPECOFFERS.OFFER_ID')
		->leftJoin('FACILITIES', 'CLUBS.CLUBS_ID', '=', 'FACILITIES.FAC_ID')				
		->leftJoin('SYS_CLUBS_USERS', 'CLUBS.CLUBS_ID', '=', 'SYS_CLUBS_USERS.CLUB_ID')
		->leftJoin('ISPYCARD', 'COURSES.CLUB_ID', '=', 'ISPYCARD.CLUB_ID')	
		->where('SYS_CLUBS_USERS.COURSES','1')
		->where('CLUBS.CLUB_ADD1','like','%'.$search_name."%")
		->where('CLUBS.CLUB_COUNTRY','like','%'.$search_country."%")
		->where('CLUBS.CLUB_CITY','like','%'.$search_town."%")
		->where('CLUBS.CLUB_COUNTY','like','%'.$search_region."%")
		->orderBy('SYS_CLUBS_USERS.ONSTOP','ASC')->orderBy($orderby_colname_1,$orderby_colsort_1)
		->paginate($selected_venues_per_page);
	
		//->leftJoin('HOTELS','COURSES.CLUB_ID','=','HOTELS.HOTEL_CLUB_ID')	
		//->leftJoin('PACKAGES','COURSES.CLUB_ID','=','PACKAGES.PACKAGE_HOTEL_ID')
		//->leftJoin('HOTELS_IMAGEREFS','COURSES.CLUB_ID','=','HOTELS_IMAGEREFS.IMG_HOTEL_ID')
		
		/*		->havingRaw("'DISTANCE' < 100"	, []) */
		
		$i=0;
		//SET STANDARD FIELD OPTIONS FOR VIEW
		foreach($courses as $course)
		{
			
			$clubid = $course->CLUBS_ID;
			
			//SET DEFAULT IMAGE
			if($course->IMG_IMAGE1 == "") {$course->IMG_IMAGE1 = "noimage.jpg";}
			
			//CHECK FOR SPECIAL OFFERS 
			$todaysdate = date("Y-m-d");	
	
			if ($course->SPECIAL1_UNTIL > $todaysdate or $course->SPECIAL2_UNTIL > $todaysdate or
				  $course->SPECIAL3_UNTIL > $todaysdate or
				 ($course->SPECIAL1_UNTIL == '0000-00-00' and $course->SPECIAL1_FROM <> '0000-00-00') or
				 ($course->SPECIAL2_UNTIL == '0000-00-00' and $course->SPECIAL2_FROM <> '0000-00-00') or
				 ($course->SPECIAL3_UNTIL == '0000-00-00' and $course->SPECIAL3_FROM <> '0000-00-00'))	
			 {
				  $course->SPECIAL_OFFER = "1";
		
			 }
			 else
			 {
			 	$course->SPECIAL_OFFER = null;
			 }
			 
			 //MEMBERSHIP AVAILABLE
			if($course->CLUB_MEMBER == "0") {$course->CLUB_MEMBER = null;}
			
			 
			 //FORMAT COURSE PRICE IF ZERO
			 if($course->COURSE_LOW_WEEK==0){$course->COURSE_LOW_WEEK="-";}
			 
			//FIND PACKAGES FOR CLUB
			 
			$datenow = date('d-m-Y');		 
		
			$packages = DB::table('HOTELS')			
			->leftJoin('PACKAGES', 'HOTELS.HOTEL_ID', '=', 'PACKAGES.PACKAGE_HOTEL_ID')
			->leftJoin('HOTELS_IMAGEREFS', 'HOTELS.HOTEL_ID', '=', 'HOTELS_IMAGEREFS.IMG_HOTEL_ID')
			->where('HOTELS.HOTEL_CLUB_ID','=',$clubid)
			->get();
			
			
			$course->PACKAGE_IMG = null;
			
			//->whereRaw('DATE(PACKAGES.PACKAGE_VALID_TO) > ?', [$datenow])
									
			foreach($packages as $package)
			{
				
				$course->PACKAGE_IMG =  $package->IMG_IMAGE1_THUMB;
				if($course->PACKAGE_IMG == "") { $course->PACKAGE_IMG = null; }
				
			}
						
		}
		
			
	    //SQL DEBUG OUTPUT
		//$queries = DB::getQueryLog();
		//$last_query = end($queries);
		//dd($last_query);
		//echo $last_query['query'];
		//die;
		//exit;
		
		

		
		
		return View::make('courses.search')->with('courses',$courses)
										   ->with('venues_per_page',$selected_venues_per_page)
										   ->with('obo1',$orderby_opt1)
										   ->with('place',$place)
										   ->with('region',$search_region)
										   ->with('country',$search_country)
										   ->with('postcode',$search_postcode)
										   ->with('town',$search_town);

	}
	
	
	public function course_show($urlid)
	{
		$club = Club::findOrFail($urlid);

		return View::make('courses.profile',compact('club'));
	
	}
	

	

}
