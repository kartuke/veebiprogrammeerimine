<?php
	$database = "if17_nigokart_2";
	require("../../../config.php"); 
	
	require("../../../config.php");
	
	//alustamse sessiooni
	session_start();
	
	function signIn($email, $password){
		$notice = "";
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		
		$stmt = $mysqli->prepare("SELECT id, email, password FROM vp2users WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->bind_result($id, $emailFromDb, $passwordFromDb);
		$stmt->execute();
		
		//kui vähemalt üks tulemus
		if ($stmt->fetch()){
			$hash = hash("sha512", $password);
			if($hash == $passwordFromDb){
				$notice = "Sisselogitud!";
				
				//määran sessioonimuutujaid
				$_SESSION["userId"] = $id;
				$_SESSION["userEmail"] = $emailFromDb;
				
				//lähen pealehele
				header("Location: main.php");
				exit();
				
			} else {
				$notice = "Vale salasõna!";
			}
		} else {
			$notice = "Sellise e-postiga kasutajat pole!";
		}
		
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
	
	function signUp($signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword){
		//loome andmebaasiühenduse
		
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette käsu andmebaasiserverile
		$stmt = $mysqli->prepare("INSERT INTO vp2users (first_name, last_name, birth_date, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string
		//i - integer
		//d - decimal
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
	}
	
	
	//hea mõtte salvestamise funktsioon
	
	function saveIdea($idea,$color)
	{
	    $notice="";
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt =  $mysqli->prepare("INSERT INTO vp2userideas (userid, idea, ideacolor) VALUES(?,?,?)");
		echo $mysqli->error;
		$stmt-> bind_param("iss",$_SESSION["userId"],$idea,$color);
		if($stmt->execute())
		{
		$notice = "Idea has been saved";	
		}else{
			$notice = "something went wrong!" .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
	
	
	//ideede vaatamise funktsioon
	function readAllIdeas()
	{
		$ideas ="";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);	
		//$stmt = $mysqli->prepare("SELECT idea, ideacolor FROM vp2userideas ");
		//absull kõigi mõtted
		$stmt = $mysqli->prepare("SELECT id, idea, ideacolor FROM vp2userideas WHERE userid = ? AND deleted IS NULL ORDER BY created DESC");
		$stmt->bind_param("i", $_SESSION["userId"]);
		$stmt->bind_result($id, $idea, $color);
		$stmt->execute();
		while ($stmt->fetch())
		{
			$ideas .= '<p style="background-color: ' .$color .'">'.$idea .'| <a href="edituseridea.php?id='. $id .'">Edit</a> <p/> ';
	                                                        //lisame lingi
			
			
			
		}
	$stmt->close();
	$mysqli->close();
return $ideas;	
	}
	
	function readLastIdea()
	{
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);		
		
	$stmt = $mysqli->prepare("SELECT idea FROM vp2userideas WHERE created =(SELECT MAX(created)FROM vp2userideas WHERE deleted IS NULL)");
	$stmt->execute();
	$stmt->bind_result($idea);
	$stmt->fetch();
	
	$stmt->close();
	$mysqli->close();
	return $idea;		
	}
	//sisestuse kontrollimise funktsioon
	function test_input($data){
		$data = trim($data);//liigsed tühikud, TAB, reavahetuse jms
		$data = stripslashes($data);//eemaldab kaldkriipsud "\"
		$data = htmlspecialchars($data);
		return $data;
	}
	/*
	$x = 7;
	$y = 4;
	echo "Esimene summa on: " .($x + $y) ."\n";
	addValues();
	
	function addValues(){
	echo "Teine summa on: " .($GLOBALS["x"] + $GLOBALS["y"]) ."\n";
		$a = 3;
		$b = 2;
		echo "Kolmas summa on: " .($a + $b) ."\n";
		$x = 1;
		$y = 2;
		echo "Hoopis teine summa on: " .($x + $y) ."\n";
	}
	echo "Neljas summa on: " .($a + $b) ."\n";
	*/
	//Kasutajate nimekirja funktsioon
	function readAllUsers ()
	{
	$tabel = "";
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);		
		
	$stmt = $mysqli->prepare("SELECT first_name, last_name, email, gender, birth_date FROM vp2users");
	
	$stmt->bind_result($first_name,$last_name,$email,$gender ,$birth_date);
	$stmt->execute();
		/*$tabel = '<table width= "300" border="1" style="border-collapse: collapse;">
		
			<tr>
				<th width="100"> first_name </td>
				<th width="100"> last_name</td>
				<th width="100"> email </td>
		</tr>'; */
		while ($stmt->fetch())
			{
				if ($gender != 2) {
		$gender= "mees";
	} else {
		$gender="naine";
	}	
		
			$tabel .='<table width= "1000" border="1" style="border-collapse: collapse;"><tr>
				<td width="200">'.$first_name .'</td>
				<td width="200">'.$last_name.'</td>
				<td width="200">'.$email .'</td>
				<td width="200">'.$gender .'</td>
				<td width="200">'.$birth_date .'</td>
				</tr>
			</table>';
			
			
			//$first_name .= '<p style=color:blue>'.$first_name ;
			//$last_name .= '<p style=color:blue>'.$last_name ;
			//$email .= '<p style=color:blue>'.$email;
			//$tabel .= '<p style=color:blue>'.$first_name ."   " .$last_name ."   " .$email ."<p/> \n";
		    //$tabel .= '<p >'.$first_name ."<p/> \n";
			//$tabel2 .= '<p >'.$last_name ."<p/> \n";
			}
				
		$stmt->close();
		$mysqli->close();
		return $tabel ;
	}
?>