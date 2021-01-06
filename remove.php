<?php 
 include "sqli.php"; //$connect
include "php_func\phpFunction.php";
session_start();
$_SESSION["task"]=pull_song_t(pull_task(get_ip(),4));

$this_ip = get_ip();
$query = "update task_t set task='', name='pause' where Address_d='$this_ip' and name='play'";
mysqli_query($connect, $query);

?>