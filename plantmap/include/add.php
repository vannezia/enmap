<?php
	include_once 'dbh.inc.php';
	
	
	$common_name = $_POST['common_name'];
	$scientific_name = $_POST['scientific_name'];
	$family = $_POST['family'];
	$status = $_POST['status'];
	$category = $_POST['category'];
	$planting_type = $_POST['planting_type'];
	$measurement = $_POST['measurement'];
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
	$purok = $_POST['purok'];
	$zone = $_POST['zone'];
	$street = $_POST['street'];
    $barangay = $_POST['barangay_id'];

 $sql = "INSERT INTO plants(common_name,scientific_name,family,status,category,planting_type,measurement,latitude,longitude,purok,zone,street,barangay_id) VALUES ('$common_name', '$scientific_name', '$family', '$status','$category','$planting_type', '$measurement', '$latitude', '$longitude', '$purok', '$zone', '$street', '$barangay');";
                  $result = mysqli_query($conn, "$sql");
//	$plant_id = $_POST['plant_id'];
//	$family = $_POST['family'];
//	$common_name = $_POST['common_name'];
//	$scientific_name = $_POST['scientific_name'];
//	$planting_type = $_POST['planting_type'];
//	$measurement = $_POST['measurement'];
//	$sampling_date = $_POST['sampling_date'];
//	$stat = $_POST['stat'];
//	$lat = $_POST['lat'];
//	$lng = $_POST['lng'];

	//insert data to database	
 
	mysqli_query($conn, $sql);

	header("Location: ../inventory.php");
?>