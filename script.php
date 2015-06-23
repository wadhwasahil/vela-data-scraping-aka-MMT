<?php
	$ch = curl_init();
	$query = "dancers";
	$query = str_replace( " ", "+", $query);
	$url = "https://www.googleapis.com/customsearch/v1?cx=010131248096801750602%3A0_r6wt_1kxy&cr=india&q==related%3A".$query."&sort=date&key=AIzaSyCDuAdM4YDWTAqdvrqZX65mufRaBayKAq4";
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);

	$result = curl_exec($ch);
	echo $result;
?>