<?php
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup']) && $_POST['g-recaptcha-response'] != ""){
	$secret = '6LddwyMiAAAAAM72ExRf03ktwdl3j1J_usBSe-VO';
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
	if ($responseData->success) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
		if($password !== $cpassword){
			$errors['password'] = "Confirm password not matched!";
		}
		$email_check = "SELECT * FROM usertable WHERE email = '$email'";
		$res = mysqli_query($con, $email_check);
		if(mysqli_num_rows($res) > 0){
			$errors['email'] = "Email that you have entered is already exist!";
		}
		if(count($errors) === 0){
			$encpass = password_hash($password, PASSWORD_BCRYPT);
			$code = rand(999999, 111111);
			$status = "notverified";
			$funding = 100000;
			$insert_data = "INSERT INTO usertable (name, email, password, code, status,fund)
                        values('$name', '$email', '$encpass', '$code', '$status',$funding)";
			$data_check = mysqli_query($con, $insert_data);
			if($data_check){
				$subject = "ShareCart | Email Verification Code";
				$message = "ShareCart | Learn Online Trading System : $name Your One Time Password for verification is $code \n Regards,\nServer Admin";
				$sender = "From: vkalwar132000@gmail.com";
				if(mail($email, $subject, $message, $sender)){
					$info = "We've sent a verification code to your email - $email";
					$_SESSION['info'] = $info;
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					header('location: user-otp.php');
					exit();
				}
				else{
					$errors['otp-error'] = "Failed while sending code!";
				}
			}
			else{
				$errors['db-error'] = "Failed while inserting data into database!";
			}
		}
    }
    

}

if(isset($_POST['register']) && $_POST['g-recaptcha-response'] != ""){
	$secret = '6LddwyMiAAAAAM72ExRf03ktwdl3j1J_usBSe-VO';
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    $responseData = json_decode($verifyResponse);
	if ($responseData->success) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
		if($password !== $cpassword){
			$errors['password'] = "Confirm password not matched!";
		}
		$email_check = "SELECT * FROM admin WHERE email = '$email'";
		$res = mysqli_query($con, $email_check);
		if(mysqli_num_rows($res) > 0){
			$errors['email'] = "Email that you have entered is already exist!";
		}
		if(count($errors) === 0){
			$encpass = password_hash($password, PASSWORD_BCRYPT);
			$insert_data = "INSERT INTO admin (name, email, password)
                        values('$name', '$email', '$encpass')";
			$data_check = mysqli_query($con, $insert_data);
			if($data_check){
				$_SESSION['email'] = $email;
				$_SESSION['password'] = $password;
				header('location: admindashboard.php');
			}
			else{
				$errors['db-error'] = "Failed while inserting data into database!";
			}
		}
    }
    

}

    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE usertable SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                header('location: userdashboard.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click login button
    if(isset($_POST['login']) && $_POST['g-recaptcha-response'] != ""){
		$secret = '6LddwyMiAAAAAM72ExRf03ktwdl3j1J_usBSe-VO';
    	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    	$responseData = json_decode($verifyResponse);
		if ($responseData->success) {
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
			$check_email = "SELECT * FROM usertable WHERE email = '$email'";
			$res = mysqli_query($con, $check_email);
			if(mysqli_num_rows($res) > 0){
				$fetch = mysqli_fetch_assoc($res);
				$fetch_pass = $fetch['password'];
				if(password_verify($password, $fetch_pass)){
					$_SESSION['email'] = $email;
					$status = $fetch['status'];
					if($status == 'verified'){
						$_SESSION['email'] = $email;
						$_SESSION['password'] = $password;
						header('location: userdashboard.php');
					}
					else{
						$info = "It's look like you haven't still verify your email - $email";
						$_SESSION['info'] = $info;
						header('location: user-otp.php');
					}
				}
				else{
					$errors['email'] = "Incorrect email or password!";
				}
			}
			else{
				$errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
			}
		}
        
    }
	
	//if user click login button
    if(isset($_POST['adlogin']) && $_POST['g-recaptcha-response'] != ""){
		$secret = '6LddwyMiAAAAAM72ExRf03ktwdl3j1J_usBSe-VO';
    	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secret . '&response=' . $_POST['g-recaptcha-response']);
    	$responseData = json_decode($verifyResponse);
		if ($responseData->success) {
			$email = mysqli_real_escape_string($con, $_POST['email']);
			$password = mysqli_real_escape_string($con, $_POST['password']);
			$check_email = "SELECT * FROM admin WHERE email = '$email'";
			$res = mysqli_query($con, $check_email);
			if(mysqli_num_rows($res) > 0){
				$fetch = mysqli_fetch_assoc($res);
				$fetch_pass = $fetch['password'];
				if(password_verify($password, $fetch_pass)){
					$_SESSION['email'] = $email;
					$_SESSION['password'] = $password;
					header('location: admindashboard.php');
				}
				else{
					$errors['email'] = "Incorrect email or password!";
				}
			}
			else{
				$errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
			}
		}
        
    }
	

    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM usertable WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE usertable SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "ShareCart | Password Reset";
                $message = "ShareCart | Learn Online Trading System \n Your password Reset One Time Pin is $code";
                $sender = "From: vkalwar132000@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM usertable WHERE code = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }
?>