<?php include"header.html";?>
<h1 style="margin-left:250px">Match[my]Talent Search Engine</h1><hr />
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
		$('select.specializations').hide();
		$('select.specifications').hide();
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("select.dancers").click(function(){
			var dancers_id; 
			dancers_id=$("select.dancers option:selected").val();
		 $("select.specifications").hide();
			//alert(dancers_id);
	     	$.ajax({
                type: "POST",
            	url: "sahil.php",
            	data: { id : dancers_id } 
        	}).done(function(data){
            		if(data.length>0){
        			$("select.specializations").html(data);
        			$("select.specializations").show();
        		}
        		else $("select.specializations").hide();
        	});	
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("select.specializations").click(function(){
			var spid; 
			spid=$("select.specializations option:selected").val();
			//alert(spid);
	     	$.ajax({
                type: "POST",
            	url: "spec.php",
            	data: { id : spid } 
        	}).done(function(data){
        		if(data.length>0){
        			$("select.specifications").html(data);
        			$("select.specifications").show();
        		}
        		else $("select.specifications").hide();
        	});
		});
	});
</script>

<div id="0" style="float:left;width:9%;position:relative;margin-left:50px">Talent<hr />
	<select class="dancers">
		<option value="0">Select Talent</option>
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

<div id="1" style="float:left;width:23%;position:relative;">Specialization<hr />
	<select class="specializations">
	</select>
</div>

<div id="2" style="float:left;width:15%;position:relative"> Specification<hr />
	<select class="specifications">
	</select>
</div>

<div style="float:left;width:10%;position:relative">City<hr/ >
	<select>
		<option value="0">Select City</option>
		<option value="1">Delhi</option>
		<option value="2">Ahmedabad</option>
		<option value="3">Mumbai</option>
	</select>
</div>

<form role="form">Gender<hr />
<input type="radio" name="vehicle" value="male"> Male <br>
<div style="float:left;margin-left:829px">
	<input type="radio" name="vehicle" value="female"> Female
</div>
</form>

<br><br><br>
<div style="float:left;margin-left:50px">
	<form action="https://www.google.com#q=hi" method="get">
		<button type="submit" class="btn btn-success">Search</button>
	</form>
</div>