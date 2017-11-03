<?php
function createUsersTable (){
	$tabel="";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT firstname,lastname,email,birthday,gender FROM vpusers");
	$stmt->bind_result($name, $lastname,$email,$birthday,$gender);	
	$stmt->execute();
	while($stmt->fetch()){
		if ($gender != 2) {
		$gender= "mees";
	} else {
		$gender="naine";
	}
	echo "<table width='1000' border='2' style='border: 3px solid black; border-collapse: collapse';>";	
	//echo "<table style='width:30%';text-align:justify;>";
			echo"<tr>";
			 echo "<td width='200'>".$name. "</td>"; 
             echo "<td width='200'>" .$lastname. "</td>"; 
             echo "<td width='200'>" .$email."</td>";
			 echo "<td width='200'>" .$birthday."</td>"; 
			 echo "<td width='200'>" .$gender."</td>";
	echo"</tr>";
	echo"</table>";
	}
	$stmt->close();
	$mysqli->close();
	}
?>