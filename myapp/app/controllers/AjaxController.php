<?php


class AjaxController extends \BaseController {



	
	public function coursesearch()
	{
		
		$a_json = array();
		$a_json_row = array();
		
		$searchStr = Input::get( 'term' );
		
		$clubs = Club::where('CLUB_ADD1', 'LIKE', "%$searchStr%" )->get()->take(3);
		 
		foreach($clubs as $club){
		
	
				  $a_json_row["id"] =  $club->CLUB_ADD1;
				  $a_json_row["value"] =  $club->CLUB_ADD1;
				  $a_json_row["label"] =   $club->CLUB_ADD1;
				  $a_json_row["type"] = "name";
				  $a_json_row["imgsrc"] =  '/images/course.png';
				  array_push($a_json, $a_json_row);
		
		}
		
		 
		//$response = array(
		//	'status' => 'success',
		//	'msg' => 'Setting created successfully',
		//);
	
		return Response::json( $a_json );
	
	}
	

	

}
