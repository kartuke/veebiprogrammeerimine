	<?php
	//muutujad
	$myName = "Kärt" ;
	$myFamilyName = "Nigols" ;
	
	$hourNow = date("H");
	$partOfDay = "";
	
	
	if ($hourNow < 8 and $hourNow > 4 ){
	$partOfDay = "early morning";
	
	}
	if ($hourNow >= 8 and $hourNow < 16 ){
	$partOfDay = "school time";
	}
	
	if ($hourNow >= 16 and $hourNow <23 ){
	$partOfDay = "evening";
	}
	if ($hourNow >= 23 and $hourNow < 4 ){
	$partOfDay = "night";
	}
	
	//echo $timeNow - $schoolbegin;
	//echo $partOfDay
	
	
	$monthNamesEt = ["jaanuar","veebruar","märts","aprill","mai","juuni","juuli","august","september","oktoober","november","detsember"];
	//var_dump ($monthNamesEt);
	//echo $monthNamesEt[3];
	
	$monthNow = $monthNamesEt[date("n") - 1];
	?>
	<!DOCTYPE html>
	<html>
	<head>
	<meta charset="utf-8">
	<font color=white>
<title>
  Login
</title>
</head>
<body>
 <h1>
  <?php
	echo $myName ." " .$myFamilyName ;
	?>
	</h1>
	 <body bgcolor="#0B3B39">
</body>
</html>