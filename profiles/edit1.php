<?php
	session_start();
	include('../db.php');

	if ($_POST) {
		$id = $_POST['id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$bday = $_POST['bday'];
		$mobp = $_POST['mobp'];
		$Email = $_POST['email'];

		$query = mysqli_query($conn, "update accounts set fname = '{$fname}', lname = '{$lname}', username = '{$username}', bday = '{$bday}', mobp = {$mobp}, email = '{$email}' where id = {$id}");

		$_SESSION['msg'] = 'Success';
		header('Location: employee.php');
		exit();
	}

	$id = $_GET['id'];

	$query = mysqli_query($conn, "select * from accounts where id = {$id}");

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
	<label for="fname">First Name</label><br>
	<input type="text" required name="fname" id="fname" value="<?php echo $row['fname'] ?>"><br><br>
	<label for="lname">Last Name</label><br>
	<input type="text" required name="lname" id="lname" value="<?php echo $row['lname'] ?>"><br><br>
	
	<label for="username">Username</label><br>
	<input type="text" required name="username" id="username" value="<?php echo $row['username'] ?>"><br><br>
	<label for="bday">Date of Birth</label><br>
	<input type="Date" required name="bday" id="bday" value="<?php echo $row['bday'] ?>"><br><br>
	<label for="mobp">Phone</label><br>
	<input type="number" required name="mobp" id="mobp" value="<?php echo $row['mobp'] ?>"><br><br>
	<label for="Email">Email</label><br>
	<input type="Email" required name="email" id="email" value="<?php echo $row['email'] ?>"><br><br>


	<button type="submit">Submit</button>
</form>
</body>
</html>