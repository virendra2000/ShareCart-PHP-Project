<?php
	require 'connection.php';
	if(isset($_GET['deleteuser']))  {
		$id = $_GET['deleteuser'];
		$sql = "DELETE FROM usertable WHERE id = $id";
		$result=mysqli_query($con,$sql);
		if($result) {
			header('location:admindashboard.php');
		}
		else {
			die(mysqli_error($con));
		}
	}
?>