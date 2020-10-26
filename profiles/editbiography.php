<?php
	session_start();
	include('../db.php');

	if ($_POST) {
		$id=$_POST['id'];
		$biography = $_POST['biography'];
		

$uid = $_SESSION['user_id'];
$q = "UPDATE employees
 SET biography='{$biography}'
 WHERE employees.username=accounts.username;";
$query = mysqli_query($conn, $q);

		$_SESSION['msg'] = 'Success';
		header('Location: client.php');
		exit();
	}

	$id = $_GET['id'];

	$query = mysqli_query($conn, "SELECT e.biography
 FROM employees e, accounts c
 WHERE e.username=c.username;");

	$row = mysqli_fetch_assoc($query);


?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
</head>
<body>
<form action="editbiography.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
	<label for="biography">Biography</label><br>
	<textarea name="biography" id="biography" cols="60" rows="20"></textarea><br><br>

	<button type="submit">Submit</button>
</form>
</body>
</html>