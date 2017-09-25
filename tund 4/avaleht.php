<?php 
	//muutujad 
	$myName = "Kärt" ;
	$myFamilyName = "Nigols" ;
	
	$hourNow = date ("H");
		//echo $hourNow;
	$schoolDayStart = date("d.m.Y.") ." 8.15" ;
		//echo $schoolDayStart;
	$schoolBegin = strtotime ($schoolDayStart);
		//echo $schoolBegin;
	$timeNow = strtotime ("now");
		//echo ($timeNow - $schoolBegin);
	$minutesPassed = round(($timeNow - $schoolBegin)/60);
		//echo $minutesPassed;
		
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
	//Vanusega seotud muutujad
	$myAge = 0;
	$ageNote = "";
	$myBirthYear;
	$yearsOfMyLife = ""; 
	
	//var_dump ($_POST);
	//echo $_POST ["BirthYear"]; 
	//arvutame vanuse
	if (isset($_POST["BirthYear"]) and $_POST["BirthYear"]!= 0){
		$myBirthYear = $_POST["BirthYear"];
		$myAge = date ("Y") - $_POST["BirthYear"];
		//echo $myAge; 
		$ageNote= "<p> Te olete umbes " .$myAge ." aastat vana. </p>";
		$yearsOfMyLife = "<ol> \n";
		$yearNow = date ("Y");
		for ($i = $myBirthYear; $i <= $yearNow; $i ++){	
			$yearsOfMyLife .= "<li>" .$i  ."</li> \n" ;
		
		}
		$yearsOfMyLife .= "</ol> \n";
		//echo $yearsOfMyLife;
	}
	//Lihtne tsükkel
	/*for($i = 0; $i < 5; $i ++){
		echo "ha";
		
	}*/
	
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
<img src="https://media.giphy.com/media/CY91MScPevNfi/source.gif" alt="Till" style="width:350px;height:150px;">

	<?php  
		echo "<p>Batman is pretty great</p>" ;
		echo "<p> Täna on ";
		echo date ("d/m/Y") .", Käes on " .$partOfDay;
		echo ".</p>" ;
		echo "<p>Lehe avamise hetkel oli kell:" .date ("H:i:s") .".</p>" ;
	?>
	<h2> Räägime vanusest </h2>
	<p> sisesta oma sünniaasta, arvutame vanuse! </p>
	<form method="POST">
		<label> Teie sünniaasta: </label>
		<input name="BirthYear" id="BirthYear" type="number" min="1900" max="2017" value="<?php echo $myBirthYear; ?>" >
		<input id="submitBirthYear" type="submit" value="kinnita">
	</form>
	<?php
		if ($ageNote  != "") {
			echo $ageNote;
		}
		
		if ( $yearsOfMyLife !="") {
		echo "\n <h3>Olete elanud järgmistel aastatel </h3> \n" .$yearsOfMyLife;
		}
	?>
		<h2> Mõned lingid </h2>
	<p>Ma õpin <a href=https://www.tlu.ee/>Tallinna ülikoolis</a> </p>
	<p><a href="../Esimene.php"> See </a>on mu esimene lehekülg </p>
	<p><a href="../../../~mikkkert/veebiprogemine/esimene.php"> See </a>on mu sõbra esimene lehekülg </p>
	<p>Pildid ülikoolist <a href=Photo.php>Siin</a> </p>
	<p>Sisselogimine <a href=Login.php/>Siin</a> </p>
</body>
</html>