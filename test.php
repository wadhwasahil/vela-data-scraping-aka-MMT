<?php include"header.html"; 
	  include'connections.php'; 
	  include "docs.js";
?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-center">
                    <li>
                        <a href="#"><h1 style="font-style:sans-serif">Match[my]Talent Search Engine</h1></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
 <br><br><br><br><br>   
<body style="background-color:#b0c4de;">
<form target=" _blank" action="" id="form_id" method="POST" novalidate="novalidate">

<div id="0" style="float:left;width:9%;position:relative;margin-left:50px"><b style="text-decoration: underline">Talent</b><br/><br/><br/>
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
<div id="1" style="float:left;width:23%;position:relative;margin-left:80px"><b style="text-decoration: underline">Specialization</b><br/><br/><br/>
	<select class="specializations">
	</select>
</div>

<div id="2" style="float:left;width:15%;margin-left:-15px"> <b style="text-decoration: underline">Specification</b><br/><br/><br/>
	<select class="specifications">
	</select>
</div>

<div id="city" style="float:left;width:10%;margin-left:50px"><b style="text-decoration: underline">City</b><br/><br/><br/>
	<select>
		<option value="">Select City</option>
		<option value="Delhi">Delhi</option>
		<option value="Ahmedabad">Ahmedabad</option>
		<option value="Mumbai">Mumbai</option>
		<option value="Kolkata">Kolkata</option>
		<option value="Pune">Pune</option>
	</select>
</div>
<div id="sex" style="float:left;width:10%;margin-left:50px"><b style="text-decoration: underline">Gender</b><br/><br/><br/>
<input type="radio" name="vehicle" value="Male"> Male<br>
<input type="radio" name="vehicle" value="Female"> &nbsp;Female
</div>
<div id="format" style="float:left;width:10%;margin-left:40px"><b style="text-decoration: underline">Format</b><br/><br/><br/>
<input type="radio" name="vehicle" value="normal" checked="checked"> Normal Search<br>
<input type="radio" name="vehicle" value="csv"> &nbsp;export as .csv
</div>
<br><br><br><br><br><br><br><br><br><br><br>
&nbsp;
<div style="margin-left:150px;" class="container">
	<div class="row">
        <div class="col-md-6">
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input id="disp"type="text" class="form-control input-lg" placeholder="Query" />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="button">
                       	<span class=" glyphicon glyphicon-search"></span>&nbsp;&nbsp;&nbsp;
                       	<input id="submit_id"type="submit" class="btn btn-info btn-lg" value="Search" />
                        </button>
                    </span>
                </div>
            </div>
        </div>
	</div>
</div>
</body>
</form>
<footer>
<p style="font-style:italic"><h4>Powered by: <u><a style="color:#000000"href="http://www.matchmytalent.com/">Match[my]Talent</a></u></h4></p>
</footer>