<?php require_once "controllerUserData.php"; ?>
<?php
	$email = $_SESSION['email'];
	$password = $_SESSION['password'];
	if($email != false && $password != false){
		$sql = "SELECT * FROM admin WHERE email = '$email'";
		$run_Sql = mysqli_query($con, $sql);
		if($run_Sql){
			$fetch_info = mysqli_fetch_assoc($run_Sql);
		}
	}
	else {
		header('Location: adminlogin.php');
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
		article { display: block;
			text-align: left;
			width: 650px;
			margin: 50px auto;
			color: white;
			background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
			background-size: 400% 400%;
			animation: gradient 15s ease infinite;
			padding: 40px 40px;
			border-radius: 15px;
		}
  a { color: black; text-decoration: none; }
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
  a:hover { color: #333; text-decoration: none; }
	</style>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="images/logo.png" width="50px" height="50px">&nbsp&nbsp ShareCart</a>
		<ul class="side-menu">
			<li><a href="admindashboard.php"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="managerequest.php" class="active"><i class='bx bx-git-pull-request icon' ></i>Manage Request</a></li>
			<li><a href="insertstockdetail.php"><i class='bx bx-import icon' ></i> Import Stock Detail</a></li>
			<li><a href="createads.php"><i class='bx bx-image-add icon' ></i>Create Ads</a></li>
			<li><a href="manageads.php"><i class='bx bx-images icon' ></i>Manage My Ads</a></li>
			<li><a href="updatestockdetail.php"><i class='bx bx-import icon' ></i>Update Stock Detail</a></li>
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
			<span class="divider"></span>
			<h5><?php echo $fetch_info['name'] ?></h5>
			<div class="profile">
				<img src="images/user.png" class="rounded-circle" width="150" >
				<ul class="profile-link">
					<li><a href="admin-logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Manage User Request</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Manage Request</a></li>
			</ul>
			<article>
				<h1>We&rsquo;ll be back soon!</h1>
				<div>
					<br>
					<p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href="mailto:teminiproject@gmail.com">contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
					<br><p>&mdash; The ShareCart Team</p>
				</div>
			</article>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
	
	<script src="css/new/script.js"></script>
</body>
</html>