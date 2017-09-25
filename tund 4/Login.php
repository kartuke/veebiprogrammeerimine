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
<body id="body-color"> 
<div id="Sign-In"> 
<fieldset style="width:30%"><legend>Logi sisse</legend> 
<form method="POST" action="connectivity.php"> 
User <br><input type="text" name="user" size="40"><br> 
Password <br><input type="password" name="pass" size="40"><br> 
<input id="button" type="submit" name="submit" value="Log-In"> 
</form> 
</fieldset> 
</div>

<body>
  <?php
	echo $myName ." " .$myFamilyName ;
	?>
	 <body bgcolor="#0B3B39">
</body>
</html>