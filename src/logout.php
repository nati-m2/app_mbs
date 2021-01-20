<?php
session_start();
 if(isset($_SESSION["login"])){
unset($_SESSION["login"]);
  echo" <script> location.replace('index.php'); </script>";
}
?>