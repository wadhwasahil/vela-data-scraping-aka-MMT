<?php
	$ch = curl_init();
	$query = "dancers in delhi";
	$query = str_replace( " ", "+", $query);
	$url = "https://www.googleapis.com/customsearch/v1?cx=010131248096801750602%3A0_r6wt_1kxy&cr=india&q=allinlinks%3A+".$query."&sort=date&client=google-csbe&key=AIzaSyCDuAdM4YDWTAqdvrqZX65mufRaBayKAq4";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);

	// got the result in json form
	$result = curl_exec($ch);
	
	// converting the result in a php array
	$s_results=json_decode($result);
	
	var_dump($s_results);
?>