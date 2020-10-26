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
	<title>My Profile</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<a href="../login/logout.php">
	<h2 id="logout">LOGOUT</h2>
</a>
	<?php 

$q = "SELECT a.date, a.start_time, a.total_duration, a.end_time, a.total_price, s.service_name
FROM appointments a, services s, choosen_services c, accounts k, employees e
 WHERE s.id=c.service 
 and a.id=c.appointment
 and e.id=a.employee
 and k.username=e.username
 and e.id=1
 and DATE_FORMAT(SYSDATE(), '%Y-%m-%d') <= DATE_FORMAT(a.date, '%Y-%m-%d')and DATE_ADD(DATE_FORMAT(SYSDATE(), '%Y-%m-%d'), INTERVAL 7 DAY) >= DATE_FORMAT(a.date, '%Y-%m-%d')
ORDER BY a.date, a.start_time;

 ;";
$query = mysqli_query($conn, $q);

?>	
<h1>Employee Schedules</h1>
<table class="tables">
	<h2>Yvonne Benson</h2><br>
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

	<?php 

$q = "SELECT a.date, a.start_time, a.total_duration, a.end_time, a.total_price, s.service_name
FROM appointments a, services s, choosen_services c, accounts k, employees e
 WHERE s.id=c.service 
 and a.id=c.appointment
 and e.id=a.employee
 and k.username=e.username
 and e.id=2
 and DATE_FORMAT(SYSDATE(), '%Y-%m-%d') < DATE_FORMAT(a.date, '%Y-%m-%d')and DATE_ADD(DATE_FORMAT(SYSDATE(), '%Y-%m-%d'), INTERVAL 7 DAY) >  DATE_FORMAT(a.date, '%Y-%m-%d')
ORDER BY a.date, a.start_time;

 ;";
$query = mysqli_query($conn, $q);

?>	

<table>
	<h2>Shelia Meyer</h2><br>
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
	<?php 

$q = "SELECT a.date, a.start_time, a.total_duration, a.end_time, a.total_price, s.service_name
FROM appointments a, services s, choosen_services c, accounts k, employees e
 WHERE s.id=c.service 
 and a.id=c.appointment
 and e.id=a.employee
 and k.username=e.username
 and e.id=3
 and DATE_FORMAT(SYSDATE(), '%Y-%m-%d') < DATE_FORMAT(a.date, '%Y-%m-%d')and DATE_ADD(DATE_FORMAT(SYSDATE(), '%Y-%m-%d'), INTERVAL 7 DAY) >  DATE_FORMAT(a.date, '%Y-%m-%d')
ORDER BY a.date, a.start_time;

 ;";
$query = mysqli_query($conn, $q);

?>	

<table>
	<h2>Doris Hicks</h2><br>
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
<br> <br>
<h1>Sales Reports</h1>

<?php 

$q = "SELECT *
FROM ascurrentmonth;";
$query = mysqli_query($conn, $q);

?>	
<div class="izvjestaji">
	<h3>Sales for last month</h3>
	
	<?php while ($row = mysqli_fetch_assoc($query)) { ?>
		
				<?php echo $row['avgsales'] ?>
			

</div>

		<?php

 } ?>
 <?php 

$q = "SELECT *
FROM top3services";
$query = mysqli_query($conn, $q);

?>	
 
	
	<table id="rep">
		
		<h3 id="naslov">Top 3 services</h3>
		<tr>
		<th>Service name</th>
		<th>Number</th>
	</tr>
	<?php while ($row = mysqli_fetch_assoc($query)) { ?>
		
<tr>
				<td>
					<?php echo $row['service_name'] ?>
						
					</td>
				<td>
					<?php echo $row['count(cs.service)'] ?>
						
					</td>
			</tr>

<?php

 } ?>

</table>
<?php 

$q = "SELECT *
FROM top5customers";
$query = mysqli_query($conn, $q);

?>	
<table id="rep">
		
		<h3 id="naslov">Top 5 customers</h3>
		<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Number of Appointments</th>
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
					<?php echo $row['COUNT(a.CLIENT)'] ?>
						
					</td>
			</tr>

<?php

 } ?>

</table>







</body>
</html>