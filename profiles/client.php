<?php 

session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
		$_SESSION['msg'] = 'You need to login first';
		header('Location: ../login/login.php');
		exit();
	}
include('../db.php');
if((isset($_SESSION['role']) && $_SESSION['role'] == 1)){
    header("location: ../profiles/admin.php");
}
if((isset($_SESSION['role']) && $_SESSION['role'] == 2)){
    header("location: ../profiles/employee.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="admin.css">

	<title>My Profile</title>
</head>
<body>
	<a href="../login/logout.php">
	<h3 id="logout">LOGOUT</h3>
</a>
	<?php 
	if (isset($_SESSION['msg'])) {	
		echo $_SESSION['msg']; 
		unset($_SESSION['msg']);
	}
	 ?>
<h1>My Profile</h2><br><br>
<?php 
$uid = $_SESSION['user_id'];
$q = "SELECT * FROM accounts WHERE id='{$uid}';";
$query = mysqli_query($conn, $q);
?>
	<table id="termini">
	<tr>
		<th>
			Name
		</th>
	
	
		<th>
			Surname
		</th>
	
	
		<th>
			Username
		</th>
	
		<th>
			DayOfBirth
		</th>
	
		<th>
			Phone
		</th>
	
		<th>
			Email
		</th>


	</tr>
	<?php while ($row = mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td>
				<?php echo $row['fname'] ?>
			</td>
		
			<td>
				<?php echo $row['lname'] ?>
			</td>
		
			<td>
				<?php echo $row['username'] ?>
			</td>
		
			<td>
				<?php echo $row['bday'] ?>
			</td>
					<td>
				<?php echo $row['mobp'] ?>
			</td>
		
			<td>
				<?php echo $row['email'] ?>
			</td>
			<td>
                    <a id="nochange" href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                    
                </td>
		</tr>
		<?php

 } ?>
</table>


<?php 
$uid = $_SESSION['user_id'];
$q = "SELECT a.id, a.date, a.employee, a.start_time, a.total_duration, a.end_time, a.total_price, e.fname, s.service_name
FROM appointments a, employees e, services s, choosen_services c
 WHERE e.id=a.employee
 and s.id=c.service and a.id=c.appointment
  and a.client='{$uid}';

  ";
$query = mysqli_query($conn, $q);
?>	
<table id="termini">
	<tr>
		<th>
			Date
		</th>
		<th>
			Employee
		</th>
		<th>
			Start Time
		</th>
		<th>
			Total Duration
		</th>
		<th>
			End Time
		</th>
		<th>
			Total Price
		
		</th>
		<th>
			Service Name
		</th>
		
		

	</tr>
	<h2>Appointments</h2><br>
	<?php while ($row = mysqli_fetch_assoc($query)) { ?>
		
		<tr>
			<td>
				<?php echo $row['date'] ?>
			</td>
		
			<td>
				<?php echo $row['fname'] ?>
			</td>
		
			<td>
				<?php echo $row['start_time'] ?>
			</td>
			<td>
				<?php echo $row['total_duration'] ?>
			</td>
		
			<td>
				<?php echo $row['end_time'] ?>
			</td>
			<td>
				<?php echo $row['total_price'] ?>
			</td>
			<td>
				<?php echo $row['service_name'] ?>
			</td>
			<td>
                    
                    <a id="nochange" onclick="return confirm('Are you sure that you want to cancel appointment <?php echo $row['date'] ?>')" href="delete.php?id=<?php echo $row['id'] ?>">Cancel</a>

                </td>


		</tr>

		<?php

 } ?>


</table>

<a id="normal" href="../BookingPage/dd_bh.php">
<div id="book">
	
	BOOK AN APPOINTMENT
	</div>
</a>



</body>
</html>