<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShareCart | Contact</title>
    <link rel="shortcut icon" type="image/png" href="images/logo.png">
    <link rel="stylesheet" href="css/style2.css">
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
				<li><a href="download.php">Download</a></li>
                <li><a href="services.php" class="menu-btn">Services</a></li>
				<li><a href="tradingholidays.php" class="menu-btn">Holidays</a></li>
                <li><a href="#" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>


    <!-- contact section start -->
    <section class="contact" id="contact">
        <div class="max-width">
          <br><br>
            <br><br>
            <h2 class="title">Contact me</h2>
            <div class="contact-content">
                <div class="column left">
                    <div class="text">Get in Touch</div>
                    <div class="icons">
                        <div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Project Manager</div>
                                <div class="sub-title">Virendra Kalwar</div>
                            </div>
                        </div>
						<div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">2nd Unit Project Manager</div>
                                <div class="sub-title">Gaurav Kotecha</div>
                            </div>
                        </div>
						<div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">Project Developer</div>
                                <div class="sub-title">Shweta Torane</div>
                            </div>
                        </div>
						<div class="row">
                            <i class="fas fa-user"></i>
                            <div class="info">
                                <div class="head">2nd Unit Project Developer</div>
                                <div class="sub-title">Shruti Chavan</div>
                            </div>
                        </div>
                        <div class="row">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="info">
                                <div class="head">Address</div>
                                <div class="sub-title">Kamothe , New Sion-Panvel Expressway ,  Navi Mumbai</div>
                            </div>
                        </div>
						<br><br>
                        <div class="row">
                            <i class="fas fa-envelope"></i>
                            <div class="info">
                                <div class="head">Email</div>
                                <div class="sub-title">vkalwar132000@gmail.com</div>
								<div class="sub-title">shrutichavan2110@gmail.com</div>
								<div class="sub-title">gauravkotecha22@gmail.com</div>
								<div class="sub-title">shweta.torane.79@gmail.com</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column right">
                    <div class="text">Message me</div>
                    <form action="contactconfig.php" method="POST" autocomplete="">
                        <div class="fields">
                            <div class="field name">
                                <input type="text" name="sendername" placeholder="Name" required>
                            </div>
                            <div class="field email">
                                <input type="email" name="senderemail" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="field">
                            <input type="text" name="sendersubj" placeholder="Subject" required>
                        </div>
                        <div class="field textarea">
                            <textarea cols="30" rows="10" name="sendermsg" placeholder="Message.." required></textarea>
                        </div>
                        <div class="button">
                            <button type="submit" name="grievancesubmit">Send Message</button>
                        </div>
                    </form>
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
