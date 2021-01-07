<?php
/* deise logic*/
include "php_func\phpFunction.php";
session_start();
if(isset($_GET['song_id'])) {
  //$song_id=$_GET['song_id'];
  $_SESSION['song_id']=$_GET['song_id'];
 // header("Location:main.php");
}
if(isset($_GET['Address'])){
  $_SESSION['$Address']=$_GET['Address'];  
//  header("Location:index.php");
}

/**  צריך למצא דרך יותר יעילה לישמור את הנתונים שנשלחים לטבלת משימות  */
if(isset($_SESSION['$Address'])&& isset($_SESSION['song_id'])) {
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'GET'){ 
    $Address= $_SESSION['$Address'];
    $task= "on";
    $name= "play";
    $song_n = $_SESSION['song_id'];
    insert_task($name,$task,$Address,$song_n);
   // header("Location:index.php");
    }
    unset($_SESSION['$Address']);
    unset($_SESSION['song_id']);
}


header("Location:main.php");


?>