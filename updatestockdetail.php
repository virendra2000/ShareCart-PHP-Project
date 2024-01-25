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
	<title><?php echo $fetch_info['name'] ?> | Import Stock Detail</title>
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
			<li><a href="admindashboard.php"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="managerequest.php"><i class='bx bx-git-pull-request icon' ></i>Manage Request</a></li>
			<li><a href="insertstockdetail.php"><i class='bx bx-import icon' ></i> Import Stock Detail</a></li>
			<li><a href="createads.php"><i class='bx bx-image-add icon' ></i>Create Ads</a></li>
			<li><a href="manageads.php"><i class='bx bx-images icon' ></i>Manage My Ads</a></li>
			<li><a href="updatestockdetail.php" class="active"><i class='bx bx-import icon' ></i>Update Stock Detail</a></li>
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
				<img src="images/user.png" class="rounded-circle" width="150">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="admin-logout.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->
		<br><br>
		<!-- MAIN -->
		<main>
			<h5><a href="">Home</a> | Update Stock Detail</h5><br>
			<div class="main-body">
			<div class="row">
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
							<form action="stocklistupdate.php" method="post" name="upload_excel" name="upload_excel" enctype="multipart/form-data">
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">UPLOAD CSV File</h6>
								</div>
								<div class="col-sm-9 text-secondary"><br>
									<input type="file" class="form-control" name="file" id="file" accept=".csv"><br>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<button type="submit" class="btn btn-primary px-4" name="Import"  data-loading-text="Loading...">Import</button>
								</div>
							</div>
							</form>
							<br><br>
							<?php
								function get_all_records(){
									$con = mysqli_connect('localhost', 'root', '', 'sharecart');
									$Sql = "SELECT * FROM stocklist";
									$result = mysqli_query($con, $Sql);  
									if (mysqli_num_rows($result) > 0) {
										echo "<div class='table-responsive'><table id='myTable' class='table table-striped table-bordered'>
										<thead style='background-color:blue;color:white;font-weight:bold'><tr><th>Stock Symbol</th>
										<th>Open</th>
										<th>High</th>
										<th>Low</th>
										<th>Close</th>
										<th>Prev. Close</th>
										</tr></thead><tbody>";
										while($row = mysqli_fetch_assoc($result)) {
											echo "<tr>
													<td style='color:black;font-weight:bold'>" . $row['symbol']."</td>
													<td style='color:black;font-weight:bold'>" . $row['open']."</td>
													<td style='color:green;font-weight:bold'>" . $row['dayhigh']." +</td>
													<td style='color:red;font-weight:bold'>" . $row['daylow']." -</td>
													<td style='color:black;font-weight:bold'>" . $row['close']."</td>
													<td style='color:black;font-weight:bold'>" . $row['prevclose']."</td>
												</tr>";        
										}
										echo "</tbody></table></div>";
									} 
									else {
											echo "No Records Available";
									}
								}
								get_all_records();
							?>
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