<?php
        session_start();
        include_once "php_func\phpFunction.php"; 
        if(isset($_SESSION["flag"])){
        if(pull_set("ip")==get_ip() && ($_SESSION["flag"]==1)){    //1.1.1.1
            echo"
            <script>
              window.open('play.php','_blank');
              console.log('Hello world!');
             </script>";
             $_SESSION["flag"]=0;
                unset($_SESSION["flag"]);
               // header("Location: play.php" );
            
            }
        }
    ?>