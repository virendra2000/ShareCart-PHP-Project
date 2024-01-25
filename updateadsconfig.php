<?php
	require_once 'connection.php';
	if (isset($_POST['submit'])) {
		if(!empty($_FILES["image"]["name"])) { 
			// Get file info
			$fileName = basename($_FILES["image"]["name"]); 
			$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
			// Allow certain file formats 
			$allowTypes = array('jpg','png','jpeg'); 
			if(in_array($fileType, $allowTypes)){ 
				$image = $_FILES['image']['tmp_name'];
				$imgContent = addslashes(file_get_contents($image));
				// Insert image content into database
				$name = $_POST["cname"];
				$id=$_POST["adid"];
				$cmdesc = $_POST["cbtndesc"];
				$btnname = $_POST["btnname"];
				$btnlink = $_POST["btnlink"];
				$sql = "UPDATE ads SET campaignname='$name',campaigndesc='$cmdesc',campaignbtnname='$btnname',campaignbtnlink='$btnlink' WHERE id=$id";
				$run_Sql = mysqli_query($con, $sql);
				if($run_Sql){ 
					$status = 'success'; 
					$statusMsg = "Campaign Updated successfully.";
					header('location: manageads.php');
				}
				else { 
					$statusMsg = "Campaign Failed to Create"; 
				}  
			}
			else { 
				$statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.'; 
			}
		}
		else{ 
			$statusMsg = 'Please select an image file to upload.'; 
		}
	}
	else {
		echo "Unable to Submit the data";
	}
?>