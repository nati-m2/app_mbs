<?php session_start();
     include "php_func/phpFunction.php";
    /* צריך למצא דרך יותר יעילה לישמור את הנתונים שנשלחים לטבלת משימות  */
  
      if(!empty($_POST['Address'])){
        $Address=$_POST['Address'];
      }
      if(!empty($_POST['val'])){
        $val=$_POST['val'];
      }else{
        $val = $_SESSION['val'];
      }
      if(!empty($_POST['acc'])){
        $name=$_POST['acc'];
      }

      if(!empty($_POST['toggel'])){
        $toggel=$_POST['toggel'];
        toggel_sync($Address,$toggel);
      }
    
  sync_and_play($Address,$name,$val);

    

    
    
    //echo" <script> location.replace('main.php'); </script>";

    
   







?>