<?php


class OffersController extends \BaseController {


		public function offers()
	{
		
		$selected_venues_per_page = 11;
		$search_distance = "10";
		
		$orderby_opt1 = "PHL";
		$orderby_opt2 = "";
		
		$orderby_colname_1 = "";
		$orderby_colsort_1 = "";
		$orderby_colname_2 = "";
		$orderby_colsort_2 = "";		
		
		
		$search_name = "";
		$search_town = "";
		$search_region = "";
		$search_country = "";
		$search_postcode ="";
		
		$search_val = "";
		
		$adv_filter_coursetype = "";
		$adv_filter_coursedesigner = "";
		$adv_filter_coursedif = ""; 
		$adv_filter_courseaccom = "";
		$adv_filter_coursechamp = "";
		$adv_filter_coursemulti = "";
		$adv_filter_coursebuggy = "";
		$adv_filter_coursedriving = "";


		if (Input::has('ob1')){$orderby_opt1 = 	Input::get( 'ob1' );}	
		if (Input::has('country')){$search_country = 	Input::get( 'country' );}
		if (Input::has('region')){$search_region= 	Input::get( 'region' );}
		if (Input::has('town')){$search_town = 	Input::get( 'town' );}
		if (Input::has('postcode')){$search_postcode = 	Input::get( 'postcode' );}
		if (Input::has('name')){$search_name = 	Input::get( 'name' );}
		if (Input::has('adv_filter_coursetype')){$adv_filter_coursetype = 	Input::get( 'adv_filter_coursetype' );}
		if (Input::has('adv_filter_coursedesigner')){$adv_filter_coursedesigner = 	Input::get( 'adv_filter_coursedesigner' );}
		if (Input::has('adv_filter_coursedif')){$adv_filter_coursedif = 	Input::get( 'adv_filter_coursedif' );}
		
		if (Input::has('adv_filter_courseaccom')){$adv_filter_courseaccom = 	Input::get( 'adv_filter_courseaccom' );}
		if (Input::has('adv_filter_coursechamp')){$adv_filter_coursechamp = 	Input::get( 'adv_filter_coursechamp' );}
		if (Input::has('adv_filter_coursemulti')){$adv_filter_coursemulti = 	Input::get( 'adv_filter_coursemulti' );}
		if (Input::has('adv_filter_coursebuggy')){$adv_filter_coursebuggy = 	Input::get( 'adv_filter_coursebuggy' );}
		if (Input::has('adv_filter_coursedriving')){$adv_filter_coursedriving = 	Input::get( 'adv_filter_coursedriving' );}
		
		
		$search_val = $search_country.$search_region.$search_town.$search_postcode.$search_name;
			
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
			$orderby_colname_1 = "COURSES.COURSE_HIGH_WEEK";
			$orderby_colsort_1 = "desc";
		}
		
	
		if(!isset($search_centresql)) {$search_centresql="* ";}
	
		$courses = DB::table('CLUBS')		
			
		->leftJoin('SERVICES', 'CLUBS.CLUB_ID', '=', 'SERVICES.SERV_ID')
		->leftJoin('COURSES', 'CLUBS.CLUB_ID', '=', 'COURSES.CLUB_ID')
		->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')
		->leftJoin('SPECOFFERS', 'COURSES.CLUB_ID', '=', 'SPECOFFERS.OFFER_ID')
		->leftJoin('FACILITIES', 'CLUBS.CLUB_ID', '=', 'FACILITIES.FAC_ID')				
		->leftJoin('SYS_CLUBS_USERS', 'CLUBS.CLUB_ID', '=', 'SYS_CLUBS_USERS.CLUB_ID')
		->leftJoin('ISPYCARD', 'COURSES.CLUB_ID', '=', 'ISPYCARD.CLUB_ID')	
		
