<?php

use Illuminate\Http\Request;

class EnquiriesController extends \BaseController {

	private function formatDate($indate)
	{
		$split_date=explode("-", $indate);
		$outdate=$split_date[2] . "/" . $split_date[1] . "/" . $split_date[0];	
		return $outdate;
	}
	
	private function getspecialofferApplies($incode)
	{
		if ($incode=="P")
		{
		  $returnval = "Per Person";
		}
		else if ($incode=="2")
		{
		  $returnval = "2 People";
		}
		else if ($incode=="4") 
		{
		  $returnval = "4 People";
		}	
		else
		{
		  $returnval = "Per Tee Booking";
		}
		
		return $returnval;
	}
	

	public function golf_course_enquiry($cluburlid)
	{
	
		$cluburlid = str_replace('-', ' ',$cluburlid);
	
        $course = DB::table('CLUBS')
		->leftJoin('SPECOFFERS', 'CLUBS.CLUB_ID', '=', 'SPECOFFERS.OFFER_ID')	
		->leftJoin('SYS_CLUBS_USERS', 'CLUBS.CLUB_ID', '=', 'SYS_CLUBS_USERS.CLUB_ID')
		->leftJoin('COURSES', 'CLUBS.CLUB_ID', '=', 'COURSES.CLUB_ID')
		->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')	
		->where('CLUBS.CLUB_URLID',$cluburlid)
		->first();
		
		
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
		
		////// -- populate special offers array -- //////
		$SPECIAL1_NAME=$course->SPECIAL1_NAME;
		$SPECIAL1_TYPE=$course->SPECIAL1_TYPE;
		$SPECIAL1_FROM=$course->SPECIAL1_FROM;
		$SPECIAL1_UNTIL=$course->SPECIAL1_UNTIL;
		$SPECIAL1_PRICE=$course->SPECIAL1_PRICE;
		$SPECIAL1_APPLIES=$course->SPECIAL1_APPLIES;
		$SPECIAL1_TEXT=$course->SPECIAL1_TEXT;	
		$SPECIAL2_NAME=$course->SPECIAL2_NAME;
		$SPECIAL2_TYPE=$course->SPECIAL2_TYPE;
		$SPECIAL2_FROM=$course->SPECIAL2_FROM;
		$SPECIAL2_UNTIL=$course->SPECIAL2_UNTIL;
		$SPECIAL2_PRICE=$course->SPECIAL2_PRICE;
		$SPECIAL2_APPLIES=$course->SPECIAL2_APPLIES;
		$SPECIAL2_TEXT=$course->SPECIAL2_TEXT;		
		$SPECIAL3_NAME=$course->SPECIAL3_NAME;
		$SPECIAL3_TYPE=$course->SPECIAL3_TYPE;
		$SPECIAL3_FROM=$course->SPECIAL3_FROM;
		$SPECIAL3_UNTIL=$course->SPECIAL3_UNTIL;
		$SPECIAL3_PRICE=$course->SPECIAL3_PRICE;
		$SPECIAL3_APPLIES=$course->SPECIAL3_APPLIES;
		$SPECIAL3_TEXT=$course->SPECIAL3_TEXT;
		$SPECIAL4_NAME=$course->SPECIAL4_NAME;
		$SPECIAL4_TYPE=$course->SPECIAL4_TYPE;
		$SPECIAL4_FROM=$course->SPECIAL4_FROM;
		$SPECIAL4_UNTIL=$course->SPECIAL4_UNTIL;
		$SPECIAL4_PRICE=$course->SPECIAL4_PRICE;
		$SPECIAL4_APPLIES=$course->SPECIAL4_APPLIES;
		$SPECIAL4_TEXT=$course->SPECIAL4_TEXT;
		$SPECIAL5_NAME=$course->SPECIAL5_NAME;
		$SPECIAL5_TYPE=$course->SPECIAL5_TYPE;
		$SPECIAL5_FROM=$course->SPECIAL5_FROM;
		$SPECIAL5_UNTIL=$course->SPECIAL5_UNTIL;
		$SPECIAL5_PRICE=$course->SPECIAL5_PRICE;
		$SPECIAL5_APPLIES=$course->SPECIAL5_APPLIES;
		$SPECIAL5_TEXT=$course->SPECIAL5_TEXT;		
		
		$todaysdate = date("Y-m-d");
		$profoffers = array();
		
		$i=0;
		
		$club_has_offers = FALSE;
		
		if ($SPECIAL1_UNTIL > $todaysdate || $SPECIAL1_UNTIL == '0000-00-00' && $SPECIAL1_NAME <>"")
		{
				
			$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL1_NAME;
			$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL1_TYPE;
			$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL1_FROM);
			$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL1_UNTIL);
			
