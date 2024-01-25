<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareCart | About</title>
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
                <li><a href="#" class="menu-btn">About</a></li>
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


    <!-- about section start -->
    <section class="about" id="about">
        <div class="max-width">
			<br><br>
            <h2 class="title">About me</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="images/library.png" alt="">
                </div>
                <div class="column right">
                    <div class="text">Features<span class="typing-2"></span></div>
					<ul type="dot">
						<li>This project aims to use Data structure, Database, Android Development and Algorithmic knowledge for developing convenient platform(like real trading environment) which will leads to improvement in option trading strategies (Positional) without fear of loosing money.</li><br>
						<li>In this System , User will no need to invest their money . After registering, a virtual money will be allocated to him to invest in market share of any company.</li><br>
						<li>User will invest their money and buy any company share before opening the market . Then While market hour when trading start the application will check share invested by the user with real market price. After closing market , If user get profit from that share he will sell the shares.</li><br>
						<li>This Virtual NSE Options Trading Service is a free-trading app that can be used to trade virtual NSE Options on Android. There is no need for purchasing any additional hardware or subscription fees.</li><br>
						<li>It is ideal for both beginners and intermediate options traders. You can trade using NSE real-time trading data and real-time prices.</li><br>
					</ul>
                </div>
            </div>
        </div>
    </section>

    <!-- footer section start -->
    <footer>
        <span>Created By The ShareCart Team</a> | <span class="far fa-copyright"></span> 2021 All rights reserved.</span>
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
