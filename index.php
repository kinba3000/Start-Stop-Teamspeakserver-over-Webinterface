<?php
//config:
$password = "password"; //replace 'password' with your database user password
//config end
?> 
<html>
<head>

	<link rel="stylesheet" href="css/master.css">
	<title>Home</title>
</head>
<body>
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
		
<?php 
$servername = "localhost";
$username = "html";
$dbname = "html";



// Create connection
$conn = new mysqli($servername, $username, $password,  $dbname);
// Check connection
$sql = "SELECT id FROM Teamspeak";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    
} else {

?>
		<section class="text">
		<br>
		<br>
		<br>
		<p color: black;> This text shows up if you didn't set up a database or your database is not reachable! If your installing this script, edit the 'setup_db.php'. After editing the 'setup_db.php', please press here: 
		</p> 
		<p><a class="setup" href="setup_db.php">Set up database </a></p>
		<br>
		<p> If you have any questions, contact me under: kinba3000@gmail.com</p>
		<br>
		</section>
<?php
};
$conn->close();
 ?>
		
</body>