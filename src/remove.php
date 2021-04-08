<?php
session_start();
include "sqli.php"; //$connect
include "php_func/phpFunction.php";


$this_ip = get_devise_name();
$query = "update task_t set task='' where `Address_d`='$this_ip' AND task='on' ";
mysqli_query($connect, $query);

?>