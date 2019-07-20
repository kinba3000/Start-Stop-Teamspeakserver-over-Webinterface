<!DOCTYPE HTML>
<html>
<head>
	<title>Setup Database</title>
</head>

<?php 
//only execute once at installing the system!
//configs under this line:
$password = "password"; //replace 'password' with a secure password from your database. Please dont use your standart password. Use somtling like this: 'It3de8nq13' 
$loginpassword = "password"; //repalce 'password' with a secure login password. This password is used to login later into the webinterface! Here you could use your normal password. 
//config end

$servername = "localhost";
$username = "html";
$dbname = "html";


// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE htmltest";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// sql to create table
$table1 = "CREATE TABLE Teamspeak (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
pw VARCHAR(100) NOT NULL,
reg_date TIMESTAMP
)";

$table2 = "CREATE TABLE tsstart (
tsstart VARCHAR(1) NOT NULL,
tsstop VARCHAR(1) NOT NULL,
reg_date TIMESTAMP
)";
$tables = [$table1, $table2];

foreach($tables as $k => $sql){
    $query = @$conn->query($sql);

    if(!$query)
       $errors[] = "Table $k : Creation failed ($conn->error)";
    else
       $errors[] = "Table $k : Creation done";
};


$pwhashneu = password_hash($loginpassword, PASSWORD_DEFAULT);
$sql1 = "INSERT INTO Teamspeak (id, pw) VALUES ('1', '$pwhashneu')";

$sql2 = "INSERT INTO tsstart (tsstart, tsstop) VALUES ('1', '0')";
$data = [$sql1, $sql2];
foreach($data as $k => $sql){
    $query = @$conn->query($sql);

    if(!$query)
       $errors[] = "Table $k : Creation failed ($conn->error)";
    else
       $errors[] = "Table $k : Creation done";
};


$conn->close();



?>

<a class="setup" href="index.php"> Get back to start Page! </a>