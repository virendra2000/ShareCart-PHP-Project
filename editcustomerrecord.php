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
		
		.crud-oper .textedit {
			width: 50%;
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
			<h1 class="title">Update Customer Record</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="admindashboard.php">Dashboard</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Customer Section</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Edit</a></li>
				
			</ul>
			<?php
				include'connection.php';
				$id = $_GET['edit'];
				$sql = "SELECT * FROM usertable WHERE id=$id";
				$result=mysqli_query($con,$sql);
				if($result) {
					$fetch = mysqli_fetch_assoc($result);
				}
				else {
					die(mysqli_error($con));
				}
				if (isset($_POST['submit'])) {
					$name = $_POST["name"];
					$email = $_POST["email"];
					$phoneno = $_POST["phoneno"];
					$mobileno = $_POST["mobileno"];
					$addr1 = $_POST["add1"];
					$addr2 = $_POST["add2"];
					$city = $_POST["city"];
					$pincode = $_POST["citycode"];
					$country = $_POST["country"];
					$results = mysqli_query($con, "UPDATE usertable SET name='$name',email='$email',phone='$phoneno',mobile='$mobileno',address1='$addr1',address2='$addr2',city='$city',pincode='$pincode',country='$country' WHERE id=$id");
					if($result) {
						header('location: admindashboard.php');
					}
				}
			?>
			<div class="crud-oper">
					<form method="post">
						<label>Name</label>&nbsp
						<input type="text" placeholder="Name"  name="name" class="textedit" value="<?php echo $fetch['name']; ?>"><br><br>
						<label>Email</label>&nbsp
						<input type="email" placeholder="Email"  name="email" class="textedit" value="<?php echo $fetch['email']; ?>"><br><br>
						<label>Phone No. / Telephone No.</label>&nbsp
						<input type="text" placeholder="Telephone No"  name="phoneno" class="textedit" value="<?php echo $fetch['phone']; ?>"><br><br>
						<label>Mobile No.</label>&nbsp
						<input type="text" placeholder="Mobile Number"  name="mobileno" class="textedit" value="<?php echo $fetch['mobile']; ?>"><br><br>
						<label>Address Line 1</label>&nbsp
						<input type="text" placeholder="Enter Address Line 1"  name="add1" class="textedit" value="<?php echo $fetch['address1']; ?>"><br><br>
						<label>Address Line 2</label>&nbsp
						<input type="text" placeholder="Enter Address Line 2"  name="add2" class="textedit" value="<?php echo $fetch['address2']; ?>"><br><br>
						<label>City</label>&nbsp
						<input type="text" placeholder="Enter City"  name="city" class="textedit" value="<?php echo $fetch['city']; ?>"><br><br>
						<label>Pincode</label>&nbsp
						<input type="text" placeholder="Enter Pincode"  name="citycode" class="textedit" value="<?php echo $fetch['pincode']; ?>"><br><br>
						<label>Country</label>&nbsp
						<input type="text" placeholder="Enter Country"  name="country" class="textedit" value="<?php echo $fetch['country']; ?>"><br><br>
						
						<button type="submit" class="search-btn" name="submit">Update</button>
					</form>
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