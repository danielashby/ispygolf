<?php


class GolfBreaksSearchController extends \BaseController {


	public function golfbreaks()
	{
		
		$isghelper = new helperlib;
		
		$todaysdate = date("Y-m-d");
		
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
		
		$adv_filter_standard = "";
		$adv_filter_catering = "";
		$adv_filter_spa = ""; 
		$adv_filter_swimming = "";
		$adv_filter_gym = "";
		$adv_filter_tennis = "";
	
			
		//if (Input::has('place')) {$search_term = Input::get( 'place' );}
		
		//Get post variables if passed from search
		//if (Input::has('vpp')){$selected_venues_per_page = 	Input::get( 'vpp' );}
		if (Input::has('ob1')){$orderby_opt1 = 	Input::get( 'ob1' );}	
		if (Input::has('country')){$search_country = 	Input::get( 'country' );}
		if (Input::has('region')){$search_region= 	Input::get( 'region' );}
		if (Input::has('town')){$search_town = 	Input::get( 'town' );}
		if (Input::has('postcode')){$search_postcode = 	Input::get( 'postcode' );}
		if (Input::has('name')){$search_name = 	Input::get( 'name' );}
			
		if (Input::has('adv_filter_standard')){$adv_filter_standard = 	Input::get( 'adv_filter_standard' );}
		if (Input::has('adv_filter_catering')){$adv_filter_catering = 	Input::get( 'adv_filter_catering' );}
		if (Input::has('adv_filter_spa')){$adv_filter_spa = 	Input::get( 'adv_filter_spa' );}		
		if (Input::has('adv_filter_swimming')){$adv_filter_swimming = 	Input::get( 'adv_filter_swimming' );}
		if (Input::has('adv_filter_gym')){$adv_filter_gym = 	Input::get( 'adv_filter_gym' );}
		if (Input::has('adv_filter_tennis')){$adv_filter_tennis = 	Input::get( 'adv_filter_tennis' );}
		
		
		$search_val = $search_country.$search_region.$search_town.$search_postcode.$search_name;
		
		//echo "Venue: ". $search_name;
		
		//SETUP SORT ORDER
		if($orderby_opt1=="PLH") 
		{
			$orderby_colname_1 = "PACKAGES.PACKAGE_GBP";
			$orderby_colsort_1 = "asc";
		}

		else if($orderby_opt1=="S51") 
		{
			$orderby_colname_1 = "HOTELS.HOTEL_ACCOM_STAN";
			$orderby_colsort_1 = "desc";	
		
		}
		else if($orderby_opt1=="S15") 
		{
			$orderby_colname_1 = "HOTELS.HOTEL_ACCOM_STAN";
			$orderby_colsort_1 = "asc";	
		
		}	
		else if($orderby_opt1=="VAZ") 
		{
			$orderby_colname_1 = "HOTELS.HOTEL_ADD1";
			$orderby_colsort_1 = "asc";	
		
		}
		else if($orderby_opt1=="VZA") 
		{
			$orderby_colname_1 = "HOTELS.HOTEL_ADD1";
			$orderby_colsort_1 = "desc";	
		
		}		
		else if($orderby_opt1=="RAZ") 
		{
			$orderby_colname_1 = "HOTELS.HOTEL_COUNTY";
			$orderby_colsort_1 = "asc";	
		
		}	
		else if($orderby_opt1=="RZA") 
		{
			$orderby_colname_1 = "HOTELS.HOTEL_COUNTY";
			$orderby_colsort_1 = "desc";	
		
		}		
		else
		{
			//Default sort order 
			$orderby_colname_1 = "PACKAGES.PACKAGE_GBP";
			$orderby_colsort_1 = "desc";
		}
		
		//dd("Colum:".$orderby_colname_1." ".$orderby_colsort_1);
		
/*
	
			HOTELS.HOTEL_SPA
			HOTELS.HOTEL_SWIM
			HOTELS.HOTEL_TENNIS
			HOTELS.HOTEL_GYM 



		//   $this->radioquerychecks = $this->radioquerychecks . " GROUP BY PACKAGES.PACKAGE_HOTEL_ID ";*/
		   
		   
		   

	    //->where('HOTELS.HOTEL_POSTCODE ','like','%'.$search_postcode."%")
		
	    // PACKAGES.PACKAGE_VALID_TO > '".$this->todaysdate."' ";
		
									
		/*$venuepackages = DB::table('PACKAGES')			
		->leftJoin('HOTELS', 'PACKAGES.PACKAGE_HOTEL_ID', '=', 'HOTELS.HOTEL_ID')
		->leftJoin('HOTELS_IMAGEREFS', 'HOTELS.HOTEL_ID', '=', 'HOTELS_IMAGEREFS.IMG_HOTEL_ID')
		->where('HOTELS.HOTEL_ADD1','like','%'.$search_name."%")
		->where('HOTELS.HOTEL_COUNTRY','like','%'.$search_country."%")
		->where('HOTELS.HOTEL_CITY','like','%'.$search_town."%")
		->where('HOTELS.HOTEL_COUNTY','like','%'.$search_region."%")
		->where('HOTELS.HOTEL_SPA','like','%'.$adv_filter_spa."%")
		->where('HOTELS.HOTEL_SWIM','like','%'.$adv_filter_swimming."%")
		->where('HOTELS.HOTEL_TENNIS','like','%'.$adv_filter_tennis."%")
		->where('HOTELS.HOTEL_GYM','like','%'.$adv_filter_gym."%")
		->where('HOTELS.HOTEL_ACCOM_STAN','like','%'.$adv_filter_standard."%")
		->where('PACKAGES.PACKAGE_HOTEL_CATER','like','%'.$adv_filter_catering."%")
		->where('PACKAGES.PACKAGE_VALID_TO','>',$todaysdate)
		->groupBy('HOTELS.HOTEL_ID')
		->orderBy($orderby_colname_1,$orderby_colsort_1)
		->paginate($selected_venues_per_page);*/
	

	    $venuepackages = DB::table('HOTELS')			
		->rightJoin('PACKAGES', function ($join) {
			$todaysdate = date("Y-m-d");
			$join->on('PACKAGES.PACKAGE_HOTEL_ID', '=', 'HOTELS.HOTEL_ID');
		}) 
		->rightJoin('HOTELS_IMAGEREFS', 'HOTELS.HOTEL_ID', '=', 'HOTELS_IMAGEREFS.IMG_HOTEL_ID')
		->where('HOTELS.HOTEL_ADD1','like','%'.$search_name."%")
		->where('HOTELS.HOTEL_COUNTRY','like','%'.$search_country."%")
		->where('HOTELS.HOTEL_CITY','like','%'.$search_town."%")
		->where('HOTELS.HOTEL_COUNTY','like','%'.$search_region."%")
		->where('HOTELS.HOTEL_SPA','like','%'.$adv_filter_spa."%")
		->where('HOTELS.HOTEL_SWIM','like','%'.$adv_filter_swimming."%")
		->where('HOTELS.HOTEL_TENNIS','like','%'.$adv_filter_tennis."%")
		->where('HOTELS.HOTEL_GYM','like','%'.$adv_filter_gym."%")
		->where('HOTELS.HOTEL_ACCOM_STAN','like','%'.$adv_filter_standard."%")
		->where('PACKAGES.PACKAGE_HOTEL_CATER','like','%'.$adv_filter_catering."%")
		->groupBy('HOTELS.HOTEL_ID')
		->orderBy($orderby_colname_1,$orderby_colsort_1)
		->paginate($selected_venues_per_page);		
		
		
		//->where('PACKAGES.PACKAGE_VALID_TO','>',$todaysdate)
		//taken out as we want to show all hotels wven without packages
			
		
		$i=0;
		
		//SET STANDARD FIELD OPTIONS FOR VIEW
		foreach($venuepackages as $venuepackage)
		{
		    //SET DEFAULT IMAGE
			if($venuepackage->IMG_IMAGE1 == "") {$venuepackage->IMG_IMAGE1 = "search_noimg_lrg.jpg";}
			
			  //FORMAT URL FOR PACKAGE LINK
			  $venuepackage->HOTEL_URLID = "/golf-breaks/".str_replace(' ', '-', $venuepackage->HOTEL_ADD1);
			
			
			   //HOTEL RAITING
			  $hotel_standard = $venuepackage->HOTEL_ACCOM_STAN;
			  if ($hotel_standard == "1")
			  {
				$venuepackage->HOTEL_STAR_RATING == "<img class='shadowed' src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_inactive.png\" /><img src=\"/images/symbols/star_inactive.png\" /><img src=\"/images/symbols/star_inactive.png\" /><img src=\"/images/symbols/star_inactive.png\" />";
			  }
			  elseif ($hotel_standard == "2")
			  {
				$venuepackage->HOTEL_STAR_RATING = "<img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_inactive.png\" /><img src=\"/images/symbols/star_inactive.png\" /> <img src=\"/images/symbols/star_inactive.png\" />";
			  }
			
			  elseif ($hotel_standard == "3")
			  {
				$venuepackage->HOTEL_STAR_RATING = "<img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_inactive.png\" /><img src=\"/images/symbols/star_inactive.png\" />";
			  }
			  
			  elseif ($hotel_standard == "4")
			  {
				$venuepackage->HOTEL_STAR_RATING = "<img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_inactive.png\" />";
			  }
			  
			  elseif ($hotel_standard == "5")
			  {
				$venuepackage->HOTEL_STAR_RATING = "<img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" /><img src=\"/images/symbols/star_active.png\" />";
			  }
			  
			  else
			  {
			  	$venuepackage->HOTEL_STAR_RATING = "STAR RATING NO AVAILABLE";
			  }
			  
			  //PACKAGE APPLIES
			  
			    if ($venuepackage->PACKAGE_APPLIES=="R") { $venuepackage->PACKAGE_APPLIES = "Per Room";}
	  			else {$venuepackage->PACKAGE_APPLIES = "Per Person";}	  
				
			  //CATERING
			  	
			  
			  $package_cater = $venuepackage->PACKAGE_HOTEL_CATER;
				
				
			
			   $venuepackage->PACKAGE_VALID_FR = $isghelper->mysql_date_to_uk_date_slash($venuepackage->PACKAGE_VALID_FR);
			   $venuepackage->PACKAGE_VALID_TO = $isghelper->mysql_date_to_uk_date_slash($venuepackage->PACKAGE_VALID_TO);
	
	
			  if ($package_cater =="A") {$package_cater= "Accommodation Only";}
			  if ($package_cater=="B") {$package_cater= "Bed &amp; Breakfast";}
			  if ($package_cater=="D") {$package_cater= "Dinner, Bed &amp; Breakfast";}
			  if ($package_cater=="F") {$package_cater= "Full Board";}
			  if ($package_cater=="I") {$package_cater= "All Inclusive";}
			  if ($package_cater=="S") {$package_cater= "Self Catering";}
			  
			  $venuepackage->PACKAGE_HOTEL_CATER = $package_cater;
			  
			  //DEESCRIPTION
			 
			  $venuepackage->PACKAGE_DESCRIPTION = $isghelper->splitStringByWord($venuepackage->PACKAGE_DESCRIPTION,65,2);
			  
			  //FACILITIES
			  
			  $hotel_tennis =$venuepackage->HOTEL_TENNIS;
			  $hotel_swim = $venuepackage->HOTEL_SWIM;
		      $hotel_spa = $venuepackage->HOTEL_SPA;	
		      $hotel_gym = $venuepackage->HOTEL_GYM;
		      $hotel_rest = $venuepackage->HOTEL_REST;	
			  $hotel_clubid = $venuepackage->HOTEL_CLUB_ID;
			  
			  $fac_icons = "";
			
	
				if($hotel_rest)
				{
					$fac_icons = "Golf Course | &nbsp;";
				}
				
				if($hotel_clubid!="0" && $hotel_clubid!="")
				{
					$fac_icons = $fac_icons."Restaurant | &nbsp;";
				}
		
				if($hotel_spa)
				{
					$fac_icons = $fac_icons."Spa | &nbsp;";
				}
				
				if($hotel_swim)
				{
					$fac_icons = $fac_icons."Swimming Pool | &nbsp;";
				}
		
				if($hotel_gym)
				{
					$fac_icons = $fac_icons."Gym | &nbsp;";
				}
				
				if($hotel_tennis)
				{
					$fac_icons = $fac_icons."Tennis | &nbsp;";
				}
				
				$venuepackage->HOTEL_AVAL_FACILITIES = $fac_icons;
				
				//START CURRENCY SYMBOL
					
				$PROF_MONEY_SYMBOL = $venuepackage -> PACKAGE_CURRENCY;	
					
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
				
				$venuepackage -> PACKAGE_CURRENCY = $PROF_MONEY_SYMBOL;	
				
				$venuepackage->LOWEST_PACKAGE_PRICE = 0;
				
				
				$hotel_id = $venuepackage->HOTEL_ID;
				
				//echo $hotel_id;
				
				//get the lowest price of the valid packages for the hotel	
				$venuepackage->LOWEST_PACKAGE_PRICE = DB::table('PACKAGES')
				->where('PACKAGES.PACKAGE_VALID_TO','>',$todaysdate)
				->where('PACKAGES.PACKAGE_HOTEL_ID','=',$hotel_id)
				->min('PACKAGES.PACKAGE_PRICE');
				//->orderBy('PACKAGES.PACKAGE_GBP','asc')
				
				//->groupBy('PACKAGES.PACKAGE_HOTEL_ID')->get();
				
				//->groupBy('PACKAGES.PACKAGE_HOTEL_ID')
				
				//dd($package_prices);
				
				//foreach($package_prices as $package_price)
				//{
				
				//$venuepackage->LOWEST_PACKAGE_PRICE = $package_price->PACKAGE_PRICE;
				
				//}
				
	  			
				
				
						
		}
		
		
		
	
		return View::make('golfbreaks.search')->with('venuepackages',$venuepackages)
										   ->with('venues_per_page',$selected_venues_per_page)
										   ->with('obo1',$orderby_opt1)
										   ->with('search_val',$search_val)
										   ->with('name',$search_name)
										   ->with('region',$search_region)
										   ->with('country',$search_country)
										   ->with('postcode',$search_postcode)
										   ->with('town',$search_town)
										   ->with('adv_filter_standard',$adv_filter_standard)
										   ->with('adv_filter_catering',$adv_filter_catering)
										   ->with('adv_filter_spa',$adv_filter_spa)
										   ->with('adv_filter_swimming',$adv_filter_swimming)
										   ->with('adv_filter_gym',$adv_filter_gym)
										   ->with('adv_filter_tennis',$adv_filter_tennis);

	}
	
}
	