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
  	$arr=explode(' ', $string2);
  	if(strcmp($arr[0],'Specific')!=0)
  	$temp=$string3." ".$string2." ".$string1;
  	else
  		$temp=$string3 ." ".$string1;
	$result_text = preg_replace('/\b(\w+)\s+\\1\b/i', '$1', $temp);
	$result_text=preg_replace("/[^A-Za-z0-9 ]/", ' ', $result_text);
	$result_text=$result_text;
	$result_text=trim($result_text," ");
	$arr=explode(' ', $result_text);
	$count=count($arr);
	$arr[count($arr)-1]='"'.$arr[count($arr)-1].'"';
	/*if(count($arr)==1){
		$result_text='"'.$result_text.'"';
	}*/
	for($i=0;$i<$count;$i++){
		echo $arr[$i];
		if($i!=$count-1) echo " ";	
	}
	//echo $result_text;
?>