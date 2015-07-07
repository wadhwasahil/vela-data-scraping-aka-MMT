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
		$("#submit_id").click(function(){
			$("#form_id").validate({
				rules: { 
					dancers_name: {
						required:true
					}
				},
				messages: {
					dancers_name:{
						required: ''
					}
				}
			});
			var form=$("#form_id");
			if(form.valid()== false){
				$("#dancers_name").css('background-color',"pink");
			}
			else{
				$("#dancers_name").css('background-color',"");	
			}
		});

		$("#dancers_name").change(function(){
			$("#form_id").validate({
				rules: { 
					dancers_name: {
						required:true
					}
				},
				messages: {
					dancers_name:{
						required: ''
					}
				}
			});
			var form=$("#form_id");
			if(form.valid()== false){
				$("#dancers_name").css('background-color',"pink");
			}
			else{
				$("#dancers_name").css('background-color',"");	
			}
		});		
	});
</script>


<script type="text/javascript">
	$(document).ready(function(){
		$('select.specializations').hide();
		$('select.specifications').hide();
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("select.dancers").change(function(){
			var dancers_id; 
			dancers_id=$("select.dancers option:selected").val();
			if(dancers_id!=""){
				 $("select.specifications").hide();
					//alert(dancers_id);
			     	$.ajax({
		                type: "POST",
		            	url: "specializations.php",
		            	data: { id : dancers_id } 
		        	}).done(function(data){
		            		if(data.length>0){
		        			$("select.specializations").html(data);
		        			$("select.specializations").show();
		        		}
		        		else $("select.specializations").hide();
		        	});	
	        }
	        else{
	        	$("select.specializations").hide();
	        	$("select.specifications").hide();
	        }
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
            	url: "specifications.php",
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

<form action="https://www.google.co.in" id="form_id" method="POST" novalidate="novalidate">
<div id="0" style="float:left;width:9%;position:relative;margin-left:50px">Talent<hr />
	<select id="dancers_name" name="dancers_name" class="dancers">
		<option value="">Select Talent</option>
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

Gender<hr />
<span>
<input type="radio" name="vehicle" value="male"> Male<br>
<div style="float:left;margin-left:829px">
<input type="radio" name="vehicle" value="female"> Female
</div>

<br><br><br>
<div style="float:left;margin-left:50px">
		<input id="submit_id" type="submit" class="btn btn-success" value="Search" />
</div>
</form>
