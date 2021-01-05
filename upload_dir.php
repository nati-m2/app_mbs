<?php
include "php_func\phpFunction.php"; 
$it=(int)pull_set("maxfile");
  if(isset($_POST['upload']))
  {
  /*	if($_POST['foldername'] != "")
  	{*/  //$_POST['foldername'];
  		$foldername="Media_Library/"; // Media_Library/user
  		if(!is_dir($foldername)) mkdir($foldername);
  		foreach($_FILES['files']['name'] as $i => $name)
		{
  		    if(strlen($_FILES['files']['name'][$i]) > 1){
				$FileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
				if($FileType != "mp3" && $FileType != "wav") {
					echo "Sorry, only mp3 and amr files are allowed.";
					continue;
				  }
				  if (file_exists($name)) {
					echo "Sorry, file already exists.";
					continue;
				  }
				 
				  if (filesize($name) > $it) {  //pull_set("max_file_size")){  //10000000 //pull from settings maxsimun file size
					echo "Sorry, your file is too large.";
					continue;
				  }
				   echo "<br>";
				move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
  		    }
  		}
  		echo "Folder is successfully uploaded";
  	
  	//else
  	  //  echo "Upload folder name is empty";
  }
  header("Location:upload.php");
  ?>