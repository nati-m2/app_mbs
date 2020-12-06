<?php

include_once 'sqli.php';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=$_POST['name'];
    $password=$_POST['password'];
    if ((empty($name)) || (empty($password))){
        echo "חייב למלא שם וסיסמה <br>";
    }else{
    $query="SELECT * FROM `user` WHERE `firstname`='".$name."' AND  `pass`= '". sha1($password)."'";
    $result=mysqli_query($connect,$query);
    if(mysqli_num_rows($result) == 1){
        echo"<script> alert('אתה מחובר'); </script>" ;
        session_start();
        $session['login']=$name;
        //header("Location:index.php");
        mysqli_close($connect);
        }else{  
            echo"<script> alert('שם משתמש לא קיים'); </script>" ;
            header("Location:register_user.php");
            }
        }
    }     
 
?>