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
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="css/new/style.css">
	<title><?php echo $fetch_info['name'] ?> | My Profile</title>
	<style type="text/css">
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

a:hover {
	text-decoration: none;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

.btn-edit {
	background: #1775F1;
	color: #fff;
	padding: 10px 20px;
	border-radius: 8px;
	font-weight: bold;
}

.btn-edit:hover {
	background: #1775F1;
	color: #fff;
	padding: 10px 20px;
	border-radius: 8px;
	font-weight: bold;
}

</style>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="images/logo.png" width="50px" height="50px"> &nbsp&nbspShareCart</a>
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
										<?php if($run_Sql->num_rows > 0) {
											while($row = $run_Sql->fetch_assoc()){ ?> 
												<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['profilepic']); ?>" class="rounded-circle" width="150" onerror="this.src='images/user.png'">
											<?php }
												} else { ?>
												<p class="status error">Image(s) not found...</p>
											<?php } ?>
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->
		
		<br><br><br><br>
		<div class="main-body">
		<h5><a href="">Home</a> | My Profile</h5><br>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php 
										// Include the database configuration file  
										require "connection.php"; 
										 
										// Get image data from database 
										$sql = "SELECT profilepic FROM usertable WHERE email = '$email'";
										$run_Sql = mysqli_query($con, $sql);
										?>

										<?php if($run_Sql->num_rows > 0){ ?> 
												<?php while($row = $run_Sql->fetch_assoc()){ ?> 
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['profilepic']); ?>" class="rounded-circle" width="150" onerror="this.src='images/user.png'"/>
												<?php } ?>  
										<?php }else{ ?> 
											<p class="status error">Image(s) not found...</p> 
								<?php } ?>
                    <div class="mt-3">
                      <h5><?php echo $fetch_info['name'] ?></h5>
                      <p class="text-secondary mb-1">Available Fund : <?php echo $fetch_info['fund'] ?></p>
                      <p class="text-muted font-size-sm"><?php if($fetch_info['city'] != '' && $fetch_info['city'] != '') {
							          echo $fetch_info['city'].",".$fetch_info['country'];
									}
									?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><i class="fa fa-globe"></i> &nbspWebsite</h5>

                    <span class="text-secondary"><?php if($fetch_info['website'] != '') {
							          echo $fetch_info['website'];
									}
									?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><i class="fa fa-github"></i>&nbsp Github</h5>
                    <span class="text-secondary"><?php if($fetch_info['github'] != '') {
							          echo $fetch_info['github'];
									}
									?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><i class="fa fa-twitter"></i> &nbspTwitter</h5>
                    <span class="text-secondary"><?php if($fetch_info['twitter'] != '') {
							          echo $fetch_info['twitter'];
									}
									?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><i class="fa fa-instagram"></i> &nbspInstagram</h5>
                    <span class="text-secondary"><?php if($fetch_info['instagram'] != '') {
							          echo $fetch_info['instagram'];
									}
									?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><i class="fa fa-facebook"></i> &nbspFacebook</h5>
                    <span class="text-secondary"><?php if($fetch_info['facebook'] != '') {
							          echo $fetch_info['facebook'];
									}
									?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $fetch_info['name'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $fetch_info['email'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php if($fetch_info['phone'] != '') {
							          echo $fetch_info['phone'];
									}
									?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Mobile</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php if($fetch_info['mobile'] != '') {
							          echo $fetch_info['mobile'];
									}
									?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php if($fetch_info['address1'] != '' && $fetch_info['address2'] != '' && $fetch_info['city'] != '' && $fetch_info['pincode'] != '' && $fetch_info['country'] != '') {
							          echo $fetch_info['address1'].",".$fetch_info['address2'].",".$fetch_info['city'].",".$fetch_info['pincode'].",".$fetch_info['country'];
									}
									?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn-edit" href="my profile edit.php">Edit</a>
                    </div>
                  </div>
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