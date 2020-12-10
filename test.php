<?php
session_start();
include "php_func\phpFunction.php"; 
if(isset($_SESSION["flag"])){
if(pull_set("ip")==get_ip() && ($_SESSION["flag"]==1) ){    //1.1.1.1
         echo "
         <script>
        var win = window.open(play.php, _blank);
        win.focus(); </script>";
        unset($_SESSION["flag"]);
        //header("Location: play.php" );
    
    }
}



?>