<?php

include "php_func/phpFunction.php"; 
if(isset($_COOKIE["login"])) {
 
$target_dir = "Media_Library/music/".$_COOKIE["login"]."/";
$target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
/*if(!isset($_POST["submit"])) {

  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an song - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an song.";
    $uploadOk = 0;
  }
}*/

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}
 //pull_set("max_file_size")){  //10000000 //pull from settings maxsimun file size
// Check file size (10 mb)
if ($_FILES["fileToUpload"]["size"] > 10000000) { 
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($FileType != "mp3" && $FileType != "wav" && $FileType !="m4a" ) {
  echo "Sorry, only mp3 and amr files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file                     ///$target_file = Media_Library/s.mp3     ||Media_Library/admin/s.mp3  
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    $user=$_COOKIE["login"];
    insert_song_t($_FILES["fileToUpload"]["name"],$user);
    echo"<script> alert(' הקובץ עלה למערכת בהצלחה'); </script>" ;
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
  

}
}
echo" <script> location.replace('upload.php'); </script>";
?>
