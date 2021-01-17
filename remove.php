<?php 
session_start();
 include "sqli.php"; //$connect
include "php_func/phpFunction.php";

$_SESSION["task"]=pull_song_t(pull_task(get_ip(),4));

$this_ip = get_ip();
$query = "update task_t set task='', name=''    where Address_d='$this_ip' ";
mysqli_query($connect, $query);

?>