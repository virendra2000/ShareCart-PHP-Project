<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareCart | Services</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>

</head>
<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
          <div class="logo">
                <img src="images/logo.png" width="80px" height="80px">
            </div>
            <ul class="menu">
                <li><a href="index.php" class="menu-btn">Home</a></li>
                <li><a href="about.php" class="menu-btn">About</a></li>
				<li><a href="download.php" class="menu-btn">Download</a></li>
                <li><a href="#" class="menu-btn">Services</a></li>
				<li><a href="tradingholidays.php" class="menu-btn">Holidays</a></li>
                <li><a href="contact.php" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <section class="services" id="services">
        <div class="max-width">
            <br><br><br><br><br><br>
            <h2 class="title">Services</h2>
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
</body>
</html>
