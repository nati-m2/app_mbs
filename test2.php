<?php

if(isset($_GET['Address'])){
session_start();
if(isset($_SESSION["target"])){
    $_SESSION["target"]=$_GET['Address'];
    header("Location: play.php");
    }
}
?>