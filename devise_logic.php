<?php
/* deise logic*/

session_start();
//include "php_func/phpFunction.php";
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
echo" <script> location.replace('main.php'); </script>";

*/
/* צריך למצא דרך יותר יעילה לישמור את הנתונים שנשלחים לטבלת משימות  */

if(isset($_GET['Address'])){
  $Address=$_GET['Address'];
}else{
  $Address="";
}

if(isset($_GET['song_id'])){
  $song_n=$_GET['song_id'];
}
if(isset($_GET['name'])){
  $name=$_GET['name'];
  
}

echo$_GET['name'];
echo$_GET['song_id'];

play($Address,$song_n,$name);

function play($Address,$song_n,$name){
    include "php_func/phpFunction.php";
    $task= "on";
 
    if(!$Address){
      $Address= get_ip();
      $_SESSION['song_id']=  $song_n;

    }else{
      $song_n = $_SESSION['song_id'];
      //unset($_SESSION['song_id']);
    }

  insert_task($name,$task,$Address,$song_n);  
}

echo" <script> location.replace('main.php'); </script>";



?>