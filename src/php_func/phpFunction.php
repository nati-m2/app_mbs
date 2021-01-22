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





function insert_set($name,$val){
  include 'sqli.php'; 
  $query = "INSERT INTO  settings(`name`,`val`) VALUES('".$name."','".$val."')";
  if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
    return;
  }
  mysqli_close($connect);
  return;
  }

  function insert_song_t($name,$user){
    include 'sqli.php'; 
    $query = "INSERT INTO  song_t(`name`,`user_n`) VALUES('".$name."','".$user."')";
    if(!mysqli_query($connect,$query)){
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
      return;
    }
    mysqli_close($connect);
    return;
    }
  
    function pull_song_t($id){
      include 'sqli.php'; 
      $query="SELECT * FROM `song_t` WHERE  id = $id  ";
      $result=mysqli_query($connect,$query);
      if($result){
        $result_check=mysqli_num_rows($result);
        if($result_check){
          $row=mysqli_fetch_assoc($result); 
            return  $row['user_n']."/".$row['name'];
        }
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
      return;
      }
    }


 /*
    function pull_song_p($id){
      include 'sqli.php'; 
      $query="SELECT name FROM `song_t` WHERE  id = $id  ";
      $result=mysqli_query($connect,$query);
      if($result){
        $result_check=mysqli_num_rows($result);
        if($result_check){
          $row=mysqli_fetch_assoc($result); 
            return  $row['user_n'];
        }
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
      return;
      }
    }

*/


   // pull_song_t

function insert_task($name,$task,$Address,$song_n){
  include 'sqli.php'; 
  /*
  if(pull_task($Address,'play')){
    echo "קיימת משימה ללקוח זה אין אפשרות לצור שני משימות לאותו לקוח";
    mysqli_close($connect);
    return;
  }
 */
  $query = "INSERT INTO task_t(`name`,`task`, `Address_d`,`song_id`) VALUES('".$name."','".$task."','".$Address."','".$song_n."')";
   if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
}

function pull_task($Address,$c){// colome   $row['$c'];   pull_task($Address,task) 
  include 'sqli.php'; 
  $query="SELECT * FROM `task_t` WHERE  Address_d = '".$Address."'   AND task='on' ";
  $result=mysqli_query($connect,$query);
  if($result){
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
        return  $row['song_id']; //val
      
      }
      return null;
  }
  echo "Error: " . $query . "<br>" . mysqli_error($connect);
  return null;
  mysqli_close($connect);
}

function update_task($Address,$val){
  include 'sqli.php'; 
  $query = "UPDATE `task_t` SET `name`='".$val."' WHERE Address_d LIKE '".$Address."' ";
  if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
    return;
  }
  mysqli_close($connect);
  return;
  }



  function update_set($id,$val){
    include 'sqli.php'; 
    $query = "UPDATE `settings` SET `val`='".$val."' WHERE id =$id ";
    if(!mysqli_query($connect,$query)){
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
      return;
    }
    mysqli_close($connect);
    return;
    }
  
    function toggel_sync($Address,$toggel){
      include 'sqli.php'; 
      $query = "UPDATE `devise` SET `sync`=$toggel  WHERE `Address` = '".$Address."' ";
      if(!mysqli_query($connect,$query)){
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
        return;
      }
      mysqli_close($connect);
      return;
      }  
      function play($Address,$val,$name){  
        if(!$Address){
          $Address= get_ip();
          $_SESSION['val']=$val;
        }
        insert_task($name,"on",$Address,$val); 
      echo" <script> location.replace('main.php'); </script>";
      return;
    }
    
    

    
    function sync_and_play($Address,$name,$val){
      if($name=="pause"){
        $val=0;
      }
      include "sqli.php";
      $query="SELECT `Address` FROM `devise` where `sync`= 1";
      $result=mysqli_query($connect,$query);
      $result_check=mysqli_num_rows($result);
      if($result_check>1){                                  // <1    192.168.0.2    //play >1
          while($row=mysqli_fetch_assoc($result)){
            $Address =$row['Address'];
            insert_task($name,"on",$Address,$val); 
          }
        
      echo" <script> location.replace('main.php'); </script>";
          return ;
          }else{ // no sync                                                    //play ==1
            play($Address,$val,$name);
          }
          mysqli_close($connect);
          return;
      }

?>