<?php
        session_start();
        include_once "php_func\phpFunction.php"; 
        if(isset($_SESSION["flag"])){
        if((pull_task(get_ip(),1)==get_ip())&& ($_SESSION["flag"]==1)){
            if(pull_task(get_ip(),2)=="play"){    //1.1.1.1
            echo"
            <script>
              window.open('play.php','_blank');
              console.log('Hello world!');
             </script>";
             $_SESSION["flag"]=0;
                unset($_SESSION["flag"]);
                header("Location: play.php" );
            }
            }
        }
    ?>