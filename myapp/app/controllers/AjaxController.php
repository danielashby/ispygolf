<?php


class AjaxController extends \BaseController {

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
				  $a_json_row["imgsrc"] =  '/images/course.png';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_COUNTRY')->where('CLUB_COUNTRY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
				  $a_json_row["id"] =  $club->CLUB_COUNTRY;
				  $a_json_row["value"] =  $club->CLUB_COUNTRY;
				  $a_json_row["label"] =   $club->CLUB_COUNTRY;
				  $a_json_row["type"] = "country";
				  $a_json_row["imgsrc"] =  '/images/marker.jpg';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_COUNTY')->where('CLUB_COUNTY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
				  $a_json_row["id"] =  $club->CLUB_COUNTY;
				  $a_json_row["value"] =  $club->CLUB_COUNTY;
				  $a_json_row["label"] =   $club->CLUB_COUNTY;
				  $a_json_row["type"] = "region";
				  $a_json_row["imgsrc"] =  '/images/marker.jpg';
				  array_push($a_json, $a_json_row);
		
		}
		
		$clubs = Club::groupBy('CLUB_CITY')->where('CLUB_CITY', 'LIKE', "$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		if ( strpos( strtolower( $club->CLUB_CITY),strtolower( $searchStr ) ) !== false ) {
				  $a_json_row["id"] =     $club->CLUB_CITY;
				  $a_json_row["value"] =  $club->CLUB_CITY;
				  $a_json_row["label"] =  $club->CLUB_CITY;
				  $a_json_row["type"] =   "town";
				  $a_json_row["imgsrc"] = '/images/marker.jpg';
				  array_push($a_json, $a_json_row);
		}
		
		}

		return Response::json( $a_json );
	
	}
	

	

}
