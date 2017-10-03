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
?>

<!DOCTYPE html>
<html>
<font color=white>
<body> <body bgcolor="#0B3B39"> </body>
<head>
	<meta charset="utf-8">
	<title>
		 Kärt Nigols Veebiprogrameerimise asjad
	</title>
</head>
<body>
	
	<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="main.php">Pealeht</a></p>
	
	<table border="1" style="border-collapse: collapse;">
		<tr>
			<th>Eesnimi</th>
			<th>Perekonnanimi</th>
			<th>kasutajanimi</th>
		</tr>
		<tr>
			<td>Kärt</td>
			<td>Nigols</td>
			<td>kartu@tlu.ee</td>
		</tr>
		<tr>
			<td>Mari</td>
			<td>Karus</td>
			<td>kasrusmari@aed.ee</td>
		</tr>
	
	</table>
	
</body>
</html>
