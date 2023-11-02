<?php
	require_once 'conn.php';
 
	if(ISSET($_POST['save'])){
		$product_ID = $_POST['product_ID'];
		$product_Name = $_POST['product_Name'];
		$product_Category = $_POST['product_Category'];
 
		$insert = mysqli_query($conn, "INSERT INTO `tbl_product` VALUES('', '$product_ID', '$product_Name', '$product_Category')") or die(mysqli_error($conn));
		if($insert)
		header("location: productTable.php");
	}
?>