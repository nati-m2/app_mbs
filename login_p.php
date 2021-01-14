<?php

include_once 'sqli.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST['name'];
    $password=$_POST['password'];
    if ((empty($name)) || (empty($password))){
        echo "חייב למלא שם וסיסמה <br>";
    }else{
    $query="SELECT * FROM `user` WHERE `firstname`='".$name."' AND  `pass`= '". md5($password)."'";
    $result=mysqli_query($connect,$query);
    if(mysqli_num_rows($result) == 1){
        echo"<script> alert('אתה מחובר'); </script>" ;
        session_start();
        $_SESSION["login"]=$name;
          echo" <script> location.replace('index.php'); </script>";
        mysqli_close($connect);
        }else{  
            echo"<script> alert('שם משתמש לא קיים'); </script>" ;
             echo" <script> location.replace('register_user.php'); </script>";
            }
        }
    }     
 
?>