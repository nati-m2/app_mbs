<?php 
session_start();
 include "sqli.php"; //$connect
include "php_func/phpFunction.php";

$_SESSION["val"]=pull_song_t(pull_task(get_ip(),4));
$_SESSION["task"]=pull_task(get_ip(),2);


$this_ip = get_ip();
$query = "update task_t set     task=''  where Address_d='$this_ip' ";
mysqli_query($connect, $query);

?>