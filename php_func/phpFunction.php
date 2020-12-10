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
if($ip_address== "::1" )
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



function insert_task($name,$task,$Address,$song_n){
  include 'sqli.php'; 
  /*
  if(pull_task($Address,'play')){
    echo "קיימת משימה ללקוח זה אין אפשרות לצור שני משימות לאותו לקוח";
    mysqli_close($connect);
    return;
  }
 */
  $query = "INSERT INTO task_t(`name`,`task`, `Address`,`song_n`) VALUES('".$name."','".$task."','".$Address."','".$song_n."')";
   if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
}

function pull_task($Address,$c){
  include 'sqli.php'; 
  $query="SELECT * FROM `task_t` WHERE  Address = '".$Address."' AND  name LIKE  'play' OR name LIKE  'playing' ";
  $result=mysqli_query($connect,$query);
  if(!$result){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
  }
  $result_check=mysqli_num_rows($result);
  if($result_check==1){
    $row=mysqli_fetch_assoc($result);
  
    if($c==1)  
      return  $row['Address'];
    else if($c==2)
      return  $row['name'];
    else if($c==3)
      return  $row['task'];
    else if($c==4)
      return  $row['song_n'];
    
    }
  
  return null;
  mysqli_close($connect);
}

function update_task($Address,$val){
  include 'sqli.php'; 
  $query = "UPDATE `task_t` SET `name`='".$val."' WHERE Address LIKE '".$Address."' ";
  if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
    return;
  }
  mysqli_close($connect);
  return;
  }

?>