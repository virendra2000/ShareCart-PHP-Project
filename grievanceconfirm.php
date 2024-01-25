<?php
session_start();
?>
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
<style>
	@import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
	.main-content {
	padding-top: 100px;
	padding-bottom: 100px;
}

.table {
	border-spacing: 0 15px;
	border-collapse: separate;
}
.table tr th,
.table tr td,
.table tr th,
.table tr td {
	vertical-align: middle;
	border: none;
}
.table tr th:nth-last-child(1),
.table tr td:nth-last-child(1),
.table tr th:nth-last-child(1),
.table tr td:nth-last-child(1) {
	text-align: center;
}
.table tr {
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
	border-radius: 5px;
	background: rgb(2,0,36);
	background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
}
.table tr td {
	background: transparent;
	padding : 15px 40px;
}
.table tr td:nth-child(odd) {
	border-radius: 5px 0 0 5px;
	color: #fff;
	font-weight: bold;
}
.table tr td:nth-child(even) {
	color: #fff;
	text-align: right;
	font-weight: bold;
}

#Timer {
	font-size: 18px;
	font-weight: bold;
}


</style>
</head>
<body onload="waitFiveSec()">
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
                <li><a href="contact.php" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
	
	<section class="main-content">
		<div class="container">
		<br><br><br>
			<h1 align="center">Grievance Confirmation Page</h1>
			<br>
			<br>
			<center>
			<div id="Timer"></div><br><br>
			<script>
			var timeLeft = 30;
var elem = document.getElementById('Timer');

var timerId = setInterval(countdown, 1000);

function countdown() {
  if (timeLeft == 0) {
    clearTimeout(timerId);
    doSomething();
  } else {
    elem.innerHTML = 'Note :) This Page will exit after ' +timeLeft + ' seconds . So copy the Token or Transaction ID before page exits';
    timeLeft--;
  }
}
			</script>
			
			<img src="images/loader.gif" width="130px" height="150px">
			<table class="table">
					<tr>
						<td>
							Token ID
						</td>
						<td><?php echo $_SESSION['info']; ?></td>
					</tr>
					<tr>
						<td>Sender Email</td>
						<td><?php echo $_SESSION['email']; ?></td>
					</tr>
					<tr>
						<td>Sender Name</td>
						<td><?php echo $_SESSION['name']; ?></td>
					</tr>
					<tr>
						<td>Subject</td>
						<td><?php echo $_SESSION['subj']; ?></td>
					</tr>
					<tr>
						<td>Message</td>
						<td><?php echo $_SESSION['msg']; ?></td>
					</tr>
			</table></center>
		</div>
	</section>
	<script>
         setTimeout(function(){
            window.location.href = 'contact.php';
         }, 30000);
    </script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
