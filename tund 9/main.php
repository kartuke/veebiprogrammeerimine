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
<body bgcolor="#0B3B39">
<img src="https://m.popkey.co/987552/NGLb3.gif" alt="Banana" style="width:450px;height:450px;">
<img src="https://media.giphy.com/media/CY91MScPevNfi/source.gif" alt="Till" style="width:350px;height:150px;">
	<h1><?php echo $_SESSION["firstname"] ." " .$_SESSION["lastname"]; ?></h1>
	<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="usersInfo.php">Info kasutajate kohta</a></p>
	<p><a href="userideas.php">Head mõtted</a></p>
	<p><a href="photoupload.php">Pildi üles laadimine</a></p>
	<h2>Pilt ülikoolist</h2>
	<img src="<?php echo $picsDir .$picFile; ?>" alt="Tallinna ülikool">
	
</body>
</html>