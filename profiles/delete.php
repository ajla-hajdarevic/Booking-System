<?php 
	session_start();
	include('../db.php');
	$id = $_GET['id'];

	$uid = $_SESSION['user_id'];
	$q="DELETE FROM appointments
		WHERE id = '{$id}'";
	
	
	mysqli_query($conn, $q);

	$_SESSION['msg'] = 'Success';
	header('Location: client.php');
	exit();
?>

