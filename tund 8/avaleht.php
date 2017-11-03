<?php
	require("functions.php");
	//kui pole sisse logitud, liigume login lehele
	if(!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}
	
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy(); //lõpetab sessiooni
		header("Location: login.php");
	}
	$picsDir = "../../pics/";
	$picFiles = [];
	$picFileTypes = ["jpg", "jpeg", "png", "gif"];
	
	$allFiles = array_slice(scandir($picsDir), 2);
	
	foreach ($allFiles as $file){
		$fileType = pathinfo($file, PATHINFO_EXTENSION);
		if (in_array($fileType, $picFileTypes) == true){
			array_push($picFiles, $file);
		}
	}
	
	//var_dump($picFiles);
	$fileCount = count($picFiles);
	$picNumber = mt_rand(0, ($fileCount - 1));
	$picFile = $picFiles[$picNumber];
?>



<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <font color=white>
<title>
	<?php echo $_SESSION["firstname"] ." " .$_SESSION["lastname"]; ?>
		 veebiprogemise asjad
	</title>

 <link rel="icon" href="https://m.popkey.co/987552/NGLb3.gif" type="GIF">

</head>
<body>
  <h1><?php echo $_SESSION["firstname"] ." " .$_SESSION["lastname"]; ?></h1>

  <big><p><i><b>See veebileht on loodud Õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p></i></b></big>
  <body bgcolor="#0B3B39">

<img src="https://m.popkey.co/987552/NGLb3.gif" alt="Banana" style="width:450px;height:450px;">
<img src="https://media.giphy.com/media/CY91MScPevNfi/source.gif" alt="Till" style="width:350px;height:150px;">

	<h2> Räägime vanusest </h2>
	<p> sisesta oma sünniaasta, arvutame vanuse! </p>
	<form method="POST">
		<label> Teie sünniaasta: </label>
		<input name="BirthYear" id="BirthYear" type="number" min="1900" max="2017" value="<?php echo $myBirthYear; ?>" >
		<input id="submitBirthYear" type="submit" value="kinnita">
	</form>
	
		<h2> Mõned lingid </h2>
	<p>Ma õpin <a href=https://www.tlu.ee/>Tallinna ülikoolis</a> </p>
	<p><a href="../Esimene.php"> See </a>on mu esimene lehekülg </p>
	<p><a href="../../../~mikkkert/veebiprogemine/esimene.php"> See </a>on mu sõbra esimene lehekülg </p>
	<p>Pildid ülikoolist <a href=Photo.php>Siin</a> </p>
	<p>Sisselogimine <a href=Login.php/>Siin</a> </p>
	<p><a href="?logout=1">Log out</a></p> 
 
	<p><a href="usersInfo.php">Info about users</a></p> 
	<p><a href="userideas.php">Users good ideas</a></p> 
 
</body>
</html>