		->where('SYS_CLUBS_USERS.COURSES','1')
		->where('SYS_CLUBS_USERS.SOCIETY','1')
		->where('SYS_CLUBS_USERS.CORPORATE','1')
		->where('CLUBS.CLUB_ADD1','like','%'.$search_name."%")
		->where('CLUBS.CLUB_COUNTRY','like','%'.$search_country."%")
		->where('CLUBS.CLUB_CITY','like','%'.$search_town."%")
		->where('CLUBS.CLUB_COUNTY','like','%'.$search_region."%")
		->where('SYS_CLUBS_USERS.CHAMPIONSHIP','like', '%'.$adv_filter_coursechamp."%")
		->where('SERVICES.SERV_CART_HIRE','like', '%'.$adv_filter_coursebuggy."%")
		->where('FACILITIES.FAC_DRIVING_PUBLIC','like', '%'.$adv_filter_coursedriving."%")
		->where('COURSES.COURSE_STYLE','like', '%'.$adv_filter_coursetype."%")
		->where('COURSES.COURSE_DESIGNER','like', '%'.$adv_filter_coursedesigner."%")
		->where('COURSES.COURSE_IDR_CHAMP','like', '%'.$adv_filter_coursedif."%")
		->where('SPECOFFERS.SPECIAL_OFFER','=','1')
		->Where(function($query)
		{
			$todaysdate = date("Y-m-d");
			
			$query->orWhere('SPECOFFERS.SPECIAL1_UNTIL','>',$todaysdate)
			->orWhere('SPECOFFERS.SPECIAL2_UNTIL','>',$todaysdate)
			->orWhere('SPECOFFERS.SPECIAL3_UNTIL','>',$todaysdate)
			->orWhere('SPECOFFERS.SPECIAL4_UNTIL','>',$todaysdate)
			->orWhere('SPECOFFERS.SPECIAL5_UNTIL','>',$todaysdate)
			->orWhere(function($query)
			{
				
				$query->orWhere(function($query)
						{
						$query->where('SPECOFFERS.SPECIAL1_UNTIL','like','%0000-00-00%')
							  ->Where('SPECOFFERS.SPECIAL1_FROM','<>', '0000-00-00');
					    });
				$query->orWhere(function($query)
						{
						$query->where('SPECOFFERS.SPECIAL2_UNTIL','like','%0000-00-00%')
							  ->Where('SPECOFFERS.SPECIAL2_FROM','<>', '0000-00-00');
					    });
				$query->orWhere(function($query)
						{
						$query->where('SPECOFFERS.SPECIAL3_UNTIL','like','%0000-00-00%')
							  ->Where('SPECOFFERS.SPECIAL3_FROM','<>', '0000-00-00');
					    });
				$query->orWhere(function($query)
						{
						$query->where('SPECOFFERS.SPECIAL4_UNTIL','like','%0000-00-00%')
							  ->Where('SPECOFFERS.SPECIAL4_FROM','<>', '0000-00-00');
					    });
				$query->orWhere(function($query)
						{
						$query->where('SPECOFFERS.SPECIAL5_UNTIL','like','%0000-00-00%')
							  ->Where('SPECOFFERS.SPECIAL5_FROM','<>', '0000-00-00');
					    });		
			});
		})
		->groupBy('CLUBS.CLUB_ID')
		->orderBy('SYS_CLUBS_USERS.ONSTOP','ASC')->orderBy($orderby_colname_1,$orderby_colsort_1)
		->paginate($selected_venues_per_page);
		
		//dd(DB::getQueryLog());
		