			if($profoffers[$i]['SPECIAL_UNTIL']=="00/00/0000") $profoffers[$i]['SPECIAL_UNTIL'] = "Until Further Notice";
			
			$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL1_PRICE;
			$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL1_APPLIES;
			$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL1_TEXT), $limit = 100, $end = '...');
			$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL1_TEXT);
			
			
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
			
			
			$i++;
			
			$club_has_offers = TRUE;
		}
		
		
	if ($SPECIAL2_UNTIL > $todaysdate || $SPECIAL2_UNTIL == '0000-00-00' && $SPECIAL2_NAME <>"")
		{
			
			$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL2_NAME;
			$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL2_TYPE;
			$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL2_FROM);
			$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL2_UNTIL);
			
			if($profoffers[$i]['SPECIAL_UNTIL']=="00/00/0000") $profoffers[$i]['SPECIAL_UNTIL'] = "Until Further Notice";
			
			$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL2_PRICE;
			$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL2_APPLIES;
			$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL2_TEXT), $limit = 100, $end = '...');	
			$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL2_TEXT);
			
					
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
			
			$i++;
			
			$club_has_offers = TRUE;
		}	
		
		if ($SPECIAL3_UNTIL > $todaysdate || $SPECIAL3_UNTIL == '0000-00-00' && $SPECIAL3_NAME <>"")
		{
			
			$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL3_NAME;
			$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL3_TYPE;
			$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL3_FROM);
			$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL3_UNTIL);
			$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL3_PRICE;
			$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL3_APPLIES;
			$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL3_TEXT), $limit = 100, $end = '...');
			$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL3_TEXT);
			
					
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
			
			$i++;
			
			$club_has_offers = TRUE;
		}	
		
		if ($SPECIAL4_UNTIL > $todaysdate || $SPECIAL4_UNTIL == '0000-00-00'  && $SPECIAL4_NAME <>"")
		{
			
			$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL4_NAME;
			$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL4_TYPE;
			$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL4_FROM);
			$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL4_UNTIL);
			$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL4_PRICE;
			$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL4_APPLIES;
			$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL4_TEXT), $limit = 100, $end = '...');	
			$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL4_TEXT);
			
					
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
			
			$i++;
			
			$club_has_offers = TRUE;
		}	
			
		if ($SPECIAL5_UNTIL > $todaysdate || $SPECIAL5_UNTIL == '0000-00-00'  && $SPECIAL5_NAME <>"")
			{
				
				$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL5_NAME;
				$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL5_TYPE;
				$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL5_FROM);
				$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL5_UNTIL);
				$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL5_PRICE;
				$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL5_APPLIES;
				$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL5_TEXT), $limit = 100, $end = '...');
				$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL5_TEXT);
				
						
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
				
				$i++;
				
				$club_has_offers = TRUE;
			}	
			
		//dd($profoffers);
			
		
		return View::make('enquiries.golf-course-enquiries')->with('club',$course)
														   ->with('profoffers',$profoffers)
														   ->with('PROF_MONEY_SYMBOL',$PROF_MONEY_SYMBOL)
														   ->with('PROF_CLUB_OFFERS',$club_has_offers);
	
	
	
	}
	

