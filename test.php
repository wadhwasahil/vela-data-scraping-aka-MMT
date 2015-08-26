<?php include"header.html"; include'connections.php'; ?>
<h1 style="margin-left:250px;font-style:sans-serif">Match[my]Talent Search Engine</h1><hr />
<body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#submit_id").click(function(){
			$("#form_id").validate({
				rules: { 
					talents_name: {
						required:true
					}
				},
				messages: {
					talents_name:{
						required: ''
					}
				}
			});
			var form=$("#form_id");
			if(form.valid()== false){
				$("#talents_name").css('background-color',"pink");
			}
			else{
				$("#talents_name").css('background-color',"");	
			}
			var url = "https://www.google.co.in/search?";
			var string = $("#disp").val();
			var city = $("#city option:selected").val();
			var sex = $('#sex input:checked').val();
			var query = "";
			var temp = string.split(" ");
			if(sex != undefined){
				query +="q=allintext:"+sex+"+";
			}
			else{
				query+="q=allintext:";
			}
			query+= string;
			query+="&sort=date&cr=countryIN";
			//alert(string);
			string = string.replace(/ /g,"+");
			if(city != ""){
				query += "+"+city;
			}
			url += query;
			url +="&aqs=chrome..69i57.1033j0j7&sourceid=chrome&es_sm=93& -site:https:://www.google.co.in";
			//url += "&allintext%3A"+string;
			$('#form_id').attr('action',url); 
			$('#sex input').removeAttr("checked");
			$.ajax({
					type: "POST",
					url: "script.php",
					data: {
						url : url
					}
				}).done(function(data){
				});
		});


		$("#talents_name").change(function(){
			$("#form_id").validate({
				rules: { 
					talents_name: {
						required:true
					}
				},
				messages: {
					talents_name:{
						required: ''
					}
				}
			});
			var form=$("#form_id");
			if(form.valid()== false){
				$("#talents_name").css('background-color',"pink");
			}
			else{
				$("#talents_name").css('background-color',"");	
			}
		});		
	});
</script>


<script type="text/javascript">
	$(document).ready(function(){
			var spid='<option value="0">Select Specialization</option>';
        	$("select.specializations").html(spid);
	       	$("select.specializations").hide();
	       	spid='<option value="0">Select Specification</option>';
       		$("select.specifications").html(spid);
	       	$("select.specifications").hide();
	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("select.talents").change(function(){
			var talents_id; 
			talents_id=$("select.talents option:selected").val();
			if(talents_id!=""){

				 var spid='<option value="0">Select Specialization</option>';
        		 $("select.specializations").html(spid);
		         $("select.specializations").hide();
		         spid='<option value="0">Select Specification</option>';
		         $("select.specifications").html(spid);
		          $("select.specifications").hide();

					//alert(talents_id);
			     	$.ajax({
		                type: "POST",
		            	url: "specializations.php",
		            	data: { id : talents_id } 
		        	}).done(function(data){
		            		if(data.length>0){
		        			$("select.specializations").html(data);
		        			$("select.specializations").show();
		        		}
		        		else {
		        			var spid='<option value="0">Select Specialization</option>';
        					$("select.specializations").html(spid);
		        			$("select.specializations").hide();
		        		}
		        	});
		        var tal_id=$("select.talents option:selected").val();
		        var special_id=$("select.specializations option:selected").val();
				var specific_id=$("select.specifications option:selected").val();
				$.ajax({
					type: "POST",
					url: "string.php",
					data: {
						talent_id : tal_id,
						specialization_id : special_id,
						specification_id : specific_id
					}
				}).done(function(data){
					//alert(data);
						$("#disp").val(data);
				});

	        }
	        else{
	        	var spid='<option value="0">Select Specialization</option>';
        		$("select.specializations").html(spid);
	        	$("select.specializations").hide();
	        	spid='<option value="0">Select Specification</option>';
        		$("select.specifications").html(spid);
	        	$("select.specifications").hide();
	        	$("#disp").val("");
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
        		else {
        			spid='<option value="0">Select Specification</option>';
        			$("select.specifications").html(spid);
        			$("select.specifications").hide();
        		}
        	});
        	var tal_id=$("select.talents option:selected").val();
			if(tal_id!=""){
				var special_id=$("select.specializations option:selected").val();
				var specific_id=$("select.specifications option:selected").val();
				var spid='<option value="0">Select Specification</option>';
				if(special_id==0)
					specific_id=0;
		         $("select.specifications").html(spid);
		         $("select.specifications").hide();

				$.ajax({
					type: "POST",
					url: "string.php",
					data: {
						talent_id : tal_id,
						specialization_id : special_id,
						specification_id : specific_id
					}
				}).done(function(data){
					//alert(data);
						$("#disp").val(data);
				});
			}
			else{
				$('#disp').val("");
			}
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("select.specifications").change(function(){
			var tal_id=$("select.talents option:selected").val();
			if(tal_id!=""){
				var special_id=$("select.specializations option:selected").val();
				var specific_id=$("select.specifications option:selected").val();
				$.ajax({
					type: "POST",
					url: "string.php",
					data: {
						talent_id : tal_id,
						specialization_id : special_id,
						specification_id : specific_id
					}
				}).done(function(data){
						$("#disp").val(data);
				});
			}
			else{
				$('#disp').val("");
			}
		});	
	});
</script>

<form target=" _blank" action="" id="form_id" method="POST" novalidate="novalidate">
<div id="0" style="float:left;width:9%;position:relative;margin-left:50px">Talent<hr align="left"/>
	<select id="talents_name" name="talents_name" class="talents">
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

<div id="city" style="float:left;width:10%;position:relative">City<hr/ >
	<select>
		<option value="">Select City</option>
		<option value="Delhi">Delhi</option>
		<option value="Ahmedabad">Ahmedabad</option>
		<option value="Mumbai">Mumbai</option>
		<option value="Kolkata">Kolkata</option>
		<option value="Pune">Pune</option>
	</select>
</div>
<div id="sex style="float:left;width:10%;position:relative"">Gender<hr align="left" width="4%"/>
<input type="radio" name="vehicle" value="Male"> Male<br>
<input style="float:left;margin-left:800px" type="radio" name="vehicle" value="Female"> &nbsp;Female
</div>

<br><br><br>
<div style="float:left;margin-left:50px">
		<input id="submit_id" type="submit" class="btn btn-success" value="Search" />
</div>
</form>

<div style="margin-left:150px;margin-top:4px">
	<input id="disp" style="width:250px"type="text" placeholder="Query" value=""/>	
</div>

</body>
<footer>
<p style="font-style:italic"><h4>Powered by: <u><a href="http://www.matchmytalent.com/">Match[my]Talent</a></u></h4></p>
</footer>
<!--<script type="text/javascript">
	$(document).ready(function(){
		$("#tt li").click(function(){
			spid=this.value;
			alert(spid);
		});
	});
</script>

<div class="dropdown">
  <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown trigger
    <span class="caret"></span>
  </button>
  <ul id="tt" class="dropdown-menu" aria-labelledby="dLabel">
    <li value="7">hi</li>
    <li value="8">bi</li>
  </ul>
</div>
-->
