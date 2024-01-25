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
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="images/logo.png">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="css/new/style.css">
	<title><?php echo $fetch_info['name'] ?> | Dashboard</title>
	<style>
		a,a:hover {
			text-decoration: none;
		}
		
		:root {
	--grey: #F1F0F6;
	--dark-grey: #8D8D8D;
	--light: #fff;
	--dark: #000;
	--green: #81D43A;
	--light-green: #E3FFCB;
	--blue: #1775F1;
	--light-blue: #D0E4FF;
	--dark-blue: #0C5FCD;
	--red: #FC3B56;
}
		
		.crud-oper {
			margin: 50px 50px;
			width: 150vh;
			display:block;
			padding: 50px 50px;
		}
		
		.crud-oper .srch {
			width: 70%;
			font-size: 14px;
			height: 30px;
			border-radius: 28px;
			padding: 20px;
			border: 1px solid grey;
		}
		
		.crud-oper .search-btn {
			width: 15%;
			margin-left: 5px;
			padding: 10px;
			border: 0px;
			font-weight: bold;
			color: white;
			background: blue;
		}
		
		.crud-oper .record {
			margin-top : 40px;
			border: 0px;
		}
		
		.crud-oper .record th {
			background: blue;
			padding: 20px;
			color: white;
		}
		
		.crud-oper .record td {
			padding: 20px;
			color: black;
		}
		
		.fav_btn {
			width: 5%;
			margin-left: 5px;
			padding: 10px;
			border: 1px solid blue;
			border-radius: 5px;
			font-weight: bold;
			color: blue;
			text-align:center;
			background: white;
		}
		
		.card {
			background: var(--light);
			margin: 10px 10px;
			padding: 15px 15px;
			font-size: 16px;
			box-shadow: 4px 4px 16px rgba(0, 0, 0, .05);
			border-radius: 15px;
		}
		
		article { 
			display: block;
			text-align: left;
			width: 650px;
			margin: 50px auto;
			color: white;
			background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
			background-size: 400% 400%;
			animation: gradient 15s ease infinite;
			padding: 40px 40px;
			border-radius: 15px;
			font-weight: bold;
		}
		
		 @keyframes gradient {
			0% {
				background-position: 0% 50%;
			}
			50% {
				background-position: 100% 50%;
			}
			100% {
				background-position: 0% 50%;
			}
		}
	</style>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="images/logo.png" width="50px" height="50px">&nbsp&nbsp ShareCart</a>
		<ul class="side-menu">
			<li><a href="userdashboard.php"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="addmoney.php"><i class='bx bx-rupee icon' ></i> Add Money</a></li>
			<li><a href="watchlist.php"><i class='bx bx-plus icon'></i>Watchlist</a></li>
			<li><a href="#" class="active"><i class='bx bx-user-pin icon' ></i> My Portfolio</a></li>
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

										<?php if($run_Sql->num_rows > 0){
												while($row = $run_Sql->fetch_assoc()){ ?>
													<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['profilepic']); ?>" class="rounded-circle" width="150" onerror="this.src='images/user.png'">
												<?php } ?>  
										<?php } else { ?> 
											<img src="images/user.png" alt="Admin" class="rounded-circle" width="150"/>
										<?php } ?>
				<ul class="profile-link">
					<li><a href="my profile view.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">My Portfolio</a></li>
			</ul>
			
			<div class="crud-oper">
			
					<br><br>
					<?php $results = mysqli_query($con, "SELECT * FROM tradingstock WHERE username='".$fetch_info['name']."'");	
					if (mysqli_num_rows($results) > 0) { ?>
					<?php while ($row = mysqli_fetch_array($results)) { ?>
							<div class="card">
								<div class="head">
									<div>
										<h1 style="color:black;font-size: 24px"><?php echo $row['stockname']; ?></h1><br>
										<h3 style="color:green;font-size:28px"><?php echo $row['purchasedamt']; ?></h3>
										<br>
									</div>
										<?php 
											if($row['transactiontype'] == "BUY") {
												echo "<h3 style='color:#1fd655;font-weight:bold;font-size:24px'>BUY</h3>";
											}
											if($row['transactiontype'] == "SELL") {
												echo "<h3 style='color: red;font-weight:bold;font-size:24px'>SELL</h3>";
											}
										?>
								</div>
								<p style="color:grey;font-weight: bold">NSE</p>
							</div>
					<?php } 
					}
					else {
						echo "<article>
							No Record Available
							</article>";
					}?>
				</div>
			
			<br><br>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
	
	<script src="css/new/script.js"></script>
</body>
</html>