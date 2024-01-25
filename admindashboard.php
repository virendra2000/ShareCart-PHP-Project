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
		
		.edit_btn {
			width: 25%;
			margin-left: 5px;
			padding: 10px;
			border: 0px;
			border-radius: 5px;
			font-weight: bold;
			color: white;
			background: blue;
		}
		
		.del_btn {
			width: 25%;
			margin-left: 5px;
			padding: 10px;
			border: 0px;
			border-radius: 5px;
			font-weight: bold;
			color: white;
			background: red;
		}
		
		/* custom scroll bar */
::-webkit-scrollbar {
    width: 10px;
}
::-webkit-scrollbar-track {
    background: #f1f1f1;
}
::-webkit-scrollbar-thumb {
    background: #888;
}

::-webkit-scrollbar-thumb:hover {
    background: red;
}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
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
			<li><a href="admindashboard.php" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="managerequest.php"><i class='bx bx-git-pull-request icon' ></i>Manage Request</a></li>
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
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2>
								<?php
									$sql = "SELECT COUNT(name) as cust FROM usertable";
									$run_Sql = mysqli_query($con, $sql);
									if($run_Sql){
										$fetch_info = mysqli_fetch_assoc($run_Sql);
										echo $fetch_info['cust'];
										$custper1 = $fetch_info['cust'] / 1000000 * 100;
										$custper2 = $custper1."%";
									}
								?>
							</h2>
									<br>
							<p>Total Users</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
						<?php
							echo "<span class='progress' data-value=".$custper2."></span>";
						?>
					<span class="label"><?php echo $custper2; ?></span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>
								<?php
									$sql = "SELECT count(symbol) as stocktotal FROM stocklist";
									$run_Sql = mysqli_query($con, $sql);
									if($run_Sql){
										$fetch_info = mysqli_fetch_assoc($run_Sql);
										echo $fetch_info['stocktotal'];
									}
								?>
							</h2>
									<br>
							<p>Total Stocks</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
					<span class="progress" data-value="100%"></span>
					<span class="label">100%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>
								<?php
									$sql = "SELECT COUNT(ipaddress) as ip FROM analysisofportal";
									$run_Sql = mysqli_query($con, $sql);
									if($run_Sql){
										$fetch_info = mysqli_fetch_assoc($run_Sql);
										echo $fetch_info['ip'];
										$custper1 = $fetch_info['ip'] / 1000000 * 100;
										$custper2 = $custper1."%";
									}
								?>
							</h2>
									<br>
							<p>Total Views</p>
						</div>
						
						<i class='fluent:currency-dollar-rupee-24-filled' ></i>
					</div>
					<?php
							echo "<span class='progress' data-value=".$custper2."></span>";
						?>
					<span class="label"><?php echo $custper2; ?></span>
				</div>
			</div>
			</div>
			<br><br>
			<div class="tab">
				<button class="tablinks" onclick="openlink(event, 'stock')" id="defaultOpen">Stock</button>
				<button class="tablinks" onclick="openlink(event, 'customer')">Customer</button>
				<button class="tablinks" onclick="openlink(event, 'holiday')">Trading Holiday</button>
			</div>
			
			<div id="stock" class="tabcontent">
				<div class="crud-oper">
					<?php
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							$searchinp = $_POST["searching"];
							$results = mysqli_query($con, "SELECT * FROM stocklist WHERE symbol LIKE '%$searchinp%'");
						}
						else {
							$results = mysqli_query($con, "SELECT * FROM stocklist");
						}	
					?>
					<?php if(mysqli_num_rows($results) > 0) { ?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<input type="search" placeholder="Search"  name="searching" class="srch">
						<button type="submit" class="search-btn" name="searchbtn">Search</button>
					</form>
					<table class="record">
						<thead>
							<tr>
								<th>Symbol</th>
								<th>Open</th>
								<th>High</th>
								<th>Low</th>
								<th>Close</th>
								<th>Prev. Close</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
    
						<?php
							while ($row = mysqli_fetch_array($results)) { ?>
							<tr>
							<td style="color:black;font-weight:bold"><?php echo $row['symbol']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['open']; ?></td>
							<td style="color:green;font-weight:bold"><?php echo $row['dayhigh']; ?> +</td>
							<td style="color:red;font-weight:bold"><?php echo $row['daylow']; ?> -</td>
							<td style="color:black;font-weight:bold"><?php echo $row['close']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['prevclose']; ?></td>
							<td><a href="deletestockrecord.php?deletestock=<?php echo $row['id']; ?>" class="del_btn">Delete</a></td>
						</tr>
						<?php } 
					}
					else {
						echo "<article>
							No Record Available
							</article>";
					}?>
					</table>
				</div>
			</div>
			<div id="customer" class="tabcontent">
				<div class="crud-oper">
					<?php
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							$searchinp = $_POST["searching"];
							$results = mysqli_query($con, "SELECT * FROM usertable WHERE name LIKE '%$searchinp%'");
						}
						else {
							$results = mysqli_query($con, "SELECT * FROM usertable");
						}
					?>
					<?php if(mysqli_num_rows($results) > 0) { ?>
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<input type="search" placeholder="Search"  name="searching" class="srch">
						<button type="submit" class="search-btn" name="searchbtn">Search</button>
					</form>
					<table class="record">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>Contact No.</th>
								<th>Available Fund</th>
								<th>Invested Fund</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tr>
							<?php while ($row = mysqli_fetch_array($results)) { ?>
							<td style="color:black;font-weight:bold"><?php echo $row['name']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['email']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['phone']." /<br>".$row['mobile']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['fund']; ?></td>
							<td style="color:black;font-weight:bold"><?php
								if($row["investedamount"] == 0) {
											echo "Not Yet Invested";
										}
										else {
											echo $row["investedamount"];
										}
									?>
							</td>
							<td><a href="editcustomerrecord.php?edit=<?php echo $row['id'] ?>" class='edit_btn' >Edit</a></td>
							<td><a href="deletecustomerrecord.php?deleteuser=<?php echo $row['id']; ?>" class='del_btn'>Delete</a></td>
						</tr>
						<?php } 
					}
					else {
						echo "<article>
							No Record Available
							</article>";
					}?>
					</table>
							
				</div>
				</div>
				<div id="holiday" class="tabcontent">
				<div class="crud-oper">
					<?php
						$results = mysqli_query($con, "SELECT * FROM tradingholiday");
					?>
					<?php if(mysqli_num_rows($results) > 0) { ?>
					<table class="record">
						<thead>
							<tr>
								<th>Festival Name</th>
								<th>Date</th>
								<th>Day</th>
								<th>Morning<br>Session<br>( 9am to 5pm)</th>
								<th>Evening<br>Session<br>( 9am to 12am)</th>
								<th colspan="2">Action</th>
							</tr>
						</thead>
						<tr>
						<?php while ($row = mysqli_fetch_array($results)) { ?>
							<td style="color:black;font-weight:bold"><?php echo $row['festivalname']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['Date']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['Day']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['morningsession']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row["eveningsession"]; ?></td>
							<td><a href="editholidayrecord.php?edit=<?php echo $row['id'] ?>" class='edit_btn' >Edit</a></td>
							<td><a href="deleteholidayrecord.php?deleteid=<?php echo $row['id']; ?>" class='del_btn'>Delete</a></td>
						</tr>
						<?php } 
					}
					else {
						echo "<article>
							No Record Available
							</article>";
					}?>
						</table>
				</div>
			</div>
			
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
	<script>
function openlink(evt, linkname) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(linkname).style.display = "block";
  evt.currentTarget.className += " active";
}
document.getElementById("defaultOpen").click();
</script>
	<script src="css/new/script.js"></script>
</body>
</html>