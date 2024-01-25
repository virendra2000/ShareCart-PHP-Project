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
	<title><?php echo $fetch_info['name'] ?> | Manage Stock Record</title>
	<style>
		.crud-oper {
			margin: 100px 250px;
			width: 150vh;
			display:block;
			padding: 100px 100px;
		}
		
		.crud-oper .srch {
			width: 70%;
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
	</style>
</head>
<body>
	<div class="crud-oper">
		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<input type="search" placeholder="Search"  name="searching" class="srch">
			<button type="submit" class="search-btn" name="searchbtn">Search</button>
		</form>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$searchinp = $_POST["searching"];
				$results = mysqli_query($con, "SELECT * FROM stocklist WHERE stockname LIKE '%$searchinp%' OR stocksymbol LIKE '%$searchinp%'");
			}
			else {
				$results = mysqli_query($con, "SELECT * FROM stocklist");
			}
		?>
		<table class="record">
    <thead>
        <tr>
            <th>Stock Name</th>
            <th>Stock Symbol</th>
			<th>Price</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    
    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['stockname']; ?></td>
            <td><?php echo $row['stocksymbol']; ?></td>
			<td><?php echo $row['price']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
	</div>
</body>
</html>