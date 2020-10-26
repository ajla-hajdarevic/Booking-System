<?php
	session_start();
	include('../db.php');

	if ($_POST) {
		$id = $_POST['id'];
		$category = $_POST['category'];
		$service_name = $_POST['service_name'];
		$price = $_POST['price'];
		$duration = $_POST['duration'];

		$query = mysqli_query($conn, "update services set category = {$category}, service_name = '{$service_name}', price = {$price}, duration = {$duration} where id = {$id}");

		$_SESSION['msg'] = 'Success';
		header('Location: editableservice.php');
		exit();
	}

	$id = $_GET['id'];

	$query = mysqli_query($conn, "select * from services where id = {$id}");

	$row = mysqli_fetch_assoc($query);


?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
</head>
<body>
<form action="edit.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	<label for="category">Category</label><br>
	<input type="number" required name="category" id="category" value="<?php echo $row['category'] ?>"><br><br>
	<label for="service_name">Name of Service</label><br>
	<input type="text" required name="service_name" id="service_name" value="<?php echo $row['service_name'] ?>"><br><br>
	
	<label for="price">Price</label><br>
	<input type="number" required name="price" id="price" value="<?php echo $row['price'] ?>"><br><br>
	<label for="duration">Duration</label><br>
	<input type="number" required name="duration" id="duration" value="<?php echo $row['duration'] ?>"><br><br>


	<button type="submit">Submit</button>
</form>
</body>
</html>