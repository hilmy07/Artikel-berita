<?php  
	include('../function/config.php');

	if (isset($_GET['id'])) {
		
		$id = $_GET['id'];

		mysqli_query($dbconnect, "DELETE FROM `artikel` WHERE artikel_id= '$id'");

		header("location:artikel_kelola.php");
	}
?>