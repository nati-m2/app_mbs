<?php
include "php_func/phpFunction.php";
    if(isset($_GET['id']) && isset($_GET['val'])){
        $id=$_GET['id'];
        $val=$_GET['val'];
        update_set($id,$val);
      echo" <script> location.replace('profile.php'); </script>";
    }
?>
