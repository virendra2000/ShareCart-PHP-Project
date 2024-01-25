<?php require_once "controllerUserData.php"; ?>
<?php
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="images/logo.png">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/new/style.css">
	<title><?php echo $fetch_info['name'] ?> | Edit Profile</title>
	<style type="text/css">
	.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}

a,a:hover {
			text-decoration: none;
		}
.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="images/logo.png" width="50px" height="50px">&nbsp &nbspShareCart</a>
		<ul class="side-menu">
			<li><a href="userdashboard.php"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="addmoney.php"><i class='bx bx-rupee icon' ></i> Add Money</a></li>
			<li><a href="watchlist.php"><i class='bx bx-plus icon'></i>Watchlist</a></li>
			<li><a href="myportfolio.php"><i class='bx bx-user-pin icon' ></i> My Portfolio</a></li>
			<li><a href="#" class="active"><i class='bx bx-user-circle icon' ></i> My Profile</a></li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<br>
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge">5</span>
			</a>
			<a href="#" class="nav-link">
				<i class='bx bxs-message-square-dots icon' ></i>
				<span class="badge">8</span>
			</a>
			<span class="divider"></span>
			<h5><?php echo $fetch_info['name'] ?></h5>
			<div class="profile">
				<?php 
										// Include the database configuration file  
										require "connection.php"; 
										 
										// Get image data from database 
										$sql = "SELECT profilepic FROM usertable WHERE email = '$email'";
										$run_Sql = mysqli_query($con, $sql);
										?>

										<?php if($run_Sql->num_rows > 0){ ?> 
												<?php while($row = $run_Sql->fetch_assoc()){ ?> 
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['profilepic']); ?>" id="myImage" class="rounded-circle" width="150" onerror="this.src='images/user.png'">
												<?php } ?>  
										<?php }else{ ?> 
											<p class="status error">Image(s) not found...</p> 
								<?php } ?>
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->
		<br><br>
		<!-- MAIN -->
		<main>
			<h5><a href="">Home</a> | <a href="my profile view.php">My Profile</a> | Edit </h5><br>
			<div class="main-body">
			<div class="row">
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="d-flex flex-column align-items-center text-center">
							<form action="profilepic.php" method="POST" enctype="multipart/form-data">
								<?php 
										// Include the database configuration file  
										require "connection.php"; 
										 
										// Get image data from database 
										$sql = "SELECT profilepic FROM usertable WHERE email = '$email'";
										$run_Sql = mysqli_query($con, $sql);
										?>

										<?php if($run_Sql->num_rows > 0){ ?> 
											<div class="upload-btn-wrapper"> 
												<?php while($row = $run_Sql->fetch_assoc()){ ?> 
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['profilepic']); ?>" class="rounded-circle" width="150" onerror="this.src='images/user.png'">
													<input type="file" name="image" id="imgloc" accept="image/*">
												<?php } ?> 
											</div> 
										<?php }else{ ?> 
											<p class="status error">Image(s) not found...</p> 
								<?php } ?>
								<div class="mt-3">
									<h4><?php echo $fetch_info['name'] ?></h4>
									<p class="text-secondary mb-1">Available Fund : <?php echo $fetch_info['fund'] ?></p>
									<p class="text-muted font-size-sm"><?php if($fetch_info['city'] != '' && $fetch_info['city'] != '') {
							          echo $fetch_info['city'].",".$fetch_info['country'];
									}
									?></p>
									<br><br>
									<button class="btn btn-primary" name="submit" type="submit">Change Profile Picture</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
						<form action="profileeditconfig.php" method="post">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="uname" class="form-control" value="<?php if($fetch_info['name'] != '') {
							          echo $fetch_info['name'];
									}
									else {
										echo "";
									}
									?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Email</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="email" name="uemail" class="form-control" value="<?php if($fetch_info['email'] != '') {
							          echo $fetch_info['email'];
									}
									else {
										echo "";
									}
									?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="phone" class="form-control" value="<?php if($fetch_info['phone'] != '') {
							          echo $fetch_info['phone'];
									}
									?>" placeholder="Phone Number">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Mobile</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="mobile" class="form-control" value="<?php if($fetch_info['mobile'] != '') {
							          echo $fetch_info['mobile'];
									}
									?>" placeholder="Mobile Number">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address Line 1</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="addressl1" class="form-control" value="<?php if($fetch_info['address1'] != '') {
							          echo $fetch_info['address1'];
									}
									?>" placeholder="Address 1">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address Line 2</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="addressl2" class="form-control" value="<?php if($fetch_info['address2'] != '') {
							          echo $fetch_info['address2'];
									}
									?>" placeholder="Address 2">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">City</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="city" class="form-control" value="<?php if($fetch_info['city'] != '') {
							          echo $fetch_info['city'];
									}
									?>" placeholder="City">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Pincode</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="zipcode" class="form-control" value="<?php if($fetch_info['pincode'] != '') {
							          echo $fetch_info['pincode'];
									}
									?>" placeholder="Pincode">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Country</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="countryname" class="form-control" value="<?php if($fetch_info['country'] != '') {
							          echo $fetch_info['country'];
									}
									?>" placeholder="Country">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Website Link</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="websiteaddr" class="form-control" value="<?php if($fetch_info['website'] != '') {
							          echo $fetch_info['website'];
									}
									?>" placeholder="https://www.google.com">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Github Username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="githubuser" class="form-control" value="<?php if($fetch_info['github'] != '') {
							          echo $fetch_info['github'];
									}
									?>" placeholder="GitHub Profile Url or Username">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Twitter Username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="twitteruser" class="form-control" value="<?php if($fetch_info['twitter'] != '') {
							          echo $fetch_info['twitter'];
									}
									?>" placeholder="Twitter Profile URL or Username">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Instagram Username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="instagramuser" class="form-control" value="<?php if($fetch_info['instagram'] != '') {
							          echo $fetch_info['instagram'];
									}
									?>" placeholder="Instagram Profile URL or Username">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Facebook Username</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="facebookuser" class="form-control" value="<?php if($fetch_info['facebook'] != '') {
							          echo $fetch_info['facebook'];
									}
									?>" placeholder="Facebook Profile URL or Username">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" name="editbtn" value="Save Changes">
								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="css/new/script.js"></script>
</body>
</html>