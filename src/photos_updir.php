<?php
include "php_func/phpFunction.php"; 


if(isset($_COOKIE["login"])) {
    $user=$_COOKIE["login"];
$it=(int)pull_set("maxfile");
  if(isset($_POST['upload'])){

		$foldername="Media_Library/photos/"; //Media_Library/music/user
		  									//Media_Library/photos/user
  		if(!is_dir($foldername)) mkdir($foldername);
  		foreach($_FILES['files']['name'] as $i => $name){

  		    if(strlen($_FILES['files']['name'][$i]) > 1){
				$FileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
				if($FileType != "jpg" && $FileType != "png" && $FileType != "jpeg"&& $FileType != "gif") {
					$uploadOk = 0;
				}
				if (file_exists($name)) {
					// Use unlink() function to delete a file  
					if (!unlink($name)) {  
						echo"<script> alert('קיים קובץ עם אותו שם בתיקיית תמונות'); </script>" ;
						$uploadOk = 0;
					}  
				}
				 
				  if (filesize($name) > $it) {  
					echo "Sorry, your file is too large.";
					break;
				  }	
		       if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$user."/".$name)){
				insert_picture($name,$user);
			   }
  		    }
  		}
  	        echo"<script> alert('התקייה עלתה למערכת בהצלחה'); </script>" ;
  	
  	//else
  	  //  echo "Upload folder name is empty";
  }

}
echo" <script> location.replace('upload.php'); </script>";


  ?>