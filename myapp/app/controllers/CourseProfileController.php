<?php


class CourseProfileController extends \BaseController {

	
	public function profile($urlid)
	{
		
	    $courses = DB::table('CLUBS')			
		->leftJoin('SERVICES', 'CLUBS.CLUB_ID', '=', 'SERVICES.SERV_ID')
		->leftJoin('COURSES', 'CLUBS.CLUB_ID', '=', 'COURSES.CLUB_ID')
		->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')
		->leftJoin('SPECOFFERS', 'COURSES.CLUB_ID', '=', 'SPECOFFERS.OFFER_ID')
		->leftJoin('FACILITIES', 'CLUBS.CLUB_ID', '=', 'FACILITIES.FAC_ID')				
		->leftJoin('SYS_CLUBS_USERS', 'CLUBS.CLUB_ID', '=', 'SYS_CLUBS_USERS.CLUB_ID')
		->leftJoin('ISPYCARD', 'COURSES.CLUB_ID', '=', 'ISPYCARD.CLUB_ID')	
		->where('CLUBS.CLUB_URLID',$urlid)->get();
	
		
		$i=0;
		
		
		
		//SET STANDARD FIELD OPTIONS FOR PROFILE 
		foreach($courses as $course)
		{
			
			$clubid = $course->CLUB_ID;
			
			//SET DEFAULT IMAGE
			if($course->IMG_IMAGE1 == "") {$course->IMG_IMAGE1 = "noimage.jpg";}
			
			if(trim($course->COURSE_NAME)==trim($course->CLUB_ADD1)){$course->COURSE_NAME = null;}
	
			if($course->IMG_DEFAULT==1)
			{
				$profimages = array(
					'PROF_BANNER_IMAGE1'  => $course->IMG_IMAGE1,
					'PROF_BANNER_IMAGE2'  => $course->IMG_IMAGE2,
					'PROF_BANNER_IMAGE3'  => $course->IMG_IMAGE3,
					'PROF_BANNER_IMAGE4'  => $course->IMG_IMAGE4,
					'PROF_BANNER_IMAGE5'  => $course->IMG_IMAGE5,
					'PROF_BANNER_IMAGE6'  => $course->IMG_IMAGE6,
					'PROF_BANNER_IMAGE7'  => $course->IMG_IMAGE7,
					'PROF_BANNER_IMAGE8'  => $course->IMG_IMAGE8,
					'PROF_BANNER_IMAGE9'  => $course->IMG_IMAGE9,
					'PROF_BANNER_IMAGE10'  => $course->IMG_IMAGE10
					
				);
			}
				
			
			
			
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
			
			
			$i = 0;
			$profpackages = array();
									
			foreach($packages as $package)
			{
				
				if($i<3)
				{
				
				
				$package_image = $package->IMG_SEARCH2;
				//if($package_image  == "") { $package_image = null; } 
				
				$profpackages[$i]['PACKAGE_IMG'] = 	$package_image;
				$profpackages[$i]['PACKAGE_DESCRIPTION'] = 	str_limit($package->PACKAGE_DESCRIPTION, $limit = 100, $end = '...');
				$profpackages[$i]['PACKAGE_NAME'] = 	$package->PACKAGE_NAME;
				
				
				}
				
				$i++;
				
			}
			
			
						
		}
		
		
		
		
		
		if($course->COURSE_HIGH_WEEK=="") { $course_high_week = "-"; } else {$course_high_week ="£".$course->COURSE_HIGH_WEEK;}
		if($course->COURSE_LOW_WEEK=="") { $course_low_week = "-"; } else {$course_low_week = "£".$course->COURSE_LOW_WEEK;}
		
		
		$profdetail = array(
					'PROF_TELNO'  => $course->CLUB_TELEPHONE,
					'PROF_EMAIL' => $course->CLUB_EMAIL,
					'PROF_WEBSITE' => $course->CLUB_WEBSITE,
					'PROF_CLUBNAME' => $course->CLUB_ADD1,
					'PROF_CLUBDESC' => $course->CLUB_DESC,
					'PROF_LON' => $course->CLUB_LAT,
					'PROF_LAT' => $course->CLUB_LON,
					'PROF_COURSE_GF_HIGH_WEEK' => $course_high_week,
					'PROF_COURSE_GF_LOW_WEEK' => $course_low_week,
					'CARD_DESC' => $course->CARD_DESC
					
					
		);
			
	    //SQL DEBUG OUTPUT
		//$queries = DB::getQueryLog();
		//$last_query = end($queries);
		//dd($last_query);
		//echo $last_query['query'];
		//die;
		//exit;
		
		//dd($profpackages);
		
		//prof_packages = ($prof_packages;
	
		return View::make('courses.profile')->with('courses',$courses)
									 		->with('profimages',$profimages)
											->with('profdetail',$profdetail)
											->with('profpackages',$profpackages);
											
											
		
	
	}
	

	

}
