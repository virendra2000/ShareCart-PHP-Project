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
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

button {
	padding: 18px 45px;
	color: white;
	outline: none;
	border: 0px;
	cursor: pointer;
	background-color: blue;
	font-size: 16px;
	font-weight: bold;
	border-radius: 28px;
}

button:hover {
	background-color : white;
	color: blue;
	border: 2px solid blue;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
	</style>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="images/logo.png" width="50px" height="50px">&nbsp&nbsp ShareCart</a>
		<ul class="side-menu">
			<li><a href="admindashboard.php"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li><a href="managerequest.php"><i class='bx bx-git-pull-request icon' ></i>Manage Request</a></li>
			<li><a href="insertstockdetail.php"><i class='bx bx-import icon' ></i> Import Stock Detail</a></li>
			<li><a href="createads.php" class="active"><i class='bx bx-image-add icon' ></i>Create Ads</a></li>
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
			<h1 class="title">Create Advertisement</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="admindashboard.php">Create Ads</a></li>
				
			</ul>
			
			<div class="crud-oper">
					<form method="POST" action="createadsconfig.php" enctype="multipart/form-data">
						<label>Campaign Name</label>&nbsp
						<input type="text" placeholder="Enter Campaign Name"  name="cname" class="textedit"><br><br>
						<label>Campaign Description</label>&nbsp
						<input type="text" placeholder="Enter Campaign Description"  name="cbtndesc" class="textedit"><br><br>
						<label>Campaign Button Name</label>&nbsp
						<input type="text" placeholder="Enter Campaign Button Name"  name="btnname" class="textedit"><br><br>
						<label>Campaign Link</label>&nbsp
						<input type="text" placeholder="Enter Campaign Link"  name="btnlink" class="textedit"><br><br>
						<label>Upload Ad</label><br><br>
						<div class="upload-btn-wrapper"> 
							<button>UPLOAD</button>
							<input type="file" name="image" id="imgloc" accept="image/*">
						</div> 
						<br><br>
						<button type="submit" name="submit">Create</button>
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