<?php

if(isset($_COOKIE["login"])) {
  setcookie("login", "", time() - 3600);
  echo" <script> location.replace('index.php'); </script>";
}
?>