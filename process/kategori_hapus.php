<?php  
	include('../function/config.php');

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];

		mysqli_query($dbconnect, "DELETE FROM `kategori` WHERE kategori_id= '$id'");

		header("location:kategori_kelola.php");
	}
?>