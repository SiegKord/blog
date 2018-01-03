<?php

	$date = "2017-11-16 13:25:34";
	$keywords = preg_split("/[\s-:]+/", $date);
	$year = $keywords[0];
	$month = $keywords[1];
	$day = $keywords[2];
	$hour = $keywords[3];
	$min = $keywords[4];
	$sec = $keywords[5];
	
	echo $day;
?>