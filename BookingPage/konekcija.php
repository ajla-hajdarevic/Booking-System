<?php
function Connect(){
$dbhost_name = "localhost"; // Your host name
$database = "baza";       // Your database name
$username = "root";            // Your login userid
$password = "";            // Your password

$dbo = new mysqli($dbhost_name, $username, $password, $database);
// or die($conn->connect_error);

if ($dbo->connect_error) {
  die("Connection failed: " . $dbo->connect_error);
}

return $dbo;
}
?>
