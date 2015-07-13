<?php 
  include 'connections.php';
  $i= $_POST['id'];
  $query = 'select * from talents_specifications where spid='.$i;
  $ret_val = mysql_query($query,$conn);
  if(mysql_num_rows($ret_val)>0){
    echo '<option value="0">'."Select Specification".'</option>';
  while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
      echo '<option value='.$row['id'].'>'.$row['name'].'</option>';  }
  }
?>