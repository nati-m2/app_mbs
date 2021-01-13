
<html>
<head>
</head>
    <body>
    

<form action="test.php" method="post" enctype="multipart/form-data"> 
<p>  Select Folder to Upl11111:</p>  <input type="file" name="files[]" id="files"  directory="" webkitdirectory="" moxdirectory="" multiple><br/><br/> 
  <input type="Submit" value="Upload" name="upload" />
  </form>


  <form action="test.php" method="post" enctype="multipart/form-data" >
 <p> Select file to upload:</p>
  <input type="file" name="fileToUpload" id="fileToUpload" directory="" webkitdirectory="" moxdirectory="" multiple />
  <input type="submit" value="Upload folder" name="submit">
</form>


  <?php
  /*	if($_POST['foldername'] != "")
  	{*/  //$_POST['foldername'];
  		$foldername="Media_Library/"; // Media_Library/user
  		if(!is_dir($foldername)) mkdir($foldername);
  		foreach($_FILES['fileToUpload']['name'] as $i => $name){
  		    if(strlen($_FILES['fileToUpload']['name'][$i]) > 1){
				$FileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
				if($FileType != "mp3" && $FileType != "wav" && $FileType != "m4a") {
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
				  echo " <br>מעתיק:".$name;
				//move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$name);
				$user=$_SESSION["login"];
			
              }
              echo " <br>מעתיק:".$name;
  		}
  		//echo "Folder is successfully uploaded";
  	
  	//else
  	  //  echo "Upload folder name is empty";
  


  //header("Location:upload.php");

  ?>
</body>
</html>