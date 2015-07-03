<?php include"header.html";?>
<h1>Match[my]Talent Search</h1><hr />
<?php 
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	$dbname = "MMT";

	$conn= mysql_connect($servername,$username,$password);
	if(!$conn){
		die('could not connect :'. mysql_error());
	}
	mysql_select_db($dbname);
?>
<div style="float:left;width:9%">
	<select>
<?php	
	$query = 'select * from talents';
	$ret_val = mysql_query($query,$conn);
	if(!$ret_val){
		die('could not get data:'.mysql_error());
	}
	while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
		echo '<option>'.$row['name'].'</option>';
	}
?>
	</select>
</div>
<div style="float:left;width:22%">
	<select>
<?php 
	$query = 'select * from talents_specializations';
	$ret_val = mysql_query($query,$conn);
	if(!$ret_val){
		die('could not get data:'.mysql_error());
	}
	while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
		echo '<option>'.$row['name'].'</option>';
	}
?>
	</select>
</div>
<div style="float:left;width:30%">
	<select>
<?php 
	$query = 'select * from talents_specifications';
	$ret_val = mysql_query($query,$conn);
	if(!$ret_val){
		die('could not get data:'.mysql_error());
	}
	while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
		echo '<option>'.$row['name'].'</option>';
	}
	mysql_close($conn);
?>
	</select>
</div>