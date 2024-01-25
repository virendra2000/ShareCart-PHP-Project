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
	</style>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="images/logo.png" width="50px" height="50px">&nbsp&nbsp ShareCart</a>
		<ul class="side-menu">
			<li><a href="userdashboard.php" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="addmoney.php"><i class='bx bx-rupee icon' ></i> Add Money</a></li>
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
				<li><a href="#" class="active">Dashboard</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2><?php if($fetch_info['fund'] != '') {
											if($fetch_info['country'] == 'India' || $fetch_info['country'] == 'INDIA' || $fetch_info['country'] == 'india') {
												echo "₹ ".$fetch_info['fund'];
											}
											else if($fetch_info['country'] == 'Usa' || $fetch_info['country'] == 'USA' || $fetch_info['country'] == 'usa') {
												echo "$ ".$fetch_info['fund'] * 0.012;
											}
											else if($fetch_info['country'] == 'Afghanistan' || $fetch_info['country'] == 'AFGHANISTAN' || $fetch_info['country'] == 'afghanistan') {
												echo "&#x60B ".$fetch_info['fund'] * 0.93;
											}
											else if($fetch_info['country'] == 'Albania' || $fetch_info['country'] == 'ALBANIA' || $fetch_info['country'] == 'albania') {
												echo "&#76 ".$fetch_info['fund'] * 1.45;
											}
											else if($fetch_info['country'] == 'Algeria' || $fetch_info['country'] == 'ALGERIA' || $fetch_info['country'] == 'algeria') {
												echo "د. ج ".$fetch_info['fund'] * 1.72;
											}
											else if($fetch_info['country'] == 'Angola' || $fetch_info['country'] == 'ANGOLA' || $fetch_info['country'] == 'angola') {
												echo "Kz ".$fetch_info['fund'] * 5.33;
											}
											else if($fetch_info['country'] == 'Argentina' || $fetch_info['country'] == 'ARGENTINA' || $fetch_info['country'] == 'argentina') {
												echo "$ ".$fetch_info['fund'] * 1.82;
											}
											else if($fetch_info['country'] == 'Armenia' || $fetch_info['country'] == 'ARMENIA' || $fetch_info['country'] == 'armenia') {
												echo "֏ ".$fetch_info['fund'] * 4.96;
											}
											else if($fetch_info['country'] == 'Aruba' || $fetch_info['country'] == 'ARUBA' || $fetch_info['country'] == 'aruba') {
												echo "ƒ ".$fetch_info['fund'] * 0.022;
											}
											else if($fetch_info['country'] == 'Australia' || $fetch_info['country'] == 'AUSTRALIA' || $fetch_info['country'] == 'australia') {
												echo "A$ ".$fetch_info['fund'] * 0.019;
											}
											else if($fetch_info['country'] == 'Azerbaijan' || $fetch_info['country'] == 'AZERBAIJAN' || $fetch_info['country'] == 'azerbaijan') {
												echo "₼ ".$fetch_info['fund'] * 0.021;
											}
											else if($fetch_info['country'] == 'The Bahamas' || $fetch_info['country'] == 'THE BAHAMAS' || $fetch_info['country'] == 'The Bahamas') {
												echo "B$ ".$fetch_info['fund'] * 0.012;
											}
											else if($fetch_info['country'] == 'Bahrain' || $fetch_info['country'] == 'BAHRAIN' || $fetch_info['country'] == 'bahrain') {
												echo ".د.ب ".$fetch_info['fund'] * 0.0046;
											}
											else if($fetch_info['country'] == 'Barbados' || $fetch_info['country'] == 'BARBADOS' || $fetch_info['country'] == 'barbados') {
												echo "Bds$ ".$fetch_info['fund'] * 0.025;
											}
											else if($fetch_info['country'] == 'Bangladesh' || $fetch_info['country'] == 'BANGLADESH' || $fetch_info['country'] == 'bangladesh') {
												echo "৳ ".$fetch_info['fund'] * 1.25;
											}
											else if($fetch_info['country'] == 'Belarus' || $fetch_info['country'] == 'BELARUS' || $fetch_info['country'] == 'belarus') {
												echo "Br ".$fetch_info['fund'] * 0.031;
											}
											else if($fetch_info['country'] == 'Belize' || $fetch_info['country'] == 'BELIZE' || $fetch_info['country'] == 'Belize') {
												echo "BZ$. ".$fetch_info['fund'] * 0.025;
											}
											else if($fetch_info['country'] == 'Bermuda' || $fetch_info['country'] == 'BERMUDA' || $fetch_info['country'] == 'bermuda') {
												echo "BD$. ".$fetch_info['fund'] * 0.012;
											}
											else if($fetch_info['country'] == 'Bhutan' || $fetch_info['country'] == 'BHUTAN' || $fetch_info['country'] == 'bhutan') {
												echo "Nu. ".$fetch_info['fund'] * 1.00;
											}
											else if($fetch_info['country'] == 'Bolivia' || $fetch_info['country'] == 'BOLIVIA' || $fetch_info['country'] == 'bolivia') {
												echo "$b ".$fetch_info['fund'] * 0.085;
											}
											else if($fetch_info['country'] == 'Brunei' || $fetch_info['country'] == 'BRUNEI' || $fetch_info['country'] == 'brunei') {
												echo "B$ ".$fetch_info['fund'] * 0.017;
											}
											else if($fetch_info['country'] == 'China' || $fetch_info['country'] == 'CHINA' || $fetch_info['country'] == 'china') {
												echo "Ұ".$fetch_info['fund'] * 0.086;
											}
											else if($fetch_info['country'] == 'Canada' || $fetch_info['country'] == 'CANADA' || $fetch_info['country'] == 'canada') {
												echo "$ ".$fetch_info['fund'] * 0.017;
											}
											else if($fetch_info['country'] == 'Chile' || $fetch_info['country'] == 'CHILE' || $fetch_info['country'] == 'chile') {
												echo "$ ".$fetch_info['fund'] * 11.382;
											}
											else if($fetch_info['country'] == 'Colombia' || $fetch_info['country'] == 'COLOMBIA' || $fetch_info['country'] == 'colombia') {
												echo "$ ".$fetch_info['fund'] * 55.991;
											}
											else if($fetch_info['country'] == 'Czech Republic' || $fetch_info['country'] == 'CZECH REPUBLIC' || $fetch_info['country'] == 'czech Republic') {
												echo "Kč ".$fetch_info['fund'] * 0.306;
											}
											else if($fetch_info['country'] == 'Egypt' || $fetch_info['country'] == 'EGYPT' || $fetch_info['country'] == 'egypt') {
												echo "£E ".$fetch_info['fund'] * 0.239;
											}
											else if($fetch_info['country'] == 'Hungary' || $fetch_info['country'] == 'HUNGARY' || $fetch_info['country'] == 'hungary') {
												echo "Ft".$fetch_info['fund'] * 5.339;
											}
											else if($fetch_info['country'] == 'Iraq' || $fetch_info['country'] == 'IRAQ' || $fetch_info['country'] == 'iraq') {
												echo "ID ".$fetch_info['fund'] * 17.699;
											}
											else if($fetch_info['country'] == 'Japan' || $fetch_info['country'] == 'JAPAN' || $fetch_info['country'] == 'japan') {
												echo "¥ ".$fetch_info['fund'] * 1.766;
											}
											else if($fetch_info['country'] == 'Kazakhstan' || $fetch_info['country'] == 'KAZAKHSTAN' || $fetch_info['country'] == 'kazakhstan') {
												echo "₸".$fetch_info['fund'] * 5.755;
											}
											else if($fetch_info['country'] == 'Malaysia' || $fetch_info['country'] == 'MALAYSIA' || $fetch_info['country'] == 'malaysia') {
												echo "RM ".$fetch_info['fund'] * 0.056;
											}
											else if($fetch_info['country'] == 'Mongolia' || $fetch_info['country'] == 'MONGOLIA' || $fetch_info['country'] == 'mongolia') {
												echo "₮".$fetch_info['fund'] * 40.739;
											}
											else if($fetch_info['country'] == 'New Zealand' || $fetch_info['country'] == 'NEW ZEALAND' || $fetch_info['country'] == 'new zealand') {
												echo "$".$fetch_info['fund'] * 0.022;
											}
											else if($fetch_info['country'] == 'South Africa' || $fetch_info['country'] == 'SOUTH AFRICA' || $fetch_info['country'] == 'south africa') {
												echo "R".$fetch_info['fund'] * 0.220;
											}
											else if($fetch_info['country'] == 'South Korea' || $fetch_info['country'] == 'SOUTH KOREA' || $fetch_info['country'] == 'south korea') {
												echo "₩".$fetch_info['fund'] * 17.299;
											}
											else {
												echo $fetch_info['fund'];
											}
											
									}
									else {
										echo O;
									}
									?></h2>
									<br>
							<p>Available Fund</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
					<span class="progress" data-value="100%"></span>
					<span class="label">100%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2><?php if($fetch_info['totalprofit'] != '') {
										echo $fetch_info['totalprofit'];
									}
									else {
										echo "0";
									}
									?></h2>
									<br>
							<p>Total Profit</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
					<span class="progress" data-value="0%"></span>
					<span class="label">0%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2><?php if($fetch_info['investedamount'] != '') {
							          echo $fetch_info['investedamount'];
									}
									else {
										echo 0;
									}
									?></h2>
									<br>
							<p>Invested Capital</p>
						</div>
						
						<i class='fluent:currency-dollar-rupee-24-filled' ></i>
					</div>
					<span class="progress" data-value="0%"></span>
					<span class="label">0%</span>
				</div>
			</div>
			</div>
			<div class="crud-oper">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<input type="search" placeholder="Search Stocks"  name="searching" class="srch">
						<button type="submit" class="search-btn" name="searchbtn">Search</button>
					</form>
					<br><br>
					<?php
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							$searchinp = $_POST["searching"];
							$results = mysqli_query($con, "SELECT * FROM stocklist WHERE symbol LIKE '%$searchinp%'");
						}
						else {
							$results = mysqli_query($con, "SELECT * FROM stocklist");
						}	
					?>
					<?php while ($row = mysqli_fetch_array($results)) { ?>
							<div class="card">
								<div class="head">
									<div>
										<h1 style="color:black;font-size: 24px"><?php echo $row['symbol']; ?></h1><br>
										<h3 style="color:green;font-size:28px"><?php echo $row['close']; ?></h3>
										<br>
									</div>
									<a href="watchlistconfig.php?addid=<?php echo $row['id']; ?>" class="fav_btn" > + </a>
									
								</div>
								<p style="color:grey;font-weight: bold">NSE</p>
							</div>
					<?php } ?>
				</div>
			
			<br><br>
			<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_0c158"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/NASDAQ-AAPL/" rel="noopener" target="_blank"></div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": "100%",
  "height": "700px",
  "symbol": "NASDAQ:AAPL",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "light",
  "style": "2",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": true,
  "allow_symbol_change": true,
  "container_id": "tradingview_0c158"
}
  );
  </script>
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->
	
	<script src="css/new/script.js"></script>
</body>
</html>