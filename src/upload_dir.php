<?php
include "php_func/phpFunction.php"; 


if(isset($_COOKIE["login"])) {
$it=(int)pull_set("maxfile");
  if(isset($_POST['upload']))
  {
  /*	if($_POST['foldername'] != "")
  	{*/  //$_POST['foldername'];
		  $foldername="Media_Library/music/"; //Media_Library/music/user
		  									//Media_Library/photos/user
  		if(!is_dir($foldername)) mkdir($foldername);
  		foreach($_FILES['files']['name'] as $i => $name){

  		    if(strlen($_FILES['files']['name'][$i]) > 1){
				$FileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
				if($FileType != "mp3" && $FileType != "wav" && $FileType != "m4a") {
					echo "Sorry, only mp3 and amr files are allowed.";
					break;
				  }
				  if (file_exists($name)) {
					echo "Sorry, file already exists.";
					break;
				  }
				 
				  if (filesize($name) > $it) {  //pull_set("max_file_size")){  //10000000 //pull from settings maxsimun file size
					echo "Sorry, your file is too large.";
					break;
				  }
				  echo " <br>מעתיק:".$name;
				  $user=$_COOKIE["login"];
				if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$user."/".$name)){		// :bool
					insert_song_t($name,$user);
				}
  		    }
  		}
  		echo "Folder is successfully uploaded";
  	
  	//else
  	  //  echo "Upload folder name is empty";
  }

}
echo" <script> location.replace('upload.php'); </script>";


  ?>