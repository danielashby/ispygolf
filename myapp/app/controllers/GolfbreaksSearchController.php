<?php


class GolfBreaksSearchController extends \BaseController {


	public function golfbreaks()
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
			$orderby_colsort_1 = "asc";	
		
		}
		else if($orderby_opt1=="S15") 
		{
			$orderby_colname_1 = "HOTELS.HOTEL_ACCOM_STAN";
			$orderby_colsort_1 = "desc";	
		
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
		

	    //->where('HOTELS.HOTEL_POSTCODE ','like','%'.$search_postcode."%")
									
		$venuepackages = DB::table('hotels')			
		->leftJoin('PACKAGES', 'HOTELS.HOTEL_ID', '=', 'PACKAGES.PACKAGE_HOTEL_ID')
		->leftJoin('HOTELS_IMAGEREFS', 'HOTELS.HOTEL_ID', '=', 'HOTELS_IMAGEREFS.IMG_HOTEL_ID')
		->where('HOTELS.HOTEL_ADD1','like','%'.$search_name."%")
		->where('HOTELS.HOTEL_COUNTRY','like','%'.$search_country."%")
		->where('HOTELS.HOTEL_CITY','like','%'.$search_town."%")
		->where('HOTELS.HOTEL_COUNTY','like','%'.$search_region."%")
		->orderBy('PACKAGES.PACKAGE_GBP','ASC')->orderBy($orderby_colname_1,$orderby_colsort_1)
		->paginate($selected_venues_per_page);
			
	
	
	
	/*
	
		->where('HOTELS.HOTEL_ADD1','like','%'.$search_name."%")
		->where('HOTELS.HOTEL_COUNTRY','like','%'.$search_country."%")
		->where('HOTELS.HOTEL_CITY','like','%'.$search_town."%")
		->where('HOTELS.HOTEL_COUNTY','like','%'.$search_region."%")
		->orderBy('PACKAGES.PACKAGE_GBP','ASC')->orderBy($orderby_colname_1,$orderby_colsort_1)
		->paginate($selected_venues_per_page);
		
		
		*/
		
		$i=0;
		
		//SET STANDARD FIELD OPTIONS FOR VIEW
		foreach($venuepackages as $venuepackage)
		{
			
			$hotelid = $venuepackage->HOTEL_ID;
			
			//SET DEFAULT IMAGE
			if($venuepackage->IMG_IMAGE1 == "") {$venuepackage->IMG_IMAGE1 = "search_noimg_lrg.jpg";}

			 //FORMAT URLID 
			 //$venuepackage->HOTEL_URLID = str_replace(' ', '-', $venuepackage->HOTEL_URLID);
			 $venuepackage->HOTEL_URLID = "test";
						
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
	