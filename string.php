<?php
include('connections.php');
	$tal_id = $_POST['talent_id'];
	$special_id = $_POST['specialization_id'];
	$specific_id = $_POST['specification_id'];
	$query = 'select * from talents where id='.$tal_id;
	$ret_val = mysql_query($query,$conn);
	$string1 = ""; 
	$string2=""; 
	$string3=""; 
	 while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
      	$string1=$row['name'];  
  	}
	$query = 'select * from talents_specializations where id='.$special_id;
	$ret_val = mysql_query($query,$conn);
	 while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
      	$string2=$row['name'];  
  	}
	$query = 'select * from talents_specifications where id='.$specific_id;
	$ret_val = mysql_query($query,$conn);
	 while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
      	$string3=$row['name'];  
  	}
  	$temp = split(' ', $string2);
  	$cnt = substr_count($string2, ' ');
  	if($string2 != ""){	
  		if($cnt >= 1)
  		if(strcmp($temp[1],$string1)==0) 
  			$string1="";
  	}
  	if($string1 != "")	
		$string = $string3 .' '.$string2 .' '.$string1.'s';
	else
		$string = $string3 .' '.$string2 .'s';
	$cnt = substr_count($string2, ' ');
	if($cnt == 2){
		$temp = split(' ', $string);
		$string = $temp[1] . ' '.$temp[2].'s';
	}
	$new_string="";
	$flag=0;
	for($i=0 ; $i < strlen($string) ; $i++){
		$char = substr($string, $i,1);
		if($char==" " && $flag==0){
			continue;
		}
		else{
			$flag=1;
			$new_string = $new_string . $char;
		}
	}
	echo $new_string;
?>