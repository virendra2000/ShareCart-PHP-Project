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
</style>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="images/logo.png" width="50px" height="50px">&nbsp &nbspShareCart</a>
		<ul class="side-menu">
			<li><a href="userdashboard.php"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="#" class="active"><i class='bx bx-rupee icon' ></i> Add Money</a></li>
			<li><a href="watchlist.php"><i class='bx bx-plus icon'></i>Watchlist</a></li>
			<li><a href="myportfolio.php"><i class='bx bx-user-pin icon' ></i> My Portfolio</a></li>
			<li><a href="my profile view.php"><i class='bx bx-user-circle icon' ></i> My Profile</a></li>
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
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['profilepic']); ?>" class="rounded-circle" width="150" onerror="this.src='images/user.png'">
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
			<h5><a href="">Home</a> | Add Money</h5><br>
			<div class="main-body">
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<form action="addmoneyconfig.php" method="post">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Enter Amount</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" class="form-control" name="moneytxt" value="<?php echo $fetch_info['fund'] ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" class="btn btn-primary px-4" name="addmoney" value="ADD">
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