<?php
/* deise logic*/
include "php_func\phpFunction.php";

if(isset($_GET['Address']  )){
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $Address= $_GET['Address'];
    $task= "on";
    $name= "play";
    $song_n = "";
    insert_task($name,$task,$Address,$song_n);
   // header("Location:index.php");
    }
    unset($_SESSION["task"]);
}

if(isset($_GET['song_id'])){
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'GET'){ 
    $Address=get_ip();
    $task= "on";
    $name= "play";
    $song_n = $_GET['song_id'];
    insert_task($name,$task,$Address,$song_n);
    header("Location:main.php");
    }
    unset($_SESSION["task"]);
}
?>