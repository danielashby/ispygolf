<?php


class CourseProfileController extends \BaseController {

	private function formatDate($indate)
	{
		$split_date=explode("-", $indate);
		$outdate=$split_date[2] . "/" . $split_date[1] . "/" . $split_date[0];	
		return $outdate;
	}
	
	public function profile($urlid)
	{
		
		//SYS_CLUBS_USERS.SOCIETY = '1' and SYS_CLUBS_USERS.CORPORATE = '1' " 
		
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
		
		//START - GET ALL COURSES FOR CLUB
		foreach($courses as $course)
		{
			
			//GET INDIVIDUAL ITEMS LINKED TO EACH COURSE  (PACKAGES,GOLFDAYS...)
			
			$clubid = $course->CLUB_ID;
			
			//SET DEFAULT IMAGE
			if($course->IMG_IMAGE1 == "") {"/clubimages/".$course->IMG_IMAGE1 = "noimage.jpg";}
			
			if(trim($course->COURSE_NAME)==trim($course->CLUB_ADD1)){$course->COURSE_NAME = null;}
	
			if($course->IMG_DEFAULT==1)
			{
				$profimages = array(
					'PROF_BANNER_IMAGE1'  => "/clubimages/".$course->IMG_IMAGE1,
					'PROF_BANNER_IMAGE2'  => "/clubimages/".$course->IMG_IMAGE2,
					'PROF_BANNER_IMAGE3'  => "/clubimages/".$course->IMG_IMAGE3,
					'PROF_BANNER_IMAGE4'  => "/clubimages/".$course->IMG_IMAGE4,
					'PROF_BANNER_IMAGE5'  => "/clubimages/".$course->IMG_IMAGE5,
					'PROF_BANNER_IMAGE6'  => "/clubimages/".$course->IMG_IMAGE6,
					'PROF_BANNER_IMAGE7'  => "/clubimages/".$course->IMG_IMAGE7,
					'PROF_BANNER_IMAGE8'  => "/clubimages/".$course->IMG_IMAGE8,
					'PROF_BANNER_IMAGE9'  => "/clubimages/".$course->IMG_IMAGE9,
					'PROF_BANNER_IMAGE10'  => "/clubimages/".$course->IMG_IMAGE10
					
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
			$club_has_packages = false;
			
			//SET TO DEFAULT IMAGE SO IF NO HOTEL PACKAGES THEN USE COURSE IMAGE AND DISPLAY 'NOT AVAILABLE'
			$package_image = "/clubimages/".$course->IMG_IMAGE3;
									
			foreach($packages as $package)
			{
				//LIMIT TO THREE PACKAGES FOR PROFILE PAGE
				if($i<3)
				{
					
					if($i==0)
					{
						//GET DEFAULT PACKAGE IMAGE
						$package_image = "/hotelimages/".$package->IMG_IMAGE1;
					}
					
					$profpackages[$i]['PACKAGE_IMG'] =  "/hotelimages/".$package->IMG_SEARCH2;
					$profpackages[$i]['PACKAGE_IMG_LARGE'] = 	"/hotelimages/".$package->IMG_IMAGE1;
					$profpackages[$i]['PACKAGE_DESCRIPTION'] = 	str_limit($package->PACKAGE_DESCRIPTION, $limit = 100, $end = '...');
					$profpackages[$i]['PACKAGE_NAME'] = 	$package->PACKAGE_NAME;
					
					$club_has_packages = true;
	
				}
				
				$i++;
				
			}
			
			
						
		}
		
		//END - GET ALL COURSES FOR CLUB
	
		
		///// ---- THINGS THAT NEED ADDING TO DATABASE ----- //////
		
		$PROF_HASLOGO = false;
		$PROF_LOGO_IMG = "";
		
		
		///////////////////////////////////////////////////////////
		
		
		// START - FORMATING OF STANDARD DATA ITEMS -------------------------------
		
			//FORMAT RE-USABLE ADDRESS IN ONE LINE
			$PROF_CLUB_ADDRESS = $course->CLUB_ADD2;
			if($course->CLUB_ADD3!="") { $PROF_CLUB_ADDRESS .= ", ".$course->CLUB_ADD3; }
			if($course->CLUB_CITY!="") { $PROF_CLUB_ADDRESS .= ", ".$course->CLUB_CITY; }
			if($course->CLUB_COUNTY!="") { $PROF_CLUB_ADDRESS .= ", ".$course->CLUB_COUNTY; }
			if($course->CLUB_COUNTRY!="") { $PROF_CLUB_ADDRESS .= ", ".$course->CLUB_COUNTRY;}
			if($course->CLUB_POSTCODE!="") { $PROF_CLUB_ADDRESS.= ", ".$course->CLUB_POSTCODE; }
			if( substr($PROF_CLUB_ADDRESS,0,1)==","){ $PROF_CLUB_ADDRESS = substr($PROF_CLUB_ADDRESS,1); }
			
			//FORMAT DIAL CODE
			
			
			if ($course->INT_DIAL_CODE=="")
			{
				$course->INT_DIAL_CODE=="+44";
			}
			
			//FORMAT COURSE DESCRIPTION
			
			if(trim($course->COURSE_DESC)=="")
			{
				//COURSE NAME IS BLANK SO USE CLUB DESC
				$course->COURSE_DESC = $course->CLUB_DESC;
			}
			
			//TEST FOR REVIEW
			$course->COURSE_HASCOURSEREVIEW = false;
			if(trim($course->COURSE_REVIEW)!="")
			{
				$course->COURSE_HASCOURSEREVIEW = true;
			}
			else
			{
				$course->COURSE_REVIEW = "This course currently has no review...";
			}
			
			
			//START CURRENCY SYMBOL
				
			$PROF_MONEY_SYMBOL = $course -> MONETARY_SYMBOL;	
				
			if ($PROF_MONEY_SYMBOL=="")
			{       	
			  $PROF_MONEY_SYMBOL="&pound;";
			}
			else if ($PROF_MONEY_SYMBOL=="P")
			{
			  $PROF_MONEY_SYMBOL="&pound;";
			}
			else if ($PROF_MONEY_SYMBOL=="E")
			{
			  $PROF_MONEY_SYMBOL="&euro;";
			}	
			else if ($PROF_MONEY_SYMBOL=="D")
			{
			  $PROF_MONEY_SYMBOL="US$";
			}	
			else if ($PROF_MONEY_SYMBOL=="U")
			{
			  //This will need changing to AED once new layout is done for profile
			  $PROF_MONEY_SYMBOL="AED";
			}
			else if ($PROF_MONEY_SYMBOL=="R")
			{
			  //This will need changing to AED once new layout is done for profile
			  $PROF_MONEY_SYMBOL="R";
			}
			
			//END CURRENCY SYMBOL
			
			//START COURSE T PRICE
			
			if($course->COURSE_HIGH_WEEK=="") { $course_high_week = "-"; } else {$course_high_week = $PROF_MONEY_SYMBOL.$course->COURSE_HIGH_WEEK;}
			if($course->COURSE_LOW_WEEK=="") { $course_low_week = "-"; } else {$course_low_week = $PROF_MONEY_SYMBOL.$course->COURSE_LOW_WEEK;}
			
			//END T PRICE
			
			if($course->MEMBERSHIP==true)
			{
				$PROF_MEMBERSHIP_AVAILABLE = "AVAILABLE";
			}
			else
			{
				$PROF_MEMBERSHIP_AVAILABLE = "NOT AVAILABLE";
			}
			
			
		// START - FORMATING OF STANDARD DATA ITEMS -------------------------------
				
		//START GOLF DAYS 
		
		$PROF_HASGOLFDAYS = false;
		$PROF_GOLFDAY_IMAGE = "";
		$PROF_GOLFDAY_PRICE_FROM = "";
		
		if($course->SOCIETY==true && $course->CORPORATE==true )
		{
			$PROF_HASGOLFDAYS = true;
			$PROF_GOLFDAY_IMAGE = "/clubimages/".$course->IMG_IMAGE1;
			$PROF_GOLFDAY_PRICE_FROM = $PROF_MONEY_SYMBOL."TBC";
		}
		
		
		
	

		
		//END GOLF DAYS				
						
		// START COURSE VIDEO
		
		$club_has_video = false;

		if($course->CLUB_VIDEO_YOUTUBE!="" || $course->CLUB_VIDEO_VZAAR!="") {$club_has_video = true;}

		// END COURSE VIDEO


		// START OPENS FORMAT

		$PROF_OPEN_MEN = $course->CLUB_OPEN_MEN;
		$PROF_OPEN_LADIES = $course->CLUB_OPEN_LADIES;
		$PROF_OPEN_SENIOR = $course->CLUB_OPEN_SENIOR;
		$PROF_OPEN_JUNIOR = $course->CLUB_OPEN_JUNIOR;
		$PROF_OPEN_MIXED = $course->CLUB_OPEN_MIXED;
		$PROF_OPEN_PAIR = $course->CLUB_OPEN_PAIR;
		$PROF_OPEN_TEAM = $course->CLUB_OPEN_TEAM;
		$PROF_OPEN_SCRATCH = $course->CLUB_OPEN_SCRATCH;
		$PROF_OPEN_PROAM = $course->CLUB_OPEN_PROAM;
		
		$todaysOpens = date("Y-m-d");	
		$PROF_OPENS_HTML = "";	
		
		$PROF_OPEN_MEN_DATE = $this->formatDate($course->CLUB_OPEN_MEN_DATE);
		if ($course->CLUB_OPEN_MEN_DATE < $todaysOpens) { $PROF_OPEN_MEN= 0;}
		else {$PROF_OPENS_HTML = "<h3><strong>MENS OPEN</strong> - $PROF_OPEN_MEN_DATE</h3>";}
		
		$PROF_OPEN_LADIES_DATE = $this->formatDate($course->CLUB_OPEN_LADIES_DATE);
		if ($course->CLUB_OPEN_LADIES_DATE < $todaysOpens) { $PROF_OPEN_LADIES= 0;}
		else {$PROF_OPENS_HTML = $PROF_OPENS_HTML."<h3><strong>LADIES OPEN</strong> - $PROF_OPEN_LADIES_DATE</h3>";}
		
		$PROF_OPEN_SENIOR_DATE = $this->formatDate($course->CLUB_OPEN_SENIOR_DATE);
		if ($course->CLUB_OPEN_SENIOR_DATE < $todaysOpens) { $PROF_OPEN_SENIOR= 0;}
		else {$PROF_OPENS_HTML = $PROF_OPENS_HTML."<h3><strong>SENIOR OPEN</strong> - $PROF_OPEN_SENIOR_DATE</h3>";}
						
		$PROF_OPEN_JUNIOR_DATE = $this->formatDate($course->CLUB_OPEN_JUNIOR_DATE);
		if ($course->CLUB_OPEN_JUNIOR_DATE < $todaysOpens) { $PROF_OPEN_JUNIOR= 0;}
		else {$PROF_OPENS_HTML = $PROF_OPENS_HTML."<h3><strong>JUNIOR OPEN</strong> - $PROF_OPEN_JUNIOR_DATE</h3>";}
						
		$PROF_OPEN_MIXED_DATE = $this->formatDate($course->CLUB_OPEN_MIXED_DATE);
		if ($course->CLUB_OPEN_MIXED_DATE < $todaysOpens) { $PROF_OPEN_MIXED= 0;}
		else {$PROF_OPENS_HTML = $PROF_OPENS_HTML."<h3><strong>MIXED OPEN</strong> - $PROF_OPEN_MIXED_DATE</h3>";}
		
		$PROF_OPEN_PAIR_DATE = $this->formatDate($course->CLUB_OPEN_PAIR_DATE);
		if ($course->CLUB_OPEN_PAIR_DATE < $todaysOpens) { $PROF_PAIR_SENIOR= 0;}
		else {$PROF_OPENS_HTML = $PROF_OPENS_HTML."<h3><strong>PAIR OPEN</strong> - $PROF_OPEN_PAIR_DATE</h3>";}
	
		$PROF_OPEN_TEAM_DATE = $this->formatDate($course->CLUB_OPEN_TEAM_DATE);
		if ($course->CLUB_OPEN_TEAM_DATE < $todaysOpens) { $PROF_TEAM_TEAM= 0;}
		else {$PROF_OPENS_HTML = $PROF_OPENS_HTML."<h3><strong>TEAM OPEN</strong> - $PROF_OPEN_TEAM_DATE</h3>";}
		
		$PROF_OPEN_SCRATCH_DATE = $this->formatDate($course->CLUB_OPEN_SCRATCH_DATE);
		if ($course->CLUB_OPEN_SCRATCH_DATE < $todaysOpens) { $PROF_OPEN_SCRATCH= 0;}
		else {$PROF_OPENS_HTML = $PROF_OPENS_HTML."<h3><strong>SCRATCH OPEN</strong> - $PROF_OPEN_SCRATCH_DATE</h3>";}
	
		$PROF_OPEN_PROAM_DATE = $this->formatDate($course->CLUB_OPEN_PROAM_DATE);
		if ($course->CLUB_OPEN_PROAM_DATE < $todaysOpens) { $PROF_OPEN_PROAM= 0;}
		else {$PROF_OPENS_HTML = $PROF_OPENS_HTML."<h3><strong>PROAM OPEN</strong> - $PROF_OPEN_PROAM_DATE</h3>";}	
		
		//END OPENS FORMAT
		
		
		//START FACILITIES FORMAT //
		
		$PROF_SERVICES_HTML = "";
		
		$fac_practice=$course->FAC_PRACTICE;
		$fac_driving_range=$course->FAC_DRIVING_RANGE;
		$fac_driving_public=$course->FAC_DRIVING_PUBLIC;
		$fac_driving_floodlit=$course->FAC_DRIVING_FLOODLIT;
		$fac_pro_shop=$course->FAC_PRO_SHOP;
		$serv_clubs_hire=$course->SERV_CLUBS_HIRE;
		$serv_cart_hire=$course->SERV_CART_HIRE;
		$serv_motor_hire=$course->SERV_MOTOR_HIRE;
		$serv_pull_hire=$course->SERV_PULL_HIRE;
		$serv_caddy_hire=$course->SERV_CADDY_HIRE;
		$fac_changing=$course->FAC_CHANGING;
		$fac_bar_spike=$course->FAC_BAR_SPIKE;
		$fac_club_bar=$course->FAC_CLUB_BAR;
		$fac_rest=$course->FAC_REST;
		$fac_breakfast=$course->FAC_BREAKFAST;
		$fac_lunch=$course->FAC_LUNCH;
		$fac_dinner=$course->FAC_DINNER;
	
					
		if ($fac_practice==1) { $PROF_SERVICES_HTML = $PROF_SERVICES_HTML . "<li>Practice Facilities</li>"; }
		if ($fac_driving_range==1) {  $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Driving Range</li>"; } 
		if ($fac_driving_public==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Public Driving Range</li>"; } 
		if ($fac_driving_floodlit==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Floodlit Driving Range</li>"; }
		if ($fac_pro_shop==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .   "<li>Pro Shop</li>"; }
		if ($serv_clubs_hire==1)	{ $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Club Hire</li>"; } 
		if ($serv_cart_hire==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Buggy Hire</li>"; } 
		if ($serv_motor_hire==1)	{ $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Motorized Trolley Hire</li>"; } 
		if ($serv_pull_hire==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Trolley Hire</li>"; }
		if ($serv_caddy_hire==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Caddy Service</li>"; }
		if ($fac_changing==1) {  $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .   "<li>Changing Facilities</li>"; }
		if ($fac_bar_spike==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .   "<li>Spike Bar</li>"; } 
		if ($fac_club_bar==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .   "<li>Bar</li>"; } 
		if ($fac_rest==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Restaurant</li>"; } 
		if ($fac_breakfast==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .   "<li>Breakfast Service</li>"; } 
		if ($fac_lunch==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .   "<li>Lunch Service</li>"; } 
		if ($fac_dinner==1) { $PROF_SERVICES_HTML  = $PROF_SERVICES_HTML .  "<li>Dinner Service</li>"; } 
			
		//END FACILITIES FORMAT
		
		
		//POPULATE PROFILE ARRAY TO PASS TO COURSE PROFILE VIEW 
		
		if($course->CLUB_ADD1==""){$course->CLUB_ADD1 = $course->CLUB_NAME; }

		$profdetail = array(
					'PROF_DIAL_CODE' => $course->INT_DIAL_CODE,
					'PROF_TELNO'  => $course->CLUB_TELEPHONE,
					'PROF_EMAIL' => $course->CLUB_EMAIL,
					'PROF_WEBSITE' => $course->CLUB_WEBSITE,
					'PROF_CLUBNAME' => $course->CLUB_ADD1,
					'PROF_CLUBNAME_UPPER' => strtoupper($course->CLUB_ADD1),
					'PROF_CLUB_ADDRESS' => $PROF_CLUB_ADDRESS,
					'PROF_CLUB_ADD2' => $course->CLUB_ADD2,
					'PROF_CLUB_ADD3' => $course->CLUB_ADD3,
					'PROF_CLUB_COUNTY' => $course->CLUB_COUNTY,
					'PROF_CLUB_CITY' => $course->CLUB_CITY,	
					'PROF_CLUB_POSTCODE' => $course->CLUB_POSTCODE,		
					'PROF_CLUB_COUNTRY' => $course->CLUB_COUNTRY,	
				    'PROF_HASLOGO' => $PROF_HASLOGO,
					'PROF_LOGO_IMG' => $PROF_LOGO_IMG,
					'PROF_COURSENAME' => $course->COURSE_NAME,
					'PROF_COURSEDESC' => $course->COURSE_DESC,
					'PROF_HASCOURSEREVIEW' => $course->COURSE_HASCOURSEREVIEW,
					'PROF_COURSEREVIEW' => $course->COURSE_REVIEW,
					'PROF_CLUBDESC' => $course->CLUB_DESC,
					'PROF_LON' => $course->CLUB_LAT,
					'PROF_LAT' => $course->CLUB_LON,
					'PROF_COURSE_GF_HIGH_WEEK' => $course_high_week,
					'PROF_COURSE_GF_LOW_WEEK' => $course_low_week,
					'PROF_CARD_DESC' => $course->CARD_DESC,
					'PROF_HASVIDEO' => $club_has_video,
					'PROF_VIDEO_YOUTUBE' => $course->CLUB_VIDEO_YOUTUBE,
					'PROF_VIDEO_VZAAR' => $course->CLUB_VIDEO_VZAAR,
					'PROF_OPEN_NAME' => $course->CLUB_OPEN_NAME,
					'PROF_OPEN_TEL' => $course->CLUB_OPEN_TEL,
					'PROF_OPEN_EMAIL' => $course->CLUB_OPEN_EMAIL,
					'PROF_OPENS_HTML' => $PROF_OPENS_HTML,
					'PROF_HASPACKAGES' => $club_has_packages,
					'PROF_PACKAGE_IMAGE' => $package_image,
					'PROF_SERVICES_HTML' => $PROF_SERVICES_HTML,
					'PROF_MONEY_SYMBOL' => $PROF_MONEY_SYMBOL,
					'PROF_HASGOLFDAYS' => $PROF_HASGOLFDAYS,
					'PROF_GOLFDAY_IMAGE' => $PROF_GOLFDAY_IMAGE,
					'PROF_GOLFDAY_PRICE_FROM' => $PROF_GOLFDAY_PRICE_FROM,
					'PROF_HASMEMBERS' => $course->MEMBERSHIP,
					'PROF_MEMBERSHIP_AVAILABLE' => $PROF_MEMBERSHIP_AVAILABLE
					
					
		);
			
	    //SQL DEBUG OUTPUT
		//$queries = DB::getQueryLog();
		//$last_query = end($queries);
		//dd($last_query);
		//echo $last_query['query'];
		//die;
		//exit;
		
		//dd($profpackages);
	
		return View::make('courses.profile')->with('courses',$courses)
									 		->with('profimages',$profimages)
											->with('profdetail',$profdetail)
											->with('profpackages',$profpackages);
											
											
		
	
	}
	

	

}
