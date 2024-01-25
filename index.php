<?php require_once "controllerUserData.php"; ?>
<?php
	if (isset($_SESSION['email'])) {
        header('Location: userdashboard.php');
    }
?>
<?php
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];  
    }  
    //if user is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];  
    }  
    //if user is from the remote address  
    else{  
        $ipaddress = $_SERVER['REMOTE_ADDR'];  
    }
	$resultset_1 = mysqli_query($con,"select id from analysisofportal where ipaddress='".$ipaddress."'");
	$count = mysqli_num_rows($resultset_1);
	if($count == 0)
    {
       $resultset_2 = mysqli_query("INSERT INTO analysisofportal(ipaddress) VALUES ('".$ipaddress."')");
    }else{
       
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareCart - Learn Online Trading System</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="style3.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
</head>
<body>
	</script>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo">
                  <img src="images/logo.png" width="80px" height="80px">
              </div>
            <ul class="menu">
                <li><a href="#home" class="menu-btn">Home</a></li>
                <li><a href="about.php" class="menu-btn">About</a></li>
				<li><a href="download.php" class="menu-btn">Download</a></li>
				<li><a href="services.php" class="menu-btn">Services</a></li>
				<li><a href="tradingholidays.php" class="menu-btn">Holidays</a></li>
                <li><a href="contact.php" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    <!-- home section start -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-3">ShareCart</div>
				<div class="text-1">Learn Online Trading System</div>
                <a href="login-user.php">Sign In</a>
                <a href="signup-user.php">Register</a>
            </div>
        </div>
    </section>
		

<!-- TradingView Widget END -->
	<script src="https://apps.elfsight.com/p/platform.js" defer></script>
	<div class="elfsight-app-b9b8f797-6daa-4937-bf79-142214adc6f6"></div>
	<section class="services" id="services">
        <div class="max-width">
            
            <h2 class="title">Objective</h2>
            <div class="serv-content">
                <div class="card">
                    <div class="box">
                        <i class="fas fa-check-circle fa-4x icon"></i><br><br>
                        <div class="text">Easy to Use</div>
						<p>So easy to use, even beginer can learn option trading.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fa fa-bullseye"></i><br><br><br>
                        <div class="text">Realtime Data</div>
						<p>Option data refresh every second*.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <i class="fa fa-link"></i><br><br>
                        <div class="text">Option chain</div>
						<p>Detailed option chain to analyze market situation</p>
                    </div>
                </div>
				<div class="card">
                    <div class="box">
                        <i class="fas fa-shopping-basket fa-4x icon"></i><br><br>
                        <div class="text">Basket order</div>
						<p>A basket order allows you to place multiple orders at the same time.</p>
                    </div>
                </div>
				<div class="card">
                    <div class="box">
                        <i class="fas fa-calendar-day fa-4x icon"></i><br><br>
                        <div class="text">Monthly summary</div>
						<p>Detailed summary of each month trading performance with profit, charges & net profit.</p>
                    </div>
                </div>
				<div class="card">
                    <div class="box">
                        <i class="fas fa-heart fa-4x icon"></i><br><br>
                        <div class="text">Guaranteed to work.</div>
						<p>Created by trader's for trader's with love.</p>
                    </div>
                </div>
               </div>
            </div>
        </div>
    </section>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-f9072bdb-a91e-42e5-bc24-a840017f4870"></div>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-d09f5a30-8474-48e4-b0bb-613689b5251b"></div>

	<!--TKFG5QVXPUVPHFVY-->
    <!-- footer section start -->
    <footer>
        <span>Created By The ShareCart Team</a> | <span class="far fa-copyright"></span> 2022 All rights reserved.</span>
        <center><b>
            <p id="demo"></p>
            <script>
            var d = new Date();
                document.getElementById("demo").innerHTML = d;
            </script></b></center>
    </footer>
    <script src="script.js"></script>
	<script language="javascript" type="text/javascript">
		window.history.forward();
        function noBack() {
            window.history.forward();
        }
	</script>
</body>
</html>
