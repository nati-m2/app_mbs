<?php
session_start();
include "sqli.php"; //$connect
include "php_func/phpFunction.php";


$_SESSION["task"]=pull_song_t(pull_task(get_ip(),4)); // val 
$_SESSION["name"]=pull_task(get_ip(),2); // name 


$this_ip = get_ip();
$query = "update task_t set task='' where Address_d='$this_ip' AND task='on' ";
mysqli_query($connect, $query);

?>