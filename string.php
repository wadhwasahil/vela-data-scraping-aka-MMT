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
  	$a=explode(' ', $string3);
  	$count=count($a);
  	if(strcmp($a[0], 'Others')==0 || strcmp($a[0], 'Other')==0)
  	{
  		$string3="";
  		for($i=1;$i<$count;$i++){
			$string3.=$a[$i];
			if($i!=$count-1)
				$string3.=" ";
		}
  	}


  	$a=explode(' ', $string2);
  	$count=count($a);
  	if(strcmp($a[0], 'Others')==0 || strcmp($a[0], 'Other')==0 || strcmp($a[0], 'Specific')==0)
  	{
  		$string2="";
  		for($i=1;$i<$count;$i++){
			$string2.=$a[$i];
			if($i!=$count-1)
				$string2.=" ";
		}
  	}
  	$temp=$string3." ".$string2." ".$string1;
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