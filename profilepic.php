<?php 
// Include the database configuration file
require_once "controllerUserData.php";  
require_once 'connection.php';
$email = $_SESSION['email'];
$password = $_SESSION['password'];
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
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
            $sql = "UPDATE usertable SET profilepic = '$imgContent' WHERE email = '$email'";
			$run_Sql = mysqli_query($con, $sql);
             
            if($run_Sql){ 
                $status = 'success'; 
                $statusMsg = "Image uploaded successfully.";
				header('location: my profile view.php');
				
            }else{ 
                $statusMsg = "Image upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>