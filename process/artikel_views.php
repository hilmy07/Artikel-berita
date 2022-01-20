<?php
	include '../function/config.php';

	$id = $_GET['id'];
	$id = mysqli_real_escape_string($dbconnect,$id);
	$id = htmlentities($id);

	$dataArtikel = mysqli_query($dbconnect,"SELECT * FROM artikel WHERE artikel_id = '$id' LIMIT 1");

	$dataArtikel = mysqli_fetch_assoc($dataArtikel);

	// update views
	$views = $dataArtikel['artikel_views'];
	$updateViews = mysqli_query($dbconnect,"UPDATE artikel SET artikel_views='$views'+1 WHERE artikel_id = '$id'");

	header("location: javascript:void(0)");
?>