<?php include"header.html";?>
<h1 style="margin-left:250px">Match[my]Talent Search</h1><hr />
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
<script type="text/javascript">
	$(document).ready(function(){
		$("select.dancers").change(function(){
			var dancers_id; 
			dancers_id=$("select.dancers option:selected").val();
			//alert(dancers_id);
	     	$.ajax({
                type: "POST",
            	url: "sahil.php",
            	data: { id : dancers_id } 
        	}).done(function(data){
            $("select.specializations").html(data);
        });
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("select.specializations").change(function(){
			var spid; 
			spid=$("select.specializations option:selected").val();
			//alert(spid);
	     	$.ajax({
                type: "POST",
            	url: "spec.php",
            	data: { id : spid } 
        	}).done(function(data){
            $("select.specifications").html(data);
        });
		});
	});
</script>

<div id="0" style="float:left;width:9%;position:relative;margin-left:50px">Talent<hr />
	<select class="dancers">
<?php	
	$query = 'select * from talents';
	$ret_val = mysql_query($query,$conn);
	if(!$ret_val){
		die('could not get data:'.mysql_error());
	}
	while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
			echo '<option value='.$row['id'].'>'.$row['name'].'</option>';	}
?>
	</select>
</div>

<div id="1" style="float:left;width:22%;position:relative;">Specialization<hr />
	<select class="specializations">
<?php	
	$query = 'select * from talents_specializations';
	$ret_val = mysql_query($query,$conn);
	if(!$ret_val){
		die('could not get data:'.mysql_error());
	}
	while($row = mysql_fetch_array($ret_val,MYSQL_ASSOC)){
			echo '<option value='.$row['id'].'>'.$row['name'].'</option>';	}
?>			
	</select>
</div>

<div id="2" style="float:left;width:30%;position:relative"> Specification<hr />
	<select class="specifications">
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
<br><br><br>
	<form action="https://www.google.com#q=hi" method="get">
		<button type="submit" class="btn btn-success">Go</button>
	</form>
