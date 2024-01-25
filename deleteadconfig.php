<?php
	require 'connection.php';
	if(isset($_GET['deleteadid']))  {
		$id = $_GET['deleteadid'];
		$sql = "DELETE FROM ads WHERE id = $id";
		$result=mysqli_query($con,$sql);
		if($result) {
			header('location: manageads.php');
		}
		else {
			die(mysqli_error($con));
		}
	}
?>