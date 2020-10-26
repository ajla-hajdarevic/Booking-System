<?php
session_start();
include('../db.php');
 if((isset($_SESSION['role']) && $_SESSION['role'] == 1)){
    header("location: http://localhost/Salon/Services/editableservice.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<?php 
$pageTitle = 'Services';
include('../header/header.php');
?>
</head>
<link rel="stylesheet" type="text/css" href="Services.css">
<link rel="stylesheet" type="text/css" href="../header/header.css">
<link rel="stylesheet" type="text/css" href="../footer/footeri.css">

<body>
    <div id="black">
        <h2>SERVICES</h2>
        </div>
        
	<main>
        <?php 
$query = mysqli_query($conn, "select * from services where category = 0;");
?>
		<table class="tabela move2">
			<h1 id="naslov2">Cutting</h1>
			<tr>
				<th>Service name</th>
    			<th>Price</th>
    			<th>Duration(mins)</th>
    		</tr>
    		<?php 
        while($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                
                <td>
                    <?php echo $row['service_name'] ?>
                </td>
                <td>
                    <?php echo $row['price'] ?>
                </td>
                <td>
                    <?php echo $row['duration'] ?>
                </td>
                
            </tr>
        <?php } ?>
    		
		</table>
        <?php 
$query = mysqli_query($conn, "select * from services where category = 1;");
?>
		<table class="tabela">
			<h1 id="naslov">Coloring</h1>
    		<tr>
    			<th>Service name</th>
    			<th>Price</th>
    			<th>Duration(mins)</th>
       		</tr>
    		<?php 
        while($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td>
                    <?php echo $row['service_name']?>
                </td>
                <td>
                    <?php echo $row['price'] ?>
                </td>
                <td>
                    <?php echo $row['duration'] ?>
                </td>
                
            </tr>
        <?php } ?>
		</table>
        <?php 
$query = mysqli_query($conn, "select * from services where category = 2;");
?>
		<table class="tabela move2">
			<h1 id="naslov2">Foundation</h1>
			<tr>
				<th>Service name</th>
    			<th>Price</th>
    			<th>Duration(mins)</th>
    		</tr>
    		<?php 
        while($row = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td>
                    <?php echo $row['service_name']?>
                </td>
                <td>
                    <?php echo $row['price'] ?>
                </td>
                <td>
                    <?php echo $row['duration'] ?>
                </td>
                
            </tr>
        <?php } ?>
    	</table>
    		
	</main>
    <?php 
include('../footer/footer.php'); ?>


</body>
</html>