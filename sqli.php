<?php
$servername = "localhost";
$db = "mbs";
$username = "root";
$password = "";
$connect = null;
$connect = mysqli_connect($servername ,$username,$password,$db);
// Check connection
if (!$connect) {
    $servername = "db";
    $password = "root";
    $connect = mysqli_connect($servername ,$username,$password,$db);
    if (!$connect){
        echo "מסד נתונים לא קיים !!";
        echo "יוצר מסד נתונים ";
   // die("Connection failed : " . mysqli_connect_error());
       // header("Location: setup.php");
        echo" <script> location.replace('setup.php'); </script>";
}
}
//echo "Connected successfully";
?>