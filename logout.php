<?php

SESSION_START();
$_SESSION['logedin'] = "0";
header ('Location: index.php');

session_regenerate_id(true);

?>
