<?php 
      session_start();
     include "php_func/phpFunction.php";
    /* צריך למצא דרך יותר יעילה לישמור את הנתונים שנשלחים לטבלת משימות  */
    if(!empty($_POST['d'])){
      $id=$_POST['d'];
     if(delete_song($id,$_COOKIE["login"])){
      echo"<script> alert('  השיר נמחק בהצלחה '); </script>" ;
     }
     echo" <script> location.replace('main.php'); </script>";
     exit;
    }



      if(!empty($_POST['devise_name'])){
        $devise_cookie=$_POST['devise_name'];
      } else{
        $devise_cookie=null;
      }
    
      if(!empty($_POST['toggel'])){
        $toggel=$_POST['toggel'];
        toggel_sync($devise_cookie,$toggel);
        echo" <script> location.replace('main.php'); </script>";
        exit;
      }
    
      if(!empty($_POST['val'])){
        $val=$_POST['val'];
      }else{
        $val = $_SESSION['val'];
      }
      if(!empty($_POST['acc'])){
        $name=$_POST['acc'];
      }

      ip_is_sync($devise_cookie,$val,$name);
     echo" <script> location.replace('main.php'); </script>";
    
   
  

      exit;
    
    
 

    
   







?>