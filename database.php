<?php
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "phpforum";

$conn = new mysqli($servername, $username, $password, $dbname);

if(mysqli_connect_error()){
	die ("There was an error connecting to the database");
}

mysqli_set_charset($conn, 'utf8');

?>