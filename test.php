<?php

include "php_func\phpFunction.php"; 
if ($_SERVER["REQUEST_METHOD"] == "GET"){
if(pull_set("ip")==get_ip() ){    //1.1.1.1
    echo '333333333333333333333333';
    header("Location: play.php" );
}
}
/*
if($_SESSION["flag"]==1){
    $_SESSION["flag"]=0;
    header("Location: play.php" );
}
*/



?>