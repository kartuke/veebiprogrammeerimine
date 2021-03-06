<?php
	require("functions.php");
	$notice = "";
	$allIdeas = "";
	
	//kui pole sisseloginud, siis sisselogimise lehele
	if(!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}
	
	//kui logib välja
	if (isset($_GET["logout"])){
		//lõpetame sessiooni
		session_destroy();
		header("Location: login.php");
	}
	
	//foto laadimine
	$target_dir = "../../pics/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	//Kas on pildi failitüüp
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			$notice .= "Fail on pilt - " . $check["mime"] . ". ";
			$uploadOk = 1;
		} else {
			$notice .= "See pole pildifail. ";
			$uploadOk = 0;
		}
	}
	
	//Kas selline pilt on juba üles laetud
	if (file_exists($target_file)) {
		$notice .= "Selle nimega pilt juba olemas. ";
		$uploadOk = 0;
	}
	//Piirame faili suuruse
	if ($_FILES["fileToUpload"]["size"] > 1000000) {
		$notice .= "Pilt on liiga suur! ";
		$uploadOk = 0;
	}
	
	//Failitüübid
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		$notice .= "Vabandust, ainult JPG, JPEG, PNG ja GIF failid on lubatud! ";
		$uploadOk = 0;
	}
	
	//Kas saab laadida?
	if ($uploadOk == 0) {
		$notice .= "Vabandust, pilti ei laetud üles! ";
	//Kui saab üles laadida
	} else {		
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$notice .= "Fail ". basename( $_FILES["fileToUpload"]["name"]). " laeti üles! ";
		} else {
			$notice .= "Vabandust, üleslaadimisel tekkis tõrge! ";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Veebiprogrammeerimise asjad
	</title>
	<link rel="icon" href="https://m.popkey.co/987552/NGLb3.gif" type="GIF">
</head>
<body bgcolor="#0B3B39">
	<h1>Kärt Nigols</h1>
	<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi välja</a>!</p>
	<p><a href="main.php">Pealeht</a></p>
	<hr>
	<h2>Foto üleslaadimine</h2>
	<form action="photoupload.php" method="post" enctype="multipart/form-data">
		<label>Valige pildifail:</label>
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Lae üles" name="submit">
	</form>
	
	<span><?php echo $notice; ?></span>
	<hr>
</body>
</html>