<?php
session_start();
if ($_POST) {
	include('../db.php');

	$id = $_POST['id'];
	$category = $_POST['category'];
	$service_name = $_POST['service_name'];
	$price = $_POST['price'];
	$duration = $_POST['duration'];



	$query = mysqli_query($conn, "insert into services (category, service_name, price, duration) values ({$category}, '{$service_name}', {$price}, {$duration})");

	if ($query) {
		//echo 'Success'; ?>
		<!-- <br><a href="index.php">Return to index.php</a> -->
		<?php
		$_SESSION['msg'] = 'Success';
		header('Location: editableservice.php');
		exit();
	} else {
		echo 'Fail'; ?>
		<br><a href="add.php">Try again</a>
		<?php
	}
	die();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Services</title>
</head>
<body>
<form action="add.php" method="POST">
	<label for="category">Category(0=Cutting, 1=Coloring, 2=Foundation)</label><br>
	<input type="number" required name="category" id="category"><br><br>
	<label for="service_name">Name of Service</label><br>
	<input type="text" required name="service_name" id="service_name"><br><br>
	
	<label for="price">Price</label><br>
	<input type="number" required name="price" id="price"><br><br>
	<label for="duration">Duration</label><br>
	<input type="number" required name="duration" id="duration"><br><br>


	<button type="submit">Submit</button>
</form>
</body>
</html>