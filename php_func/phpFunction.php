<?php
//whether ip is from share internet
// import get_ip.php  - get_ip();
//   
//    

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
if($ip_address== "::1")
    $ip_address="127.0.0.1";
   return $ip_address;
}

function pull_set($name){
include 'sqli.php'; 
$query="SELECT * FROM `settings` WHERE `name` LIKE '".$name."' ";
$result=mysqli_query($connect,$query);
if(mysqli_num_rows($result)==1){
  $row=mysqli_fetch_assoc($result);
    return  $row['val'];
}else{
  return null;
}
}

function update_set($id,$val){
  include 'sqli.php'; 
  $query = "UPDATE `settings` SET `val`='".$val."' WHERE `id`=$id";
  if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
    return;
  }
  mysqli_close($connect);
  return;
  }


?>