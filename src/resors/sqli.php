<?php
$servername="localhost";
$user="root";
$pass="";
$dbname="ajax";


$conn=mysqli_connect($servername,$user,$pass,$dbname);


if($conn){

    echo "con good";
}



?>