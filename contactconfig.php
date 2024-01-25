<?php
session_start();
require "connection.php";
$email = "teminiprojectgrp3@gmail.com";
$name = "";
$code = rand(999999, 111111);
$sendername = $_POST['sendername'];
$senderemail = $_POST['senderemail'];
$subject = $_POST['sendersubj'];
$message = $_POST['sendermsg'];
$sender = "From: ".$senderemail;
$n=10;
function getName($n) {
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$randomString = '';
	for ($i = 0; $i < $n; $i++) {
		$index = rand(0, strlen($characters) - 1);
		$randomString .= $characters[$index];
	}
	return $randomString;
}
$token1 = getName($n);
$token = $token1.$code;
if(mail($email, $subject, $message, $senderemail)){
	$insert_data = "INSERT INTO contact (sendername, senderemail, subjectname, msg, msgtoken)
                    values('$sendername', '$senderemail', '$subject', '$message', '$token')";
	$data_check = mysqli_query($con, $insert_data);
	if($data_check){
		$subject2 = "ShareCart | Grievance Submission";
		$message2 = "ShareCart | Learn Online Trading System : $name Your Grievance Message Token is $token for \n $message \n Regards,\nServer Admin";
		$sender = "From: vkalwar132000@gmail.com";
		if(mail($senderemail, $subject2, $message2, $sender)){
			$_SESSION['info'] = $token;
			$_SESSION['email'] = $senderemail;
			$_SESSION['name'] = $sendername;
			$_SESSION['subj'] = $subject;
			$_SESSION['msg'] = $message;
			header('location: grievanceconfirm.php');
			exit();
		}
		else{
			$errors['otp-error'] = "Failed while sending code!";
		}
	}
}
else{
	$errors['otp-error'] = "Failed while sending grievance";
}
?>