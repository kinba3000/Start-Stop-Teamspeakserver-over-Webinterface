<!DOCTYPE HTML>
<?php 
//config:
$password = "password"; //replace 'password' with your database user password
//config end
?>
<html>
<head>
	<title>Userinterface</title>
	<link rel="stylesheet" href="css/master.css">
 <?php
 SESSION_START();
if ($_SESSION['logedin'] == "1") {
		
						
		} else { 
		header ('Location: loginphp.php');
}
		session_regenerate_id(true);			

?> 

</head>


<body>
<div class="b-image">
<section class="navigation">
			<ul>
				<li><a href="index.php">Startpage</a></li>

				<li class="dropdown">
					<a href="changepw.php">Change password</a>
					<a href="logout.php">Logout</a>
				</li>

			</ul>
		</section>
		</div>
		<br>
		<form method="POST"> 
		<center><div class="systs">
		<br>
		<center><input name="tsstop" class="submit" value="Teamspeak stoppen" type="submit"></center> <br>
	
		<center><input class="submit" name="tsstart" type="submit" value="Teamspeak starten"></center>
		</div></center>
		</form>
		<br>
		
<?php
	//output ts
	if ($_POST['tsstop'] == true) {
		echo "<center><p>Teamspeak stoppend!</p></center>";
	
		
	};
	if ($_POST['tsstart'] == true) {
		echo "<center><p>Teamspeak startet!</p></center>";
	
		
	};
?>
 <?php
//ts
$servername = "localhost"; //if you have extern databade, write domain in here!
$username = "html"; //database username, in my example, it is html
$dbname = "html"; // define your dbname

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$tsstart1 = "UPDATE tsstart SET tsstart='1'";
$tsstop1 = "UPDATE tsstart SET tsstop='1'";
$tsstop0 = "UPDATE tsstart SET tsstop='0'";
$tsstart0 = "UPDATE tsstart SET tsstart='0'";


//tsstart
if ($_POST['tsstart'] == true) {
	if ($conn->query($tsstart1) === TRUE) {
		
	} else {
		echo "Error: " . $tsstart1 . "<br>" . $conn->error;
	};
	if ($conn->query($tsstop0) === TRUE) {
		
	} else {
		echo "Error: " . $tsstop0 . "<br>" . $conn->error;
	};
};
//tsstop
if ($_POST['tsstop'] == true) {
	if ($conn->query($tsstop1) === TRUE) {
		
	} else {
		echo "Error: " . $tsstop1 . "<br>" . $conn->error;
	};
	if ($conn->query($tsstart0) === TRUE) {
		
	} else {
		echo "Error: " . $tsstart0 . "<br>" . $conn->error;
	};
};
$conn->close();
?> 


			
</body>