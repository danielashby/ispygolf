<?php


class GolfbreaksProfileController extends \BaseController {

	private function formatDate($indate)
	{
		$split_date=explode("-", $indate);
		$outdate=$split_date[2] . "/" . $split_date[1] . "/" . $split_date[0];	
		return $outdate;
	}

	public function profile($urlid)
	{
	
		//(1) if there are '-' in the actual name in the DB then we dont want to strip so temp convert
	    $urlid = str_replace('---', '~~',$urlid);
	
		//clear all valid '-' generated for url
		$urlid = str_replace('-', ' ',$urlid);
		
		//replace back valid '-' that existed from ADD1 in the DB from point (1)
		 $urlid = str_replace('~~', ' - ',$urlid);
		
		$urlid = str_replace('.html', '',$urlid);
		
		
		//echo $urlid;
		//die;
		//exit;
		
		$todaysdate = date("Y-m-d");
		
		
	    $venuepackages = DB::table('HOTELS')			
			->rightJoin('PACKAGES', function ($join) {
			$todaysdate = date("Y-m-d");
			$join->on('PACKAGES.PACKAGE_HOTEL_ID', '=', 'HOTELS.HOTEL_ID');
		})
		->leftJoin('HOTELS_IMAGEREFS', 'HOTELS.HOTEL_ID', '=', 'HOTELS_IMAGEREFS.IMG_HOTEL_ID')
		->where('HOTELS.HOTEL_ADD1','like','%'.$urlid."%")
		->where('PACKAGES.PACKAGE_VALID_TO','>',$todaysdate)->get();
		
		
		//	->where('PACKAGES.PACKAGE_VALID_TO','>',$todaysdate)
		
		$i=0;
		
		//echo $urlid;
		
		$PROF_PACKAGES_VALID = FALSE;
		
		//START - GET ALL PACKAGES FOR HOTEL 
		foreach($venuepackages as $package)
		{
			
			//dd($package);yy
			
			$hotelid = $package->PACKAGE_HOTEL_ID;
				
	
			//FORMAT RE-USABLE ADDRESS IN ONE LINE
			$PROF_HOTEL_ADDRESS = $package->HOTEL_ADD2;
			if($package->HOTEL_ADD3!="") { $PROF_HOTEL_ADDRESS .= ", ".$package->HOTEL_ADD3; }
			if($package->HOTEL_CITY!="") { $PROF_HOTEL_ADDRESS .= ", ".$package->HOTEL_CITY; }
			if($package->HOTEL_COUNTY!="") { $PROF_HOTEL_ADDRESS .= ", ".$package->HOTEL_COUNTY; }
			if($package->HOTEL_COUNTRY!="") { $PROF_HOTEL_ADDRESS .= ", ".$package->HOTEL_COUNTRY;}
			if($package->HOTEL_POSTCODE!="") { $PROF_HOTEL_ADDRESS.= ", ".$package->HOTEL_POSTCODE; }
			if( substr($PROF_HOTEL_ADDRESS,0,1)==","){ $PROF_HOTEL_ADDRESS = substr($PROF_HOTEL_ADDRESS,1); }
		
			
			if($package->PACKAGE_VALID_TO > $todaysdate)
			{
		    	$PROF_PACKAGES_VALID = TRUE;	
			}
			
			if($package->IMG_IMAGE1 == "") {"/hotelimages/noimage.jpg";}
			
	
			if($package->IMG_DEFAULT==1)
			{
				$profimages = array(
					'PROF_BANNER_IMAGE1'  => "/hotelimages/".$package->IMG_IMAGE1,
					'PROF_BANNER_IMAGE2'  => "/hotelimages/".$package->IMG_IMAGE2,
					'PROF_BANNER_IMAGE3'  => "/hotelimages/".$package->IMG_IMAGE3,
					'PROF_BANNER_IMAGE4'  => "/hotelimages/".$package->IMG_IMAGE4,
					'PROF_BANNER_IMAGE5'  => "/hotelimages/".$package->IMG_IMAGE5,
					'PROF_BANNER_IMAGE6'  => "/hotelimages/".$package->IMG_IMAGE6,
					'PROF_BANNER_IMAGE7'  => "/hotelimages/".$package->IMG_IMAGE7,
					'PROF_BANNER_IMAGE8'  => "/hotelimages/".$package->IMG_IMAGE8,
					'PROF_BANNER_IMAGE9'  => "/hotelimages/".$package->IMG_IMAGE9,
					'PROF_BANNER_IMAGE10'  => "/hotelimages/".$package->IMG_IMAGE10
					
				);
			}
	
		  //FACILITIES
			  
			  $hotel_tennis =$package->HOTEL_TENNIS;
			  $hotel_swim = $package->HOTEL_SWIM;
		      $hotel_spa = $package->HOTEL_SPA;	
		      $hotel_gym = $package->HOTEL_GYM;
		      $hotel_rest = $package->HOTEL_REST;	
			  $hotel_clubid = $package->HOTEL_CLUB_ID;
			  
			  $fac_icons = "";
			
	
			if($hotel_rest)
			{
				$fac_icons = '<img  title="COURSE ON SITE" alt="COURSE ON SITE" src="/images/icon-golfbreask-course.png" width="50" height="50" alt=""/>';
			}
			
			if($hotel_clubid!="0" && $hotel_clubid!="")
			{
				$fac_icons = $fac_icons.'<img  title="RESTAURANT ON SITE" alt="RESTAURANT ON SITE" src="/images/icon-golfbreaks-restaurant.png" width="50" height="50" alt=""/>';
			}
	
			if($hotel_spa)
			{
				$fac_icons = $fac_icons.'<img  title="SPA ON SITE" alt="SPOA ON SITE" src="/images/icon-golfbreaks-spa.png" width="50" height="50" alt=""/>';
			}
			
			if($hotel_swim)
			{
				$fac_icons = $fac_icons.'<img  title="SWIMMING ON SITE" alt="SWIMMING ON SITE" src="/images/icon-golfbreaks-swimming.png" width="50" height="50" alt=""/>';
			}
	
			if($hotel_gym)
			{
				$fac_icons = $fac_icons.'<img title="GYM ON SITE" alt="GYM ON SITE" src="/images/icon-golfbreaks-gym.png" width="50" height="50" alt=""/>';
			}
			
			if($hotel_tennis)
			{
				$fac_icons = $fac_icons.'<img  title="TENNIS ON SITE" alt="TENNIS ON SITE" src="/images/icon-golfbreaks-tennis.png" width="50" height="50" alt=""/>';
			}
	
			  if ($package->PACKAGE_HOTEL_CATER =="A") {$package->PACKAGE_HOTEL_CATER= "Accommodation Only";}
			  if ($package->PACKAGE_HOTEL_CATER=="B") {$package->PACKAGE_HOTEL_CATER= "Bed &amp; Breakfast";}
			  if ($package->PACKAGE_HOTEL_CATER=="D") {$package->PACKAGE_HOTEL_CATER= "Dinner, Bed &amp; Breakfast";}
			  if ($package->PACKAGE_HOTEL_CATER=="F") {$package->PACKAGE_HOTEL_CATER= "Full Board";}
			  if ($package->PACKAGE_HOTEL_CATER=="I") {$package->PACKAGE_HOTEL_CATER= "All Inclusive";}
			  if ($package->PACKAGE_HOTEL_CATER=="S") {$package->PACKAGE_HOTEL_CATER= "Self Catering";}
			  
			  		  
			    if ($package->PACKAGE_APPLIES=="R") { $package->PACKAGE_APPLIES = "Per Room";}
	  			else {$package->PACKAGE_APPLIES = "Per Person";}	
	
	
			$PROF_HASLOGO = false;
			$PROF_DIALCODE= "";
			$PROF_WEBSITE = "";
		
			$profdetail = array(
					'PROF_HOTELID' => $hotelid,
					'PROF_HOTELNAME' => $package->HOTEL_ADD1,
					'PROF_HOTELNAME_UPPER' => strtoupper($package->HOTEL_ADD1),
					'PROF_HOTEL_ADDRESS' => $PROF_HOTEL_ADDRESS,
					'PROF_HOTEL_ADD2' => $package->HOTEL_ADD2,
					'PROF_HOTEL_ADD3' => $package->HOTEL_ADD3,
					'PROF_HOTEL_COUNTY' => $package->HOTEL_COUNTY,
					'PROF_HOTEL_CITY' => $package->HOTEL_CITY,	
					'PROF_HOTEL_POSTCODE' => $package->HOTEL_POSTCODE,		
					'PROF_HOTEL_COUNTRY' => $package->HOTEL_COUNTRY,	
					'PROF_HOTEL_DESC' => nl2br($package->HOTEL_DESC),	
					'PROF_HASLOGO' => $PROF_HASLOGO,
					'PROF_TELNO' => $package->HOTEL_ACCOM_TEL,
					'PROF_EMAIL' => $package->HOTEL_ACCOM_EMAIL,
					'PROF_WEBSITE' => $PROF_WEBSITE,
					'PROF_DIALCODE' => $PROF_DIALCODE,
					'PROF_PACKAGES_VALID' => $PROF_PACKAGES_VALID,
					'PROF_LAT' => $package->HOTEL_LAT,
					'PROF_LON' => $package->HOTEL_LON,
					'PROF_FACILITIES' => $fac_icons,
					
			);
			
			$package->PACKAGE_DESCRIPTION = utf8_decode( nl2br($package->PACKAGE_DESCRIPTION));
			
			//FORMAT DATES//
	
			$package->PACKAGE_VALID_FR = $this->formatDate($package->PACKAGE_VALID_FR);
			$package->PACKAGE_VALID_TO = $this->formatDate($package->PACKAGE_VALID_TO);
				
			$packagecourses = array();
			
			$packagecourses[0]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_1;
			$packagecourses[1]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_2;
			$packagecourses[2]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_3;
			$packagecourses[3]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_4;
			$packagecourses[4]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_5;
			$packagecourses[5]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_6;
			$packagecourses[6]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_7;
			$packagecourses[7]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_8;
			$packagecourses[8]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_9;
			$packagecourses[9]['PACKAGE_COURSE'] = $package->PACKAGE_COURSEID_10;
	

			$package->COURSES = array();
			
			for($i=0;$i<10;$i++)
			{
				
				if($packagecourses[$i]['PACKAGE_COURSE']!=0)
				{
				
					$courses = DB::table('COURSES')	
					->leftJoin('CLUBS','COURSES.CLUB_ID','=','CLUBS.CLUB_ID')
					->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')
					->where('COURSES.COURSE_ID',$packagecourses[$i]['PACKAGE_COURSE'])->first();
					
					if($courses->COURSE_NAME==$courses->CLUB_ADD1)
					{
						$courses->COURSE_NAME = "";
					}
					
					$package->COURSES[$i]['CLUB_NAME'] = $courses->CLUB_ADD1;
					$package->COURSES[$i]['COURSE_NAME'] = $courses->COURSE_NAME;
					$package->COURSES[$i]['COURSE_IMAGE'] = $courses->IMG_IMAGE1;
					$package->COURSES[$i]['CLUB_URL'] = str_replace(" ","-", $courses->CLUB_URLID);
					
	
				
				}
	

				
			}
		
			
			
			//
					
		}
		
		
					
		
		
				return View::make('golfbreaks.profile')->with('venuepackages',$venuepackages)
												      ->with('profdetail',$profdetail)
													  ->with('profimages',$profimages);
		
		
		
		
	}	

}
