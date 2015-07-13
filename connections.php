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