		$i=0;
		//SET STANDARD VALUES FOR EACH LISTING
		
		
		foreach($courses as $course)
		{
			$course->THEOFFERS = array(); 
		
			$courseid = $course->CLUB_ID;
			
			//SET DEFAULT IMAGE
			if($course->IMG_IMAGE1 == "") {$course->IMG_IMAGE1 = "search_noimg_lrg.jpg";}
			
			if(trim($course->COURSE_NAME)==trim($course->CLUB_ADD1)){$course->COURSE_NAME = null;}
			
	
			 
			 //FORMAT URLID
			 $course->CLUB_URLID = str_replace(' ', '-', $course->CLUB_URLID);
			 
			 
			 //FORMAT COURSE PRICE IF ZERO
			 if($course->COURSE_LOW_WEEK==0){$course->COURSE_LOW_WEEK="-";}
	
					
		     //CHECK FOR SPECIAL OFFERS 
			 $todaysdate = date("Y-m-d");	
			 
		
			 $offer_arraycount = 0;
	
		   		//LOOP THROUGH THE FIVE OFFERS ON COURSE RECORD
		   		for ($offercount=1; $offercount <= 5; $offercount++) // loop through each page and give link to it.
				{
					
					$offervalid = FALSE;
		   
					if($offercount==1 && ($course->SPECIAL1_UNTIL > $todaysdate  || ($course->SPECIAL1_UNTIL == '0000-00-00' and $course->SPECIAL1_FROM <> '0000-00-00')) && trim($course->SPECIAL1_NAME)!="")	
					{
						$offername = $course->SPECIAL1_NAME;
						$offertext = $course->SPECIAL1_TEXT;
						$offertype = $course->SPECIAL1_TYPE;
						$offerprice = $course->SPECIAL1_PRICE; 
						$offerapplies = $course->SPECIAL1_APPLIES;
						$validto = $course->SPECIAL1_UNTIL;
						$offervalid = TRUE;
					}
					
					if($offercount==2 && ($course->SPECIAL2_UNTIL > $todaysdate  || ($course->SPECIAL2_UNTIL == '0000-00-00' and $course->SPECIAL2_FROM <> '0000-00-00')) && trim($course->SPECIAL2_NAME)!="")	
					{
						$offername = $course->SPECIAL2_NAME;
						$offertext = $course->SPECIAL2_TEXT;
						$offertype = $course->SPECIAL2_TYPE;
						$offerprice = $course->SPECIAL2_PRICE; 
						$offerapplies = $course->SPECIAL2_APPLIES;
						$validto = $course->SPECIAL2_UNTIL;
						$offervalid = TRUE;					
					}
					
					if($offercount==3 && ($course->SPECIAL3_UNTIL > $todaysdate  || ($course->SPECIAL3_UNTIL == '0000-00-00' and $course->SPECIAL3_FROM <> '0000-00-00')) && trim($course->SPECIAL3_NAME)!="")	
					{
						$offername = $course->SPECIAL3_NAME;
						$offertext = $course->SPECIAL3_TEXT;
						$offertype = $course->SPECIAL3_TYPE;
						$offerprice = $course->SPECIAL3_PRICE; 
						$offerapplies = $course->SPECIAL3_APPLIES;
						$validto = $course->SPECIAL3_UNTIL;
						$offervalid = TRUE;					
					}	
					
					
					if($offercount==4 && ($course->SPECIAL4_UNTIL > $todaysdate  || ($course->SPECIAL4_UNTIL == '0000-00-00' and $course->SPECIAL4_FROM <> '0000-00-00')) && trim($course->SPECIAL4_NAME)!="")	
					{
						$offername = $course->SPECIAL4_NAME;
						$offertext = $course->SPECIAL4_TEXT;
						$offertype = $course->SPECIAL4_TYPE;
						$offerprice = $course->SPECIAL4_PRICE; 
						$offerapplies = $course->SPECIAL4_APPLIES;
						$validto = $course->SPECIAL4_UNTIL;
						$offervalid = TRUE;					
					}		
					
					
					if($offercount==5 && ($course->SPECIAL5_UNTIL > $todaysdate  || ($course->SPECIAL5_UNTIL == '0000-00-00' and $course->SPECIAL5_FROM <> '0000-00-00')) && trim($course->SPECIAL5_NAME)!="")	
					{
						$offername = $course->SPECIAL5_NAME;
						$offertext = $course->SPECIAL5_TEXT;
						$offertype = $course->SPECIAL5_TYPE;
						$offerprice = $course->SPECIAL5_PRICE; 
						$offerapplies = $course->SPECIAL5_APPLIES;
						$validto = $course->SPECIAL5_UNTIL;
						$offervalid = TRUE;					
					}	
					
	
					
					if($offertype=="G") $offertype = "GREEN FEE DISCOUNT";
					elseif($offertype=="1") $offertype = "2 FOR 1";						
					elseif($offertype=="2") $offertype = "2 BALL PACKAGE";
					elseif($offertype=="4") $offertype = "4 BALL PACKAGE";
					elseif($offertype=="S") $offertype = "TEE BOOKING RATE";
					elseif($offertype=="F") $offertype = "GOLF AND FOOD";
					elseif($offertype=="B") $offertype = "GOLF AND BUGGY";
					elseif($offertype=="O") $offertype = "SPECIAL OFFER";
					else { $offertype = "SPECIAL OFFER"; }
					
					if($offerapplies=="P") $offerapplies = "Per Person";
					if($offerapplies=="2") $offerapplies = "for 2 People";
					if($offerapplies=="4") $offerapplies = "for 4 People";
					if($offerapplies=="G") $offerapplies = "Per Tee Booking";
					

					if($offerprice==0) { $offerprice = "SPECIAL OFFER"; }
					else { $offerprice = "£".$offerprice." ".$offerapplies; }				
					//$retval =  "OFFER VALID:".$offervalid;

					//echo "check[".$offercount."]";
					
					if($offervalid==TRUE)
					{

						$course->THEOFFERS[$offer_arraycount]['NAME'] = $offername;				
						$course->THEOFFERS[$offer_arraycount]['TEXT'] = str_limit($offertext, $limit = 100, $end = '...');
						$course->THEOFFERS[$offer_arraycount]['OFFERTYPE'] = $offertype;
						$course->THEOFFERS[$offer_arraycount]['PRICE'] = $offerprice;
						$course->THEOFFERS[$offer_arraycount]['APPLIES'] = $offerapplies;
						$course->THEOFFERS[$offer_arraycount]['VALIDTO'] = $validto;
						
						$offer_arraycount = $offer_arraycount+1;
					}
					
				}	
				
					 
		
		//dd($course->THEOFFERS);
						
		}
	
		
			
