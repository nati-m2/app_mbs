<?php
include "php_func/upload_func.php"; 
if(isset($_COOKIE["login"])){
  if(isset($_POST['up'])){
    //music
    if($_POST['up']=="upfile_music"){
      upload_file($_FILES["fileToUpload"],$_COOKIE["login"],"music");
      echo"<script> location.replace('index.php'); </script>";
      exit;
    }
    //music dir
    if($_POST['up']=="updir_music"){
      upload_dir($_FILES['files'],$_COOKIE["login"],"music");
      echo"<script> location.replace('index.php'); </script>";
      exit;
    }
  //img
    if($_POST['up']=="upfile_img"){
      upload_file($_FILES["fileToUpload"],$_COOKIE["login"],"photos");
      echo"<script> location.replace('photos.php'); </script>";
      exit;
    }
  //img dir
    if($_POST['up']=="updir_img"){
      upload_dir($_FILES['files'],$_COOKIE["login"],"photos");
      echo"<script> location.replace('photos.php'); </script>";
      exit;
    }
  }
}else{
  echo"<script> location.replace('index.php'); </script>";
}


?>
