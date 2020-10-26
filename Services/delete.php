<?php 
	session_start();
	include('../db.php');

	$id = $_GET['id'];
	
	mysqli_query($conn, "delete from services where id = {$id}");

	$_SESSION['msg'] = 'Success';
	header('Location: editableservice.php');
	exit();
?>