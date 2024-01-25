<?php
require "connection.php";
if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
				$sql = "UPDATE stocklist SET open='".$getData[1]."',dayhigh='".$getData[2]."',daylow='".$getData[3]."',close='".$getData[4]."',prevclose='".$getData[5]."' WHERE symbol='".$getData[0]."'";
				$result = mysqli_query($con, $sql);
				if(!isset($result)) {
					echo "<script type=\"text/javascript\">
					alert(\"Invalid File:Please Upload CSV File.\");
					window.location.href = 'updatestockdetail.php';
					</script>";    
				}
				else {
					$query = "UPDATE watchlist SET open='".$getData[1]."',high='".$getData[2]."',low='".$getData[3]."',close='".$getData[4]."',prevclose='".$getData[5]."' WHERE stocksymbol='".$getData[0]."'";
					$reslt = mysqli_query($con, $query);
					if($reslt) {
						echo "<script type=\"text/javascript\">
						alert(\"CSV File has been successfully Imported.\");
						window.location.href = 'updatestockdetail.php';
						</script>";
					}
					
				}
           }
      
           fclose($file);
     }
  } 
 ?>