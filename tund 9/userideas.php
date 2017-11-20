<?php
	require("functions.php");
	
	$notice = "";
	$ideas = "";
	
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
	
	//kas vajutati mõtte salvestamise nuppu
	if(isset($_POST["ideaBtn"])){
		
		if(isset($_POST["userIdea"]) and isset($_POST["ideaColor"]) and !empty($_POST["userIdea"]) and !empty($_POST["ideaColor"])){
			//echo $_POST["ideaColor"];
			$notice = saveIdea(test_input($_POST["userIdea"]), $_POST["ideaColor"]);
		}
	}
	
	$ideas = readAllIdeas();
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
		Veebiprogemise asjad
	</title>
	<link rel="icon" href="https://m.popkey.co/987552/NGLb3.gif" type="GIF">
</head>
<body bgcolor="#0B3B39">
	
	<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="main.php">Pealeht</a></p>
	<h2>Head mõtted</h2>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label>Hea mõte: </label>
		<input name="userIdea" type="text">
		<br>
		<label>Mõttega seostuv värv: </label>
		<input name="ideaColor" type="color">
		<br>
		<input name="ideaBtn" type="submit" value="Salvesta mõte!"><span><?php echo $notice; ?></span>
	</form>
	<hr>
	<h2>Palju toredaid mõtteid</h2>
	<div style="width: 40%">
		<?php echo $ideas; ?>
	</div>
	
</body>
</html>