public function golf_membership_enquiry($cluburlid)
	{
	
		$cluburlid = str_replace('-', ' ',$cluburlid);
	
        $course = DB::table('CLUBS')
		->leftJoin('SPECOFFERS', 'CLUBS.CLUB_ID', '=', 'SPECOFFERS.OFFER_ID')	
		->leftJoin('SYS_CLUBS_USERS', 'CLUBS.CLUB_ID', '=', 'SYS_CLUBS_USERS.CLUB_ID')
		->leftJoin('COURSES', 'CLUBS.CLUB_ID', '=', 'COURSES.CLUB_ID')
		->leftJoin('IMAGEREFS', 'COURSES.COURSE_ID', '=', 'IMAGEREFS.IMG_COURSE_ID')	
		->where('CLUBS.CLUB_URLID',$cluburlid)
		->first();
		
		
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
		
		////// -- populate special offers array -- //////
		$SPECIAL1_NAME=$course->SPECIAL1_NAME;
		$SPECIAL1_TYPE=$course->SPECIAL1_TYPE;
		$SPECIAL1_FROM=$course->SPECIAL1_FROM;
		$SPECIAL1_UNTIL=$course->SPECIAL1_UNTIL;
		$SPECIAL1_PRICE=$course->SPECIAL1_PRICE;
		$SPECIAL1_APPLIES=$course->SPECIAL1_APPLIES;
		$SPECIAL1_TEXT=$course->SPECIAL1_TEXT;	
		$SPECIAL2_NAME=$course->SPECIAL2_NAME;
		$SPECIAL2_TYPE=$course->SPECIAL2_TYPE;
		$SPECIAL2_FROM=$course->SPECIAL2_FROM;
		$SPECIAL2_UNTIL=$course->SPECIAL2_UNTIL;
		$SPECIAL2_PRICE=$course->SPECIAL2_PRICE;
		$SPECIAL2_APPLIES=$course->SPECIAL2_APPLIES;
		$SPECIAL2_TEXT=$course->SPECIAL2_TEXT;		
		$SPECIAL3_NAME=$course->SPECIAL3_NAME;
		$SPECIAL3_TYPE=$course->SPECIAL3_TYPE;
		$SPECIAL3_FROM=$course->SPECIAL3_FROM;
		$SPECIAL3_UNTIL=$course->SPECIAL3_UNTIL;
		$SPECIAL3_PRICE=$course->SPECIAL3_PRICE;
		$SPECIAL3_APPLIES=$course->SPECIAL3_APPLIES;
		$SPECIAL3_TEXT=$course->SPECIAL3_TEXT;
		$SPECIAL4_NAME=$course->SPECIAL4_NAME;
		$SPECIAL4_TYPE=$course->SPECIAL4_TYPE;
		$SPECIAL4_FROM=$course->SPECIAL4_FROM;
		$SPECIAL4_UNTIL=$course->SPECIAL4_UNTIL;
		$SPECIAL4_PRICE=$course->SPECIAL4_PRICE;
		$SPECIAL4_APPLIES=$course->SPECIAL4_APPLIES;
		$SPECIAL4_TEXT=$course->SPECIAL4_TEXT;
		$SPECIAL5_NAME=$course->SPECIAL5_NAME;
		$SPECIAL5_TYPE=$course->SPECIAL5_TYPE;
		$SPECIAL5_FROM=$course->SPECIAL5_FROM;
		$SPECIAL5_UNTIL=$course->SPECIAL5_UNTIL;
		$SPECIAL5_PRICE=$course->SPECIAL5_PRICE;
		$SPECIAL5_APPLIES=$course->SPECIAL5_APPLIES;
		$SPECIAL5_TEXT=$course->SPECIAL5_TEXT;		
		
		$todaysdate = date("Y-m-d");
		$profoffers = array();
		
		$i=0;
		
		$club_has_offers = FALSE;
		
		if ($SPECIAL1_UNTIL > $todaysdate || $SPECIAL1_UNTIL == '0000-00-00' && $SPECIAL1_NAME <>"")
		{
				
			$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL1_NAME;
			$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL1_TYPE;
			$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL1_FROM);
			$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL1_UNTIL);
			
			if($profoffers[$i]['SPECIAL_UNTIL']=="00/00/0000") $profoffers[$i]['SPECIAL_UNTIL'] = "Until Further Notice";
			
			$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL1_PRICE;
			$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL1_APPLIES;
			$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL1_TEXT), $limit = 100, $end = '...');
			$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL1_TEXT);
			
			
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
			
			
			$i++;
			
			$club_has_offers = TRUE;
		}
		
		
	if ($SPECIAL2_UNTIL > $todaysdate || $SPECIAL2_UNTIL == '0000-00-00' && $SPECIAL2_NAME <>"")
		{
			
			$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL2_NAME;
			$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL2_TYPE;
			$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL2_FROM);
			$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL2_UNTIL);
			
			if($profoffers[$i]['SPECIAL_UNTIL']=="00/00/0000") $profoffers[$i]['SPECIAL_UNTIL'] = "Until Further Notice";
			
			$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL2_PRICE;
			$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL2_APPLIES;
			$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL2_TEXT), $limit = 100, $end = '...');	
			$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL2_TEXT);
			
					
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
			
			$i++;
			
			$club_has_offers = TRUE;
		}	
		
		if ($SPECIAL3_UNTIL > $todaysdate || $SPECIAL3_UNTIL == '0000-00-00' && $SPECIAL3_NAME <>"")
		{
			
			$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL3_NAME;
			$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL3_TYPE;
			$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL3_FROM);
			$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL3_UNTIL);
			$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL3_PRICE;
			$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL3_APPLIES;
			$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL3_TEXT), $limit = 100, $end = '...');
			$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL3_TEXT);
			
					
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
			
			$i++;
			
			$club_has_offers = TRUE;
		}	
		
		if ($SPECIAL4_UNTIL > $todaysdate || $SPECIAL4_UNTIL == '0000-00-00'  && $SPECIAL4_NAME <>"")
		{
			
			$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL4_NAME;
			$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL4_TYPE;
			$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL4_FROM);
			$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL4_UNTIL);
			$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL4_PRICE;
			$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL4_APPLIES;
			$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL4_TEXT), $limit = 100, $end = '...');	
			$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL4_TEXT);
			
					
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
			
			$i++;
			
			$club_has_offers = TRUE;
		}	
			
		if ($SPECIAL5_UNTIL > $todaysdate || $SPECIAL5_UNTIL == '0000-00-00'  && $SPECIAL5_NAME <>"")
			{
				
				$profoffers[$i]['SPECIAL_NAME'] =  $SPECIAL5_NAME;
				$profoffers[$i]['SPECIAL_TYPE'] =  $SPECIAL5_TYPE;
				$profoffers[$i]['SPECIAL_FROM'] =  $this->formatDate($SPECIAL5_FROM);
				$profoffers[$i]['SPECIAL_UNTIL'] =  $this->formatDate($SPECIAL5_UNTIL);
				$profoffers[$i]['SPECIAL_PRICE'] =  $SPECIAL5_PRICE;
				$profoffers[$i]['SPECIAL_APPLIES'] =  $SPECIAL5_APPLIES;
				$profoffers[$i]['SPECIAL_TEXT'] =  str_limit(nl2br($SPECIAL5_TEXT), $limit = 100, $end = '...');
				$profoffers[$i]['SPECIAL_TEXT_FULL'] =  nl2br($SPECIAL5_TEXT);
				
						
			if($profoffers[$i]['SPECIAL_PRICE']==0) 
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']="N/A";
			}
			else
			{
				$profoffers[$i]['SPECIAL_PRICE_FORMATTED']=$PROF_MONEY_SYMBOL.$profoffers[$i]['SPECIAL_PRICE']." ".$this->getspecialofferApplies($profoffers[$i]['SPECIAL_APPLIES']);
			}
		
				
				$i++;
				
				$club_has_offers = TRUE;
			}	
			
		//dd($profoffers);
			
		
		return View::make('enquiries.golf-membership-enquiries')->with('club',$course)
														   ->with('profoffers',$profoffers)
														   ->with('PROF_MONEY_SYMBOL',$PROF_MONEY_SYMBOL)
														   ->with('PROF_CLUB_OFFERS',$club_has_offers);
	
	
	
	}

public function golf_course_enquiry_post()
	{	
	
	    \Mail::send('emails.enquiryGolfday',
        array(
            'name' => "Chris",
            'email' => "cdhope1979@gmail.com",
            'user_message' => "xxx"
        ), function($message)
    {
        $message->from('noreply@ispygolf.com');
        $message->to('chris@brightsparkmedia.co.uk', 'Chris')->subject('New Enquiry');
    });

	return Redirect::to('enquire');
  //return \Redirect::route('contact')->with('message', 'Thanks for contacting us!');
  
	}
	

}
