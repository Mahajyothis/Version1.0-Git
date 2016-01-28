<?php
class Custom_function{
  

function customdate($x) {
/*
2012-06-11  <-- input
june 11, 2012  <--return

*/
	$yt = explode(' ', $x);
	$y = explode('-', $yt[0]);
	$month = $this->monthname($y['1']);
	$ret = $month.' '.$y[2].', '.$y[0];
	return $ret;
}


function customdate1($x) {
/*
2012-06-11  <-- input
24 Oct 2012  <--return

*/
	$yt = explode(' ', $x);
	$y = explode('-', $yt[0]);
	$month = $this->monthname($y['1']);
	$ret = $y[2].' '.substr($month,0,3).' '.$y[0];
	return $ret;
}

function customdate2($x) {
/*
2012-06-11  <-- input
24 Oct 2012  <--return

*/
	$yt = explode(' ', $x);
	$y = explode('-', $yt[0]);
	$month = $this->monthname($y['1']);
	$ret = $y[2].' '.substr($month,0,3).' '.$y[0];
	return $ret;
}

function time_difference($date)
{
/*
$date = "2010-07-16 17:45";
$result = time_difference($date); // 1 year ago

*/
    if(empty($date)) {
        return " ";
    }
    
    $periods         = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths         = array("59","59","23","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {   
        return " ";
    }
 
    // is it future date or past date
    if($now > $unix_date) {   
        $difference     = $now - $unix_date;
        $tense         = "ago";
        
    } else {
        $difference     = $unix_date - $now;
        $tense         = "ago";
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
        $periods[$j].= "s";
    }
    
    return "$difference $periods[$j] {$tense}";
}

function random_gen($length)
{
  $random= "";
   srand((double)microtime()*1000000);
  //$char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $char_list = "abcdefghijklmnopqrstuvwxyz";
  $char_list .= "1234567890";
  // Add the special characters to $char_list if needed

  for($i = 0; $i < $length; $i++)  
  {    
     $random .= substr($char_list,(rand()%(strlen($char_list))), 1);  
  }  
  return $random;
}

function monthname($x) {
    switch ($x)
    {
	case 1: return "January"; break;
	case 2: return "February";break;
	case 3: return "March"; break;
	case 4: return "April"; break;
	case 5: return "May";  break;
	case 6: return "Jun"; break;
	case 7: return "July"; break;  
	case 8: return "August"; break;  
	case 9: return "September"; break;  
	case 10: return "October"; break;  
	case 11: return "November"; break;  
	case 12: return "December"; break;  
	default: echo ""; 
    }
  }

function checkDateFormat($date) {
	$date_time1 = strtotime("1970-01-01 00:00:00");
	$date_time1 = date('Y-m-d H:i:s', $date_time1);

	
	$date_time3 = strtotime("1970-01-01 05:30:00");
	$date_time3 = date('Y-m-d H:i:s', $date_time3);

	$blndate = true;
	$date_time2 = strtotime("0000-00-00 00:00:00");
	$date_time2 = date('Y-m-d H:i:s', $date_time2);

	if($date == $date_time2 )
	{
  		$blndate = false;
	}
	if($date == $date_time1 )
	{
  		$blndate = false;
	}
	if($date == $date_time3 )
	{
  		$blndate = false;
	}

       return $blndate; 
   }

 ### ----------------------FILTER------------------------------------###
function filter($data) {
	if(!is_array($data)){
	$data = trim( htmlentities( strip_tags($data) ) );
	if ( get_magic_quotes_gpc() )
			$data = stripslashes($data);
	$data = mysql_real_escape_string($data);
	return $data;
	} else {
	//// $data is an array - filter array keeping array key=>value association
	$Adata=array();
	foreach($data as $key => $val){
	$val = trim( htmlentities( strip_tags($val) ) );
	if ( get_magic_quotes_gpc() )
			$val = stripslashes($val);
	$val = mysql_real_escape_string($val);
	$Adata[$key]=$val;
	}
	return $Adata;
	}
}

	function GenerateKey($length = 7)
	{
		$password = "";
		$possible = "0123456789abcdefghijkmnopqrstuvwxyz";
		$i = 0;
		
		while ($i < $length) {
			$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
			
			if (!strstr($password, $char)) {
				$password .= $char;
				$i++;
			}
		}
		return $password;
	}

	

