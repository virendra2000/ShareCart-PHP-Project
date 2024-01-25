<?php require_once "controllerUserData.php"; ?>
<?php
	require 'connection.php';
	if(isset($_GET['addid']))  {
		$email = $_SESSION['email'];
		$id = $_GET['addid'];
		$sqlquery = "SELECT * FROM usertable WHERE email='$email'";
		$queryres = mysqli_query($con,$sqlquery);
		if($queryres) {
			$fetcher = mysqli_fetch_assoc($queryres);
			$name = $fetcher['name'];
			$sql = "SELECT * FROM stocklist WHERE id = $id";
			$result=mysqli_query($con,$sql);
			if($result) {
				$fetch = mysqli_fetch_assoc($result);
				$query = "INSERT INTO watchlist(username,stocksymbol,open,high,low,close,prevclose) VALUES('".$name."','".$fetch['symbol']."','".$fetch['open']."',
							'".$fetch['dayhigh']."','".$fetch['daylow']."','".$fetch['close']."','".$fetch['prevclose']."')";
				$res=mysqli_query($con,$query);
				if($res) {
					header('location: userdashboard.php');
				}
			}
			else {
				die(mysqli_error($con));
			}
		}
	}
?>