<?php
include "php_func/phpFunction.php";

    if(isset($_GET['id']) && isset($_GET['val'])){
        $id=$_GET['id'];
        $val=$_GET['val'];
<<<<<<< HEAD
        update_set($id,$val);
        header("Location: Settings.php");
=======
        //check val value....
        update_set($id,$val);
>>>>>>> 88335ec8d1e692bc11b0998d9c13d495c8beacdc
    }
?>