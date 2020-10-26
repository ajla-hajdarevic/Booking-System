<?php
function Connect(){
$host = "localhost";
$username = "root";
$password = "";
$dbname = "novabaza";

$conn = new mysqli($host, $username, $password, $dbname) or die($conn->connect_error);
return $conn;
}
?>