	    //SQL DEBUG OUTPUT
		//$queries = DB::getQueryLog();
		//$last_query = end($queries);
		//dd($last_query);
		//echo $last_query['query'];
		//die;
		//exit;
		
		
		//CLUB_URLID
		//IMG_IMAGE1
		//COURSE_NAME
		//CLUB_COUNTY
		//CLUB_COUNTRY
		
		

		
		
		return View::make('offers.offers')->with('theclubs',$courses)
										   ->with('venues_per_page',$selected_venues_per_page)
										   ->with('obo1',$orderby_opt1)
										   ->with('search_val',$search_val)
										   ->with('name',$search_name)
										   ->with('region',$search_region)
										   ->with('country',$search_country)
										   ->with('postcode',$search_postcode)
										   ->with('town',$search_town)
										   ->with('adv_filter_coursetype',$adv_filter_coursetype)
										   ->with('adv_filter_coursedesigner',$adv_filter_coursedesigner)
										   ->with('adv_filter_coursedif',$adv_filter_coursedif)
										   ->with('adv_filter_courseaccom',$adv_filter_courseaccom)
										   ->with('adv_filter_coursechamp',$adv_filter_coursechamp)
										   ->with('adv_filter_coursemulti',$adv_filter_coursemulti)
										   ->with('adv_filter_coursebuggy',$adv_filter_coursebuggy)
										   ->with('adv_filter_coursedriving',$adv_filter_coursedriving);

	}
	

}
