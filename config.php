<?php
	$con = mysqli_connect("localhost","root","","Blog");
	
	// Check connection
	
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	mysqli_multi_query($con, "SET NAMES 'utf8'") or die (mysqli_error($con));
?>