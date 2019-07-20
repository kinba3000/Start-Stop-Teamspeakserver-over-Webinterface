<?php 
//config:
$password = "password"; //replace 'password' with your database user password
//config end
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Login Adminpanel</title>
	<link rel="stylesheet" href="css/master.css">
 <?php
$servername = "localhost"; //if you have extern databade, write domain in here!
$username = "htmltest"; //database username, in my example, it is html
$dbname = "htmltest"; // define your dbname
SESSION_START();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$pw = $_POST['pw2'];
$hash = "SELECT pw FROM Teamspeak";
$pwhash = $conn->query($hash);
$pwhash2 = $pwhash->fetch_assoc();
$pwwrong = "0";
if ($_SESSION['logedin'] == "1") {

						header ('Location: sysadmin.php');
		} else { 
				if (password_verify($_POST['pw2'], $pwhash2["pw"])) {
						$_SESSION['logedin'] = "1";
						header ('Location: sysadmin.php');
						
					} else {	
								if (isset($pw)) {
								$pwwrong = "1";};
					};
};
// Ip Loger
/*
			$ip = $_SERVER['REMOTE_ADDR'];
			$file = "Logs/ips_loginphp.log";
			$host = $REMOTE_HOST;
			$date = date("d/m/Y");
			$time = date("h.i.sa");
			$text = file_get_contents($file);
			if ($pwwrong == "0" ) {
			 if ($_SESSION['logedin'] == "1") {$login = "Eingeloggt.";} else {$login = "Nicht Eingeloggt.";};
			} else {$login = "PW falsch.";};
			$text .= $ip. "\t". $time."\t". $date."\t". $host. $login. "\r\n" ;
			file_put_contents($file, $text);

*/


$conn->close();
session_regenerate_id(true);
?> 

</head>


<body onload="setFieldFocus()">
<div class="b-image">
<section class="navigation">
			<ul>
				<li><a href="index.php">Startpage</a></li>
				<li class="dropdown">
			<!--		<a href="javascript:void(0)" class="dropbtn">Ts³</a>
					<div class="dropdown-content">
						
						</div> -->

						<a href="loginphp.php" class="loginbutton">Teamspeak control</a>

				</li>
				
			</ul>
		</section>
		</div>
		<script type="text/javascript">
				function setFieldFocus()
				{
				var id = "login";
				window.document.getElementById(id).focus();
				}
		</script>
		<p> Please enter password: </p>
			<form action="loginphp.php" method="post">
				<center> <div class="log_sub">
				<center><input id="login" class="login" type="password" placeholder="***********" name="pw2"></center> <br>
				<center><input class="submit" type="submit" value="Login" text="Submit"></center>
				</div>
				</center>
			</form>
			
			<?php
			
			if ($pwwrong == 1) {
				echo "<center> <p>Wrong password!</p> </center>";
			};
			if ($_SESSION['newpwset'] == "1") {
				$_SESSION['newpwset'] = "0";
				echo "<center> <p>New password was set!</p> </center>";
			};
			
			
			?>
		
		
			
			
</body>