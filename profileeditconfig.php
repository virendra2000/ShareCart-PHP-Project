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

$name = $_POST['uname'];
$email = $_POST['uemail'];
$phone = $_POST['phone'];
$mobile = $_POST['mobile'];
$address1 = $_POST['addressl1'];
$address2 = $_POST['addressl2'];
$city = $_POST['city'];
$pincode = $_POST['zipcode'];
$country = $_POST['countryname'];
$website = $_POST['websiteaddr'];
$github = $_POST['githubuser'];
$twitter = $_POST['twitteruser'];
$instagram = $_POST['instagramuser'];
$facebook = $_POST['facebookuser'];
$prevemail = $fetch_info['email'];
if(count($errors) === 0) {
	$update_data = "UPDATE usertable SET name = '$name',email = '$email',phone = '$phone',mobile='$mobile',address1 = '$address1',address2 = '$address2',city='$city',pincode='$pincode',country='$country',website='$website',github='$github',twitter='$twitter',instagram='$instagram',facebook='$facebook' WHERE email = '$prevemail'";
	$data_check = mysqli_query($con, $update_data);
	if($data_check){
		echo '<script type="text/javascript">';
		echo ' alert("Profile Edited Successfully")';  //not showing an alert box.
		echo '</script>';
		$_SESSION['email'] = $email;
		header('location: my profile view.php');
		exit();
	}
	else{
		$errors['db-error'] = "Failed while updating data into database!";
		header('location: my profile edit.php');
		exit();
	}
}