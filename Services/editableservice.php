<?php
session_start();
include('../db.php');
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
        <a href="add.php" id="add">Add new service</a> <br>
    <?php 
    if (isset($_SESSION['msg'])) {  
        echo $_SESSION['msg']; 
        unset($_SESSION['msg']);
    }
     ?>
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
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                    <a onclick="return confirm('Are you sure that you want to delete <?php echo $row['service_name'] ?>')" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
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
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                    <a onclick="return confirm('Are you sure that you want to delete <?php echo $row['service_name'] ?>')" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
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
                <td>
                    <a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                    <a onclick="return confirm('Are you sure that you want to delete <?php echo $row['service_name'] ?>')" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                </td>
                
            </tr>
        <?php } ?>
    	</table>
    		
	</main>
    <?php 
include('../footer/footer.php'); ?>


</body>
</html>