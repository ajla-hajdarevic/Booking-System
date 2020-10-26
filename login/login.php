<?php
session_start();
if ($_POST) {
	include ('db.php');

	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	$hashed=hash('sha256', $password);

	$query = mysqli_query($conn, "select * from accounts where username = '{$username}' and password = '{$hashed}'");

	$row = mysqli_fetch_assoc($query);

	if ($row) {
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['fname'] = $row['fname'];
		$_SESSION['role'] = $row['role'];
		$_SESSION['username'] = $row['username'];


		header('Location: ../HomePage/HomePage.php');
		exit();
	} else {
		$_SESSION['msg'] = 'Incorrect username and/or password';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
<body>
	<?php 
	if (isset($_SESSION['msg'])) {	
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
	}
	 ?>

	<div class="container"> 
	<section id="content">
		<form method="POST" action="login.php">
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" id="username" name="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" name="password" id="password" />
			</div>
			<div>
				<input type="submit" value="Log in" />
				<a href="http://localhost/Salon/azemina/registration.php">Register</a>
			</div>
		</form><!-- form -->
		
	</section><!-- content -->
</div><!-- container -->
</body>
</html>