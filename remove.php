<?php 
 include "sqli.php"; //$connect
//define('DB_SERVER','localhost');
//define('DB_USER','root');
//define('DB_PASS' ,'');
//define('DB_NAME','rn');
//$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
//if (mysqli_connect_errno())
//{
// echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}



function get_ip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
      {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
      }
    //whether ip is from proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
      {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
    //whether ip is from remote address
    else
      {
        $ip_address = $_SERVER['REMOTE_ADDR'];
      }
    if($ip_address== "::1" )
        $ip_address="127.0.0.1";
       return $ip_address;
    }
    


$this_ip = get_ip();

$query = "update task_t set task='', name='pause' where Address='$this_ip' and name='play'";
mysqli_query($connect, $query);

?>