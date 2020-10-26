<?php 

session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
		$_SESSION['msg'] = 'You need to login first';
		header('Location: ../login/login.php');
		exit();
	}
include('../db.php');

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

<?php 
$uid = $_SESSION['user_id'];
$q = "SELECT * FROM accounts WHERE id='{$uid}';";
$query = mysqli_query($conn, $q);

?>
	<table id="termini"><br>
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
                    <a id="nochange" href="edit1.php?id=<?php echo $row['id'] ?>">Edit</a>
                    
                </td>
		</tr>
		<?php

 } ?>
</table><br>


<?php

$uid = $_SESSION['user_id'];
$q = "SELECT a.date, a.employee, a.start_time, a.total_duration, a.end_time, a.total_price, e.fname, s.service_name
FROM appointments a, employees e, services s, choosen_services c
 WHERE e.id=a.employee
 and s.id=c.service and a.id=c.appointment
  and client='{$uid}';";
$query = mysqli_query($conn, $q);
?>	
<table id="termini">
	<h2>MY APPOINTMENTS</h2><br>
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
			
			

		</tr>
		<?php

 } ?>


</table><br>


<?php 
$uid = $_SESSION['username'];
$q = "SELECT a.date, a.start_time, a.total_duration, a.end_time, a.total_price, s.service_name
FROM appointments a, services s, choosen_services c,accounts k, employees e
 WHERE s.id=c.service 
 and a.id=c.appointment
 and e.id=a.employee
 and k.username=e.username
 and k.username='{$uid}'
 and DATE_FORMAT(SYSDATE(), '%Y-%m-%d') < DATE_FORMAT(a.date, '%Y-%m-%d')and DATE_ADD(DATE_FORMAT(SYSDATE(), '%Y-%m-%d'), INTERVAL 7 DAY) >  DATE_FORMAT(a.date, '%Y-%m-%d')
ORDER BY a.date, a.start_time;

 ;";
$query = mysqli_query($conn, $q);

?>	
<table id="termini">
	<h2>SCHEDULE ACCORDING TO BOOKED APPOINTMENTS</h2><br>
	<tr>
		<th>
			Date
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
	
	<?php while ($row = mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td>
				<?php echo $row['date'] ?>
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
			
			

		</tr>
		<?php

 } ?>


</table>






</body>
</html>