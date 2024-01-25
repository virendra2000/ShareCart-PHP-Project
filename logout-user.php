<?php
session_start();
session_unset();
session_destroy();
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Logout</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="logout.css">
    <script language="javascript" type="text/javascript">
		window.history.forward();
        function noBack() {
            window.history.forward();
        }
	</script>
</head>

<body ng-app="logout" ng-controller="logoutController" onload="waitFiveSec()">
	<div class="background-photo">
		<div class="jumbotron">
			<div class="container">
				<h1>See you soon!</h1>
			</div>

		</div>
		<div class="middle-block">
		</div>
		<div class="second">
			<div class="container">
				<div class="col-xs-12 col-sm-6">
				
          <div class="row">
            <div class="right-text">
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
					elem.innerHTML = 'Note :) This Page will exit after ' +timeLeft + ' seconds .';
					timeLeft--;
				}
			}
			</script>
						Thank You For Using Sharecart , We hope you liked it.
						<script>
							setTimeout(function(){
							window.location.href = 'login-user.php';
							}, 30000);
						</script>
					</div>
          </div>
          <div class="row">
						
				</div>
			</div>
		</div>
	</div>
	</div>
    
</body>

</html>