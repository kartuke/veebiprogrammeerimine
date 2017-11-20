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
	
	require("usersinfotable.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>
	 veebiprogemise asjad
	</title>
	<link rel="icon" href="https://m.popkey.co/987552/NGLb3.gif" type="GIF">
</head>
<body bgcolor="#0B3B39">
	
	<p>See veebileht on loodud õppetöö raames ning ei sisalda tõsiseltvõetavat sisu.</p>
	<p><a href="?logout=1">Logi välja</a></p>
	<p><a href="main.php">Pealeht</a></p>
	
	 <table width="1000" border='1' style='border: 3px solid black; border-collapse: collapse;>
		<!-- <table style='width:30%';text-align:justify;> -->
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