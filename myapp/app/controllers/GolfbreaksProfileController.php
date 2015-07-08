<?php


class GolfbreaksProfileController extends \BaseController {



	public function profile($urlid)
	{
	
		$urlid = str_replace('-', ' ',$urlid);
		$urlid = str_replace('.html', '',$urlid);
		
		$todaysdate = date("Y-m-d");
		
		
		$venuepackages = DB::table('PACKAGES')			
		->leftJoin('HOTELS', 'PACKAGES.PACKAGE_HOTEL_ID', '=', 'HOTELS.HOTEL_ID')
		->leftJoin('HOTELS_IMAGEREFS', 'HOTELS.HOTEL_ID', '=', 'HOTELS_IMAGEREFS.IMG_HOTEL_ID')
		->where('PACKAGES.PACKAGE_VALID_TO','>',$todaysdate)
		->where('HOTELS.HOTEL_ADD1','like','%'.$urlid."%")->get();
		
			$i=0;
		
		//echo $urlid;
		
		//START - GET ALL PACKAGES FOR HOTEL 
		foreach($venuepackages as $package)
		{
			
			//dd($package);
			
			$hotelid = $package->PACKAGE_HOTEL_ID;
				
	
			//FORMAT RE-USABLE ADDRESS IN ONE LINE
			$PROF_HOTEL_ADDRESS = $package->HOTEL_ADD2;
			if($package->HOTEL_ADD3!="") { $PROF_HOTEL_ADDRESS .= ", ".$package->HOTEL_ADD3; }
			if($package->HOTEL_CITY!="") { $PROF_HOTEL_ADDRESS .= ", ".$package->HOTEL_CITY; }
			if($package->HOTEL_COUNTY!="") { $PROF_HOTEL_ADDRESS .= ", ".$package->HOTEL_COUNTY; }
			if($package->HOTEL_COUNTRY!="") { $PROF_HOTEL_ADDRESS .= ", ".$package->HOTEL_COUNTRY;}
			if($package->HOTEL_POSTCODE!="") { $PROF_HOTEL_ADDRESS.= ", ".$package->HOTEL_POSTCODE; }
			if( substr($PROF_HOTEL_ADDRESS,0,1)==","){ $PROF_HOTEL_ADDRESS = substr($PROF_HOTEL_ADDRESS,1); }
		
		    $PROF_HASPACKAGES = TRUE;	
		
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
					$fac_icons = "<li>Golf Course</li>";
				}
				
				if($hotel_clubid!="0" && $hotel_clubid!="")
				{
					$fac_icons = $fac_icons."<li>Restaurant</li>";
				}
		
				if($hotel_spa)
				{
					$fac_icons = $fac_icons."<li>Spa</li>";
				}
				
				if($hotel_swim)
				{
					$fac_icons = $fac_icons."<li>Swimming Pool</li>";
				}
		
				if($hotel_gym)
				{
					$fac_icons = $fac_icons."<li>Gym</li>";
				}
				
				if($hotel_tennis)
				{
					$fac_icons = $fac_icons."<li>Tennis</li>";
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
					'PROF_HOTEL_DESC' => utf8_encode($package->HOTEL_DESC),	
					'PROF_HASLOGO' => $PROF_HASLOGO,
					'PROF_TELNO' => $package->HOTEL_ACCOM_TEL,
					'PROF_EMAIL' => $package->HOTEL_ACCOM_EMAIL,
					'PROF_WEBSITE' => $PROF_WEBSITE,
					'PROF_DIALCODE' => $PROF_DIALCODE,
					'PROF_HASPACKAGES' => $PROF_HASPACKAGES,
					'PROF_LAT' => $package->HOTEL_LAT,
					'PROF_LON' => $package->HOTEL_LON,
					'PROF_FACILITIES' => $fac_icons,
					
			);
			
			$package->PACKAGE_DESCRIPTION = utf8_decode($package->PACKAGE_DESCRIPTION);
					
		}
		
		
					
		
		
				return View::make('golfbreaks.profile')->with('venuepackages',$venuepackages)
												      ->with('profdetail',$profdetail)
													  ->with('profimages',$profimages);
		
		
		
		
	}	

}
