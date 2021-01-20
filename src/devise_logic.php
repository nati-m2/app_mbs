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


  if(!empty($_POST['Address'])){
    $Address=$_POST['Address'];
  }
  if(!empty($_POST['val'])){
    $val=$_POST['val'];
  }
  if(!empty($_POST['acc'])){
    $name=$_POST['acc'];
  }

if(isset($_GET['Address'])){
  $Address=$_GET['Address'];
}
if(isset($_GET['val'])){
  $val=$_GET['val'];
}
if(isset($_GET['acc'])){
  $name=$_GET['acc'];
}

play($Address,$val,$name);

function play($Address,$val,$name){  
    include "php_func/phpFunction.php";
    $task= "on";
    
  if(!$val){
    $val = $_SESSION['val'];
   // unset($_SESSION['val']);
  }
    if(!$Address){
      $Address= get_ip();
      $_SESSION['val']=  $val;

    }
  insert_task($name,$task,$Address,$val);  
}

echo" <script> location.replace('main.php'); </script>";



?>