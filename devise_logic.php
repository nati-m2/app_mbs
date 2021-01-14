<?php
/* deise logic*/

session_start();
/*

if(isset($_GET['Address']) && isset($_SESSION['song_id'])){
  if($_SERVER['REQUEST_METHOD'] == 'GET'){ 
    $Address=$_GET['Address'];
    $task= "on";
    $name= "play";
    $song_n = $_SESSION['song_id'];
    insert_task($name,$task,$Address,$song_n);
    }
    unset($_SESSION['song_id']);
}
else{
  if(isset($_GET['song_id'])) {
    if($_SERVER['REQUEST_METHOD'] == 'GET'){ 
      $Address= get_ip();
      $task= "on";
      $name= "play";
      $_SESSION['song_id']= $_GET['song_id'];
      $song_n = $_GET['song_id'];
      insert_task($name,$task,$Address,$song_n);   //   Address //  song_id
      $_SESSION['song_id']=$song_n;
      }
    }
}
*/
/* צריך למצא דרך יותר יעילה לישמור את הנתונים שנשלחים לטבלת משימות  */

if(isset($_GET['Address'])){
  $Address=$_GET['Address'];
}
if(isset($_GET['song_id'])){
  $song_n=$_GET['song_id'];
}


play($Address,$song_n);

function play($Address,$song_n){
    include "php_func/phpFunction.php";
    $task= "on";
    $name="play";
    if(!$Address){
      $Address= get_ip();
      $_SESSION['song_id']=  $song_n;

    }else{
      $song_n = $_SESSION['song_id'];
      unset($_SESSION['song_id']);
    }

  insert_task($name,$task,$Address,$song_n);  
}

echo" <script> location.replace('main.php'); </script>";



?>