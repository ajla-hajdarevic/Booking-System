<?php
include('session.php');
$dbo = Connect();

$category_id = $_GET['cat'];

$query = "SELECT DISTINCT service_name, id FROM services WHERE category = $category_id ORDER BY service_name";

	echo '<option value="">Select one</option>';
foreach ($dbo->query($query) as $service) {
	echo  "<option value='{$service['id']}'>{$service['service_name']}</option>";
}
