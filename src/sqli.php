<?php

    $servername = "db";
    $db = "mbs";
    $username = "root";
    $password = "root";
    $connect = mysqli_connect($servername ,$username,$password,$db);
    if (!$connect){
        echo "מסד נתונים לא קיים !!";
        echo "יוצר מסד נתונים ";
   // die("Connection failed : " . mysqli_connect_error());
  
        echo" <script> location.replace('setup.php'); </script>";
}

//echo "Connected successfully";
?>