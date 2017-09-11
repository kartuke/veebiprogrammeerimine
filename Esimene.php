<?php 
	//muutujad 
	$myName = "Kärt" ;
	$myFamilyName = "Nigols" ;
	
	$hourNow = date ("H");
	//echo $hourNow;
	// Võrdlen kellaaega ja annan hinnangu, mis päeva osaga on tegemist 
	$partOfDay = "";
	if ( $hourNow < 8){
		$partOfDay = "varajane hommik";
	}
	//Echo $partOfDay	
	if ( $hourNow >= 8 and $hourNow < 16) {
		$partOfDay = "koolipäev" ;
	}
	if ( $hourNow >= 16 ) {
		$partOfDay = "vaba aeg";
	}
?>
<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <font color=white>
<title>
  Kärt Nigols Veebiprogrameerimise asjad
</title>

 <link rel="icon" href="https://m.popkey.co/987552/NGLb3.gif" type="GIF">

</head>
<body>
  <h1>
  <?php
	echo $myName ." " .$myFamilyName ;
	?>
	</h1>

  <big><p><i><b>See veebileht on loodud Õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p></i></b></big>
  <body bgcolor="#0B3B39">

<img src="https://m.popkey.co/987552/NGLb3.gif" alt="Banana" style="width:450px;height:450px;">

<img src="https://m.popkey.co/08e691/pJedy.gif" alt="Stan" style="width:450px;height:450px;">

<img src="https://media.giphy.com/media/CY91MScPevNfi/source.gif" alt="Till" style="width:350px;height:150px;">

	<?php  
		echo "<p>Batman is pretty great</p>" ;
		echo "<p> Täna on ";
		echo date ("d/m/Y") .", Käes on " .$partOfDay;
		echo ".</p>" ;
		echo "<p>Lehe avamise hetkel oli kell:" .date ("H:i:s") .".</p>" ;
	?>
</body>
</html>