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
  	$string="";
  	if($string3!=""){
  	$string=$string3." ".$string2;
  	$string=preg_replace('/(\w{2,})(?=.*?\\1)\W*/', '',$string);
  	}
  	else 
  	if($string2!=""){
  	$str=$string2." ".$string1;
  	$str=preg_replace('/(\w{2,})(?=.*?\\1)\W*/', '', $str);
  	$string.=$str;
  }
   else $string.=$string1;
   $string=trim($string);
  	print $string."s";
?>