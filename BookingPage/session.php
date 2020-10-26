<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
//$connection = mysql_connect("localhost", "root", "");
// Selecting Database
//$db = mysql_select_db("bookingsystem_db", $connection);

/*session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysql_query("select id, username from accounts where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
$login_session2 = $row['id'];
if(!isset($login_session)){
mysql_close($connection); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}*/

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
