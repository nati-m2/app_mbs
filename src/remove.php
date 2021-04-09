<?php
include "sqli.php"; //$connect
include "php_func/phpFunction.php";


$this_ip = get_devise_name();
$query = "update task_tb  set task=''  where `devise_name`='$this_ip' AND task='on' ";
mysqli_query($connect, $query);

?>