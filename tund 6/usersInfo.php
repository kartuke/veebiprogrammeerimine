<?php
	require("functions.php");
	
	//kui pole sisse logitud, liigume login lehele
	if(!isset($_SESSION["userId"])){
		header("Location: Login.php");
		exit();
	}
	
	//väljalogimine
	if(isset($_GET["logout"])){
		session_destroy(); //lõpetab sessiooni
		header("Location: Login.php");
	}
	require("usersinfotable.php");
	
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
	<p><a href="avaleht.php">Pealeht</a></p>
	
	 <table width="1000" border='1' style='border: 3px solid black; border-collapse: collapse;>
	 <!--<table style='width:30%';text-align:justify;>-->
		<tr>
			<th width="200">Eesnimi</th>
			<th width="200">perekonnanimi</th>
			<th width="200">e-posti aadress</th>
			<th width="200">Sünnipäev</th>
			<th width="200">Sugu</th>
		</tr>
<?php echo createUsersTable(); ?>
  </table>
</body>
</html>