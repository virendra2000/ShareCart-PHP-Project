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
<style>
.crud-oper {
	margin: 150px 175px;
	width: 150vh;
	display: inline-block;
	padding: 50px 50px;
}
.crud-oper .record {
	margin-top : 40px;
	border: 1px solid white;
	border-collapse: collapse;
}
.crud-oper .record th {
	background: blue;
	padding: 20px;
	color: white;
}
.crud-oper .record td {
	padding: 20px;
	align-items: center;
	justify-content: centerl;
	border: 1px solid grey;
	color: black;
}
</style>
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
                <li><a href="services.php" class="menu-btn">Services</a></li>
				<li><a href="tradingholidays.php" class="menu-btn">Holidays</a></li>
                <li><a href="contact.php" class="menu-btn">Contact</a></li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

   <div class="crud-oper">
					<h1 align="center">Trading Holiday for 2022</h1>
					<?php
						require_once "controllerUserData.php";
						$results = mysqli_query($con, "SELECT * FROM tradingholiday");
					?>
					<?php if (mysqli_num_rows($results) > 0) { ?>
					<table class="record">
						<thead>
							<tr>
								<th>Sr No.</th>
								<th>Festival Name</th>
								<th>Date</th>
								<th>Day</th>
								<th>Morning Session ( 9am to 5pm)</th>
								<th>Evening Session ( 9am to 12am)</th>
							</tr>
						</thead>
						<tr>
						<?php while ($row = mysqli_fetch_array($results)) { ?>
							<td style="color:black;font-weight:bold"><?php echo $row['id']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['festivalname']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['Date']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['Day']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row['morningsession']; ?></td>
							<td style="color:black;font-weight:bold"><?php echo $row["eveningsession"]; ?></td>
						</tr>
						<?php } 
					}
					else {
						echo "<article>
		<h1>We&rsquo;ll be back soon!</h1>
		<div>
			<br>
			<p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you can always <a href='mailto:teminiproject@gmail.com'>contact us</a>, otherwise we&rsquo;ll be back online shortly!</p>
			<br><p>&mdash; The ShareCart Team</p>
		</div>
	</article>";
					}?>
						</table>
				</div>

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
