<?php
/* deise logic*/

session_start();

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