	function excerpt($string,$limit='')
	{
		if(!$limit)
			return $string;
		if($limit > 0 && $limit >= strlen($string))
			return $string;
		else
			return substr($string,0,$limit)."..";
			
	}

function sort_array_by_field($original,$field,$descending = false)
{
	$sortArr = array();
	
	foreach ( $original as $key => $value )
	{
		$sortArr[ $key ] = $value[ $field ];
	}

	if ( $descending )
	{
		arsort( $sortArr );
	}
	else
	{
		asort( $sortArr );
	}
	
	$resultArr = array();
	foreach ( $sortArr as $key => $value )
	{
		$resultArr[ $key ] = $original[ $key ];
	}

	return $resultArr;
}  

function checkValues($value)
{
	$value = trim($value);
	if (get_magic_quotes_gpc())
	{
		$value = stripslashes($value);
	}
	$value = strtr($value, array_flip(get_html_translation_table(HTML_ENTITIES)));
	$value = strip_tags($value);
	$value = htmlspecialchars($value);
	return $value;
}


//change dob format to yyyy-mm-dd
	function changeDateFormat($date){
	//Date of birth
	$x = explode('/',$date);
	if(!isset($x[1])) return $date; //upon update profile id does not change the dob
	$dob = $x[2].'-'.$x[0].'-'.$x[1];
	return $dob;
	}
	
//RENAME FILES
	function rename_files($file_name)
	{
		$random = rand(1111,9999);		
	/// REPLACE QUOTES FROM FILE NAME
		$replaced_name0 = str_replace('%', '_', $file_name);
		$replaced_name1 = str_replace(' ', '_', $replaced_name0);
		$replaced_name2 = str_replace("'", "_", $replaced_name1);
		$replaced_name3 = str_replace('"', '_', $replaced_name2);
		$new_name = $random.'_'.$replaced_name3;		// prefix file name with random num
		return $new_name;
	}
	
	
	function get_notification_time($global_time,$created_on){
			$left_time = $this->s_datediff('s',$global_time,$created_on);
					$show_time = 'Few seconds ago';
					if($left_time > 59) {
						$left_time = $left_time1 = floor($left_time/60);
						($left_time == 1) ? $show_time = '1 minute ago' :$show_time = floor($left_time).' minutes ago';
					}
					if(isset($left_time1) && ($left_time1 > 59)) {
						$left_time = $left_time2 =  floor($left_time/60);
						($left_time == 1) ? $show_time = '1 hour ago' :$show_time = floor($left_time).' hours ago';
					}
					if(isset($left_time2) && ($left_time2 > 23)) {
						$left_time = $left_time3 =  floor($left_time/24);
						($left_time == 1) ? $show_time = 'Yesterday' :$show_time = floor($left_time).' days ago';
					}
					if(isset($left_time3) && ($left_time3 > 1)) $show_time = $this->chat_time_with_sec($created_on);
					return $show_time;
   }
   
	function s_datediff( $str_interval, $global_year, $dead_line, $relative=false){
		//$global_year = date("Y-m-d");
		//echo $global_year . $dead_line;
       if( is_string( $global_year)) $global_year = date_create( $global_year);
       if( is_string( $dead_line)) $dead_line = date_create( $dead_line);

       $diff = date_diff( $global_year, $dead_line, ! $relative );
      //print_r($diff);
       switch( $str_interval){
           case "y":
               $total = $diff->y + $diff->m / 12 + $diff->d / 365.25;
			   break;
           case "m":
               $total= $diff->y * 12 + $diff->m + $diff->d/30 + $diff->h / 24;
               break;
           case "d":
               $total = $diff->y * 365.25 + $diff->m * 30 + $diff->d + $diff->h/24 + $diff->i / 60;
               break;
           case "h":
               $total = ($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h + $diff->i/60;
               break;
           case "i":
               $total = (($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i + $diff->s/60;
               break;
           case "s":
               $total = ((($diff->y * 365.25 + $diff->m * 30 + $diff->d) * 24 + $diff->h) * 60 + $diff->i)*60 + $diff->s;
               break;
          }
		 //echo $total;
		if( $diff->invert){
			return -1 * $total;
		}
		else{
			return $total;
		}
   }

   function estimate_date($current='',$add_value='',$add_type=''){
	/*
	 add number of days/weeks/months/years($current) to a specific date ($current) and return new date
	 input : 
		$current : 2014-02-20
		$add_value : integer
		$add_type : 'day','week','month','year'
		return : 2014-10-20
	*/
	if($add_value=='' && $add_type=='') return 0;
	if($current=='') $current = date('Y-m-d');
	$addition = $add_value .' ' .$add_type;
	return date("Y-m-d", strtotime(date("Y-m-d", strtotime($current)) . " + $addition"));
   }

   public function custom_ViewUrl($id,$name){
		$url_var = str_replace(' ','_',strtolower($name));
		$url_var = preg_replace('/[^A-Za-z0-9\-]/', '', $url_var); // Removes special chars.
		$url_var = preg_replace('/-+/', '_', $url_var);
		return $id.'-'.$url_var;
	}

	function in_array_multi($needle, $haystack, $strict = false) {
	    foreach ($haystack as $item) {
	        if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_multi($needle, $item, $strict))) {
	            return key($haystack)+1;
	        }
	    }
	    return false;
	}

	// SHOW CHAT TIME FUNCTION with seconds
	function chat_time_with_sec($datetime){
/* 2010-07-16 17:45:10 <- input
17:45 <- Output  */
		$date_frmt = $this->customdate1($datetime);
		$datetime = explode(' ',$datetime);
		$otime = explode(':',$datetime[1]);
		$ampm='am';
		if($otime[0]>12){
			$ampm='pm';
			switch($otime[0]){
				case 13 : $otime[0]='01';
						  break;
				case 14 : $otime[0]='02';
						  break;
				case 15 : $otime[0]='03';
						  break;
				case 16 : $otime[0]='04';
						  break;
				case 17 : $otime[0]='05';
						  break;
				case 18 : $otime[0]='06';
						  break;	
				case 19 : $otime[0]='07';
						  break;  
				case 20 : $otime[0]='08';
						  break;
				case 21 : $otime[0]='09';
						  break;
				case 22 : $otime[0]='10';
						  break;
				case 23 : $otime[0]='11';
						  break;	  
			}
		}
		$timemin = $otime[0].":".$otime[1].":".$otime[2]." ".$ampm;
		return $date_frmt.' '.$timemin;
	}

	public function create_ViewUrl($id,$name){
		/*$url_var = str_replace(' ','-',strtolower($name));
		echo $url_var;
		$url_var = preg_replace('/[^A-Za-z0-9\-]/', '', $url_var); // Removes special chars.
		$url_var = preg_replace('/-+/', '-', $url_var);*/
		
		$url_var = str_replace(' ','-',strtolower($name));
		$url_var = preg_replace('/[^A-Za-z0-9-\-]/', '', $url_var);
		$url_var = str_replace('+', '-', $url_var);
		return $id.'-'.$url_var;
	}
	

		
}

/* End of file */