<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "artikel_blog";
	$port = "3308";

	$dbconnect = new mysqli("$host", "$user", "$pass", "$db", "$port");

	if ($dbconnect-> connect_error) {
		echo "Koneksi gagal ->", $dbconnect->connect_error;
	}
?>