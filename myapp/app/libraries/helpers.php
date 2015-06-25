<?php class helperlib 
{
	
	function selected($param,$value) {
        if ($param == $value) print "SELECTED";
    }


	function selected_ret($param,$value) {
        if ($param == $value) return "SELECTED";
    }


	function ischecked($value)
	{
	  if($value =="1") { return "checked";}
	}

	function yesno($data)
	{
		if($data=="1") $output="Yes";
		else $output="No";
		return $output;
	}
		
	function yesnotick($data)
	{
		if($data=="1") $output="<img src=\"/images/symbols/tick.jpg\">";		
		else $output="<img src=\"/images/symbols/notick.jpg\">";
		return $output;
	}

	function uk_date_to_mysql_date($date)
	{
	   $split_date=explode("-", $date);
	   $date=$split_date[2] . "-" . $split_date[1] . "-" . $split_date[0];		
		
	   return $date; 
	} 

	function mysql_date_to_uk_date($date)
	{
	   $split_date=explode("-", $date);
	   $date=$split_date[2] . "-" . $split_date[1] . "-" . $split_date[0];	
	   
	   return $date; 
	} 
	
	function mysql_date_to_uk_date_slash($date)
	{
		
	   if($date<>"")
	   {
		
	   $split_date=explode("-", $date);
	   $date=$split_date[2] . "/" . $split_date[1] . "/" . $split_date[0];	
	   
	   }
	   
	   return $date; 
	} 
		
	
	// Substring without losing word meaning and
	// tiny words (length 3 by default) are included on the result.
	// "..." is added if result do not reach original string length
	
	function splitStringByWord($str, $length, $minword)
	{
		$sub = '';
		$len = 0;
		
		foreach (explode(' ', $str) as $word)
		{
			$part = (($sub != '') ? ' ' : '') . $word;
			$sub .= $part;
			$len += strlen($part);
			
			if (strlen($word) > $minword && strlen($sub) >= $length)
			{
				break;
			}
		}
		
		return $sub . (($len < strlen($str)) ? '...' : '');
	}	
	
}?>