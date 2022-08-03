<?php
$servername = "localhost";
$useername = "root";
$password = "Fcit@2022";
$dbname = "MedicalCloud";

$conn = mysqli_connect($servername, $useername, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


?>