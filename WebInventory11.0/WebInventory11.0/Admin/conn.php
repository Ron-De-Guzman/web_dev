<?php
	$conn = mysqli_connect("localhost", "root", "", "db_archive");
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>