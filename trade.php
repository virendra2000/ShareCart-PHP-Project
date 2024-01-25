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
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
		
		.crud-oper .textedit {
			width: 50%;
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
			border-radius: 28px;
			background: blue;
		}
		
		.crud-oper .buy-btn {
			width: 15%;
			margin-left: 5px;
			padding: 10px;
			border: 0px;
			font-weight: bold;
			color: white;
			border-radius: 28px;
			background: #1fd655;
		}
		
		.crud-oper .sell-btn {
			width: 15%;
			margin-left: 5px;
			padding: 10px;
			border: 0px;
			font-weight: bold;
			color: white;
			border-radius: 28px;
			background: red;
		}
		
		.crud-oper .record {
			margin-top : 40px;
			border: 2px solid grey;
			border-collapse: collapse;
		}
		
		.crud-oper .record th {
			background: blue;
			padding: 20px;
			color: white;
			border: 2px solid white;
		}
		
		.crud-oper .record td {
			padding: 20px;
			align-items: center;
			justify-content: centerl;
			border: 1px solid grey;
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
	</style>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="images/logo.png" width="50px" height="50px">&nbsp&nbsp ShareCart</a>
		<ul class="side-menu">
			<li><a href="userdashboard.php"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="addmoney.php"><i class='bx bx-rupee icon' ></i> Add Money</a></li>
			<li><a href="watchlist.php" class="active"><i class='bx bx-plus icon'></i>Watchlist</a></li>
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
			<?php
				include'connection.php';
				$total = "";
				$count="";
				$id = $_GET['addid'];
				$sql = "SELECT * FROM watchlist WHERE id=$id";
				$result=mysqli_query($con,$sql);
				if($result) {
					$fetch = mysqli_fetch_assoc($result);
				}
				else {
					die(mysqli_error($con));
				}
				
				if($total == 0 OR $total=="") {
					echo "";
				}
				
				if($count == 0 OR $count =="") {
					echo "";
				}
				
				if (isset($_POST['ftch'])) {
					$count = (int)$_POST["count"];
					$price = (int)$fetch['close'];
					$total = $count * $price;
				}
				
				if (isset($_POST['buy'])) {
					$username = $fetch_info['name'];
					$stockname = $fetch['stocksymbol'];
					$rate = $fetch['close'];
					$count = (int)$_POST["count"];
					$price = (int)$fetch['close'];
					$total = $count * $price;
					$trtype="BUY";
					
					$investamt = (int)$fetch_info['investedamount'] + $total;
					$fund = (int)$fetch_info['fund'] - $total;
					
					$sql = "INSERT INTO tradingstock(username,stockname,rate,purchasedamt,purchasedstock,transactiontype) 
					VALUES('$username','$stockname','$rate','$total','$count','$trtype')";
					$reslt = mysqli_query($con, $sql);
					if($reslt) {
						$query = "UPDATE usertable SET investedamount=$investamt,fund=$fund WHERE name='$username'";
						$qres = mysqli_query($con,$query);
						if($qres) {
							echo "<script>
							alert('Stock Purchased');
							window.location.href='watchlist.php';
							</script>";
						}
					}
				}
				
			?>
			<h1 class="title"><?php echo $fetch['stocksymbol']; ?></h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="watchlist">Watchlist</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active"><?php echo $fetch['stocksymbol']; ?></a></li>
			</ul>
			
			<div class="crud-oper">
				<form method="post">
						<label>Symbol</label><br><br>
						<label style="color:black;font-weight:bold"><?php echo $fetch['stocksymbol']; ?></label><br><br>
						
						<label>Type</label><br><br>
						<label style="color:black;font-weight:bold">NSE</label><br><br>
						
						<label>Stock Price</label><br><br>
						<label style="color:black;font-weight:bold"><?php echo $fetch['close']; ?></label><br><br>
						
						<table class="record">
							<thead>
								<tr>
									<th>Open</th>
									<th>High</th>
									<th>Low</th>
									<th>Close</th>
									<th>Prev. Close</th>
								</tr>
							</thead>
							
							<tr>
								<td style="color:black;font-weight:bold"><?php echo $fetch['open']; ?></td>
								<td style="color:green;font-weight:bold"><?php echo $fetch['high']; ?> +</td>
								<td style="color:red;font-weight:bold"><?php echo $fetch['low']; ?> -</td>
								<td style="color:black;font-weight:bold"><?php echo $fetch['close']; ?></td>
								<td style="color:black;font-weight:bold"><?php echo $fetch['prevclose']; ?></td>
							</tr>
						</table><br><br>
						
						<label>No. Of Stock</label><br><br>
						<input type="text" placeholder="Enter Number of Stocks"  name="count" class="textedit" value="<?php
								if($count == 0 OR $count =="") {
									echo "";
								}
								else {
									echo $count;
								}
								?>">&nbsp
						<button type="submit" class="search-btn" name="ftch" onclick="displayfetch()"><i class='fas fa-sync-alt' style='font-size:24px'>  Fetch</i></button><br><br>
						
						<label>Total Amount</label><br><br>
						<label id="ftchdata"><?php echo $total ?></label><br><br>
						
						<label>Purchased Stock</label><br><br>
						<label id="ftchdata"><?php echo $count ?></label><br><br>
						
						<button type="submit" class="buy-btn" name="buy"><i class='fas fa-arrow-circle-right' style='font-size: 24px'>  Buy</i></button>&nbsp&nbsp
						<button type="submit" class="sell-btn" name="sell" onclick="alert()"><i class='fas fa-arrow-circle-left' style='font-size: 24px'>  Sell</i></button>
						<br><br>
						<script>
							function alert() {
								window.open("underdevelopment.php", "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=700,height=600");
							}

						</script>
						
					</form>
			</div>
			
			<br><br>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
	
	<script src="css/new/script.js"></script>
</body>
</html>