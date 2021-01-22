<?php
//since PHP 5.2.0, allow_url_include must be enabled for these

// To create the nested structure, the $recursive parameter 
// to mkdir() must be specified.
//rmdir ( '/var/www/html/Media_Library' );
//mkdir('/var/www/html/Media_Library1', 0777, true);
//mkdir('/var/www/html/Media_Library1', 0777, true);
//
   // mkdir('/var/www/html/Media_Library/music', 0777, true);
    //mkdir('/var/www/html/Media_Library/photos', 0777, true);
    phpinfo();

    
    function sync_and_play($Address,$name,$val){
        include "sqli.php";
        $query="SELECT `Address` FROM `devise` where `sync`= 1";
        $result=mysqli_query($connect,$query);
        $result_check=mysqli_num_rows($result);
        if($result_check>1){                                  // <1    192.168.0.2    //play >1
            while($row=mysqli_fetch_assoc($result)){ 
              $Address =$row['Address'];
              insert_task($name,"on",$Address,$val); 
            }
            mysqli_close($connect);
           echo" <script> location.replace('main.php'); </script>";
            return ;
            }else{ // no sync                                                    //play ==1
              play($Address,$val,$name);
            }
        }
      
      
      //echo" <script> location.replace('main.php'); </script>";


?>
