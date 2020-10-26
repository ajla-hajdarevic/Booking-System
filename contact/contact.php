<!DOCTYPE html>
<html>
<head>
</head>
<?php 
$pageTitle = 'Contact';
include('../header/header.php');
?>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../header/header.css">
	<link rel="stylesheet" type="text/css" href="../footer/footeri.css">
	<link rel="stylesheet" type="text/css" href="contact.css">

<body class="pozadina">
	<div class="floatleft">
			<i class="material-icons">&#xe0c8;</i>
			<h1> LOCATION </h1>
			<p id="paragraf">Ilidza<br>Hrasnicka cesta 3a<br>Sarajevo, 71 000<br>Bosnia and Herzegovina<br>Phone: 033 975-000</p>
			<a class="drugilinkovi" href="https://www.google.ba/maps/place/Sarajevo+School+of+Science+and+Technology/@43.8238535,18.3084046,15z/data=!4m5!3m4!1s0x0:0x7595449f92ea53f0!8m2!3d43.8238535!4d18.3084046" alt="Google maps" target="_blank">Get Directions</a>
		</div>
		<div class="floatright">

			<img src="clock.png">
			<h1>WORKING HOURS</h1>
			<table>
				<tr>
					<td id="column">Monday</td>		
		    		<td id="column2">10am-8pm</td>
		    	</tr>
		    	<tr>
		    		<td id="column">Thuesday</td>
		    		<td id="column2">9am-8pm</td>
		    	<tr>
		    	<tr>	
					<td id="column">Wednesday</td>	
					<td id="column2">9am-8pm</td>
				</tr>
				<tr>
					<td id="column">Thursday</td>	
					<td id="column2">9am-8pm</td>
				</tr>
				<tr>
					<td id="column">Friday</td>	
					<td id="column2">9am-8pm</td>
				</tr>
				<tr>
					<td id="column">Saturday</td>
					<td id="column2">9am-8pm</td>
				</tr>	
					<td id="column">Sunday</td>
					<td id="column2">10am-5pm</td>	
				</tr>	
	
			</table>
			<a class="drugilinkovi" href="../BookingPage/dd_bh.php">Book Online</a>
	</div>

<?php 
include('../footer/footer.php');
?>
</body>

</html>

