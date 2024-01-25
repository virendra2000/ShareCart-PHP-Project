<?php
	require 'connection.php';
	if(isset($_GET['deletestock']))  {
		$id = $_GET['deletestock'];
		$sql = "DELETE FROM stocklist WHERE id = $id";
		$result=mysqli_query($con,$sql);
		if($result) {
			header('location:admindashboard.php');
		}
		else {
			die(mysqli_error($con));
		}
	}
?>