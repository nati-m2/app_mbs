<?php
if(!isset($_COOKIE["login"])) {
    echo" <script> location.replace('login.php'); </script>";
  }
  include 'sqli.php';
  $user = $_COOKIE["login"];
  $query=" DELETE FROM `song_t` where  user_n  LIKE '". $user."' ";
  mysqli_query($connect,$query);
  $query=" DELETE FROM `user` where  `firstname`  LIKE '". $user."' ";
  mysqli_query($connect,$query);
  rrmdir("Media_Library/music/".$user);
  rrmdir("Media_Library/photos/".$user);
  function rrmdir($dir) {
    if (is_dir($dir)) {
      $objects = scandir($dir);
      foreach ($objects as $object) {
        if ($object != "." && $object != "..") {
          if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
        }
      }
      reset($objects);
      rmdir($dir);
    }
 }
 setcookie("login", "", time() - 3600);
 echo" <script> location.replace('index.php'); </script>";


?>