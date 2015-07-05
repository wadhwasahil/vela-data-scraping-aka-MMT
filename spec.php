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
  $i= $_POST['id'];
  $query = 'select * from talents_specifications where spid='.$i;
  $ret_val = mysql_query($query,$conn);
  while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
      echo '<option value='.$row['id'].'>'.$row['name'].'</option>';  }
?>