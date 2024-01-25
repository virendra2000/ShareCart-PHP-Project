<?php
require_once "controllerUserData.php"; 
require "connection.php";
$errors = array();
$email = $_SESSION['email'];
$password = $_SESSION['password'];
	if($email != false && $password != false){
		$sql = "SELECT * FROM usertable WHERE email = '$email'";
		$run_Sql = mysqli_query($con, $sql);
		if($run_Sql){
			$fetch_info = mysqli_fetch_assoc($run_Sql);
			$status = $fetch_info['status'];
			$code = $fetch_info['code'];
			if($status == "verified"){
				if($code != 0){
					header('Location: reset-code.php');
				}
			}
			else {
				header('Location: user-otp.php');
			}
		}
	}
	else {
		header('Location: login-user.php');
	}
	
$amt = (int) $_POST['moneytxt'];
$amt2 = $fetch_info['fund'];
$amt3 = $amt2 + $amt;
echo "<script>";
echo "alert('$amt3')";
echo "</script>";
if(count($errors) === 0) {
	$update_data = "UPDATE usertable SET fund=$amt3 WHERE email = '$email'";
	$data_check = mysqli_query($con, $update_data);
	if($data_check){
		echo '<script type="text/javascript">';
		echo ' alert("Fund Added Successfully")';  //not showing an alert box.
		echo '</script>';
		header('location: userdashboard.php');
		exit();
	}
	else{
		$errors['db-error'] = "Failed while updating data into database!";
		header('location: addmoney.php');
		exit();
	}
}
?>