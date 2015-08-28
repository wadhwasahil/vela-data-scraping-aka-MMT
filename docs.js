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
			if(city != ""){
				query += "+"+city;
			}
			query+="&sort=date&cr=countryIN";
			//alert(string);
			string = string.replace(/ /g,"+");
			url += query;
			url +="&aqs=chrome..69i57.1033j0j7&sourceid=chrome&es_sm=93& -site:https:://www.google.co.in";
			//url += "&allintext%3A"+string;
			var val=$("#format input:checked").val();
				/*$.ajax({
					type: "POST",
					url: "script.php",
					data: {
						url : url
					}
				}).done(function(data){
				});*/
			var temp='script.php?q='+string;
			if(val=="csv"){
				$('#form_id').attr('action',temp);
			}
			else
			$('#form_id').attr('action',url); 
			$('#sex input').removeAttr("checked");
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