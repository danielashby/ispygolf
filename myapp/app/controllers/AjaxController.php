<?php


class AjaxController extends \BaseController {

	public function golfbreakssearch()
	{
		
		$a_json = array();
		$a_json_row = array();
		
		$searchStr = Input::get( 'term' );
		
		$hotels = Hotel::where('HOTEL_ADD1', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($hotels as $hotel){
		
				  $a_json_row["id"] =  $hotel->HOTEL_ADD1;
				  $a_json_row["value"] =  $hotel->HOTEL_ADD1;
				  $a_json_row["label"] =   $hotel->HOTEL_ADD1;
				  $a_json_row["type"] = "name";
				  $a_json_row["imgsrc"] =  'hotel';
				  array_push($a_json, $a_json_row);
		
		}
		
		$hotels = Hotel::groupBy('HOTEL_COUNTRY')->where('HOTEL_COUNTRY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($hotels as $hotel){
		
				  $a_json_row["id"] =  $hotel->HOTEL_COUNTRY;
				  $a_json_row["value"] =  $hotel->HOTEL_COUNTRY;
				  $a_json_row["label"] =   $hotel->HOTEL_COUNTRY;
				  $a_json_row["type"] = "country";
				  $a_json_row["imgsrc"] =  'globe';
				  array_push($a_json, $a_json_row);
		
		}
		
		$hotels = Hotel::groupBy('HOTEL_COUNTY')->where('HOTEL_COUNTY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($hotels as $hotel){
		
				  $a_json_row["id"] =  $hotel->HOTEL_COUNTY;
				  $a_json_row["value"] =  $hotel->HOTEL_COUNTY;
				  $a_json_row["label"] =   $hotel->HOTEL_COUNTY;
				  $a_json_row["type"] = "region";
				  $a_json_row["imgsrc"] =  'pin';
				  array_push($a_json, $a_json_row);
		
		}
		
		$hotels = Hotel::groupBy('HOTEL_CITY')->where('HOTEL_CITY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($hotels as $hotel){
		if ( strpos( strtolower( $hotel->HOTEL_CITY),strtolower( $searchStr ) ) !== false ) {
				  $a_json_row["id"] =     $hotel->HOTEL_CITY;
				  $a_json_row["value"] =  $hotel->HOTEL_CITY;
				  $a_json_row["label"] =  $hotel->HOTEL_CITY;
				  $a_json_row["type"] =   "town";
				  $a_json_row["imgsrc"] = 'pin';
				  array_push($a_json, $a_json_row);
		}
		
		}
		
		$postcodes  = Postcodes::where('POSTCODE', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($postcodes as $postcode){
		if ( strpos( strtolower( $postcode->POSTCODE),strtolower( $searchStr ) ) !== false ) {
				  $a_json_row["id"] =     $postcode->POSTCODE;
				  $a_json_row["value"] =  $postcode->POSTCODE;
				  $a_json_row["label"] =  $postcode->POSTCODE;
				  $a_json_row["type"] =   "postcode";
				  $a_json_row["imgsrc"] = 'pin';
				  array_push($a_json, $a_json_row);
		}
		
		}		
		

		return Response::json( $a_json );
	
	}
	
	
	public function coursesearch()
	{
		
		$a_json = array();
		$a_json_row = array();
		
		$searchStr = Input::get( 'term' );
		
		$clubs = Club::where('CLUB_ADD1', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
				  $a_json_row["id"] =  $club->CLUB_ADD1;
				  $a_json_row["value"] =  $club->CLUB_ADD1;
				  $a_json_row["label"] =   $club->CLUB_ADD1;
				  $a_json_row["type"] = "name";
				  $a_json_row["imgsrc"] =  'course';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_COUNTRY')->where('CLUB_COUNTRY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
				  $a_json_row["id"] =  $club->CLUB_COUNTRY;
				  $a_json_row["value"] =  $club->CLUB_COUNTRY;
				  $a_json_row["label"] =   $club->CLUB_COUNTRY;
				  $a_json_row["type"] = "country";
				  $a_json_row["imgsrc"] =  'globe';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_COUNTY')->where('CLUB_COUNTY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
				  $a_json_row["id"] =  $club->CLUB_COUNTY;
				  $a_json_row["value"] =  $club->CLUB_COUNTY;
				  $a_json_row["label"] =   $club->CLUB_COUNTY;
				  $a_json_row["type"] = "region";
				  $a_json_row["imgsrc"] =  'pin';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_CITY')->where('CLUB_CITY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		if ( strpos( strtolower( $club->CLUB_CITY),strtolower( $searchStr ) ) !== false ) {
				  $a_json_row["id"] =     $club->CLUB_CITY;
				  $a_json_row["value"] =  $club->CLUB_CITY;
				  $a_json_row["label"] =  $club->CLUB_CITY;
				  $a_json_row["type"] =   "town";
				  $a_json_row["imgsrc"] = 'pin';
				  array_push($a_json, $a_json_row);
		}
		
		}
		
		$postcodes  = Postcodes::where('POSTCODE', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($postcodes as $postcode){
		if ( strpos( strtolower( $postcode->POSTCODE),strtolower( $searchStr ) ) !== false ) {
				  $a_json_row["id"] =     $postcode->POSTCODE;
				  $a_json_row["value"] =  $postcode->POSTCODE;
				  $a_json_row["label"] =  $postcode->POSTCODE;
				  $a_json_row["type"] =   "postcode";
				  $a_json_row["imgsrc"] = 'pin';
				  array_push($a_json, $a_json_row);
		}
		
		}		
		

		return Response::json( $a_json );
	
	}
	
	//TO BE IMPLEMENTED FOR MAIN HOMEPAGE SEARCH TO INCLUDE HOTELS.
	//NEED TO FIGURE OUT HOW COURSE WAND HOTEL WILL GO TO DIFFERENT SEARCH RESULTS.
	public function mainsearch()
	{
		
		$a_json = array();
		$a_json_row = array();
		
		$searchStr = Input::get( 'term' );
		
		
		$hotels = Hotel::where('HOTEL_ADD1', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($hotels as $hotel){
		
				  $a_json_row["id"] =  $hotel->HOTEL_ADD1;
				  $a_json_row["value"] =  $hotel->HOTEL_ADD1;
				  $a_json_row["label"] =   $hotel->HOTEL_ADD1;
				  $a_json_row["type"] = "name";
				  $a_json_row["imgsrc"] =  'hotel';
				  array_push($a_json, $a_json_row);
		
		}
		
		
		
		$clubs = Club::where('CLUB_ADD1', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
				  $a_json_row["id"] =  $club->CLUB_ADD1;
				  $a_json_row["value"] =  $club->CLUB_ADD1;
				  $a_json_row["label"] =   $club->CLUB_ADD1;
				  $a_json_row["type"] = "name";
				  $a_json_row["imgsrc"] =  'course';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_COUNTRY')->where('CLUB_COUNTRY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
				  $a_json_row["id"] =  $club->CLUB_COUNTRY;
				  $a_json_row["value"] =  $club->CLUB_COUNTRY;
				  $a_json_row["label"] =   $club->CLUB_COUNTRY;
				  $a_json_row["type"] = "country";
				  $a_json_row["imgsrc"] =  'globe';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_COUNTY')->where('CLUB_COUNTY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
				  $a_json_row["id"] =  $club->CLUB_COUNTY;
				  $a_json_row["value"] =  $club->CLUB_COUNTY;
				  $a_json_row["label"] =   $club->CLUB_COUNTY;
				  $a_json_row["type"] = "region";
				  $a_json_row["imgsrc"] =  'pin';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_CITY')->where('CLUB_CITY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		if ( strpos( strtolower( $club->CLUB_CITY),strtolower( $searchStr ) ) !== false ) {
				  $a_json_row["id"] =     $club->CLUB_CITY;
				  $a_json_row["value"] =  $club->CLUB_CITY;
				  $a_json_row["label"] =  $club->CLUB_CITY;
				  $a_json_row["type"] =   "town";
				  $a_json_row["imgsrc"] = 'pin';
				  array_push($a_json, $a_json_row);
		}
		
		}
		
		$postcodes  = Postcodes::where('POSTCODE', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($postcodes as $postcode){
		if ( strpos( strtolower( $postcode->POSTCODE),strtolower( $searchStr ) ) !== false ) {
				  $a_json_row["id"] =     $postcode->POSTCODE;
				  $a_json_row["value"] =  $postcode->POSTCODE;
				  $a_json_row["label"] =  $postcode->POSTCODE;
				  $a_json_row["type"] =   "postcode";
				  $a_json_row["imgsrc"] = 'pin';
				  array_push($a_json, $a_json_row);
		}
		
		}		
		

		return Response::json( $a_json );
	
	}
	
	

	

}
