<!DOCTYPE HTML>
<html>
<head>
	<title>Change password</title>
	<link rel="stylesheet" href="css/master.css">
 <?php
//config:
$password = "password"; //replace 'password' with your database user password
//config end

$servername = "localhost"; //if you have extern databade, write domain in here!
$username = "html"; //database username, in my example, it is html
$dbname = "html"; // define your dbname
SESSION_START();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//passwordw old
$pwalt = $_POST['pwalt'];
$hash = "SELECT pw FROM Teamspeak";
$pwhash = $conn->query($hash);
$pwhash2 = $pwhash->fetch_assoc();
//pw neu
$pw = $_POST['pwneu'];
$pwhashneu = password_hash($pw, PASSWORD_DEFAULT);
$sql = "UPDATE Teamspeak SET pw='$pwhashneu' WHERE id=1";
	//überprüfe ob user eingeloggt ist:
			if ($_SESSION['logedin'] == "1") {

									
					} else { 
					header ('Location: loginphp.php');
			};
			//überprüft ob er das erste mal uf er seite ist:
if (isset($pwalt)) {
					//überprüfen ob altens PW stimmt:
	if (password_verify($_POST['pwalt'], $pwhash2["pw"])) {
		//überprüft ob das neue pw mit dem neuenpw wiederholung übereinstimmt:
		$pwneuwid = $_POST['pwneuwid'];
		if ($pw == $pwneuwid) {
			//überprüft ob ein neues Pw eingegeben wurde:
			if (isset($pw)) {

					//sql write und witerleitung zu loginphp
					if ($conn->query($sql) === TRUE) { 
									header ('Location: loginphp.php');
									$_SESSION['logedin'] = "0";
									$_SESSION['newpwset'] = "1";
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					};
				};
			} else {
				$newpwnotmatch = "1";
			};

			
	} else {
		$oldpwwrong = "1";
	};
};
$conn->close();
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
		<p> Please enter new password</p>
		<form action="changepw.php" method="post">
			<center><div class="change_pw">
			<center><i>Old password: </i></center>
			<center><input class="login" type="password" name="pwalt" placeholder="**********"> </center><br>
			<center><i> New password:</i></center>
			<center><input class="login" type="password" name="pwneu" placeholder="**********"></center> <br>
			<center><i> New password again:</i></center>
			<center><input class="login" type="password" name="pwneuwid" placeholder="**********"></center> <br>
			<center><input class="submit" type="submit" text="Abschicken"></center>
			</div> </center>
		</form>
		<?php
		
		if ($newpwnotmatch == "1") {
			echo "<center><p>New passwords are not matching!</p> </center>";
		};
		
		if ($oldpwwrong == "1") {
			echo "<center><p>Old password is not correctly!</p> </center>";
		};
		
		
		?>
		
		<i ></i>
			
			
</body>