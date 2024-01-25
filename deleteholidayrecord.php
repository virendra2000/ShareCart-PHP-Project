<?php
	require 'connection.php';
	if(isset($_GET['deleteid']))  {
		$id = $_GET['deleteid'];
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