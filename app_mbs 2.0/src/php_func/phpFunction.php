<?php 
//whether ip is from share internet
// import get_ip.php  - get_devise_name();
//   
//    
/*
function get_devise_name(){
//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_devise_name = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_devise_name = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote devise_name
else
  {
    $ip_devise_name = $_SERVER['REMOTE_ADDR'];
  }

   return $ip_devise_name;
}
*/


function get_devise_name(){
  if(!isset($_COOKIE["devise"])){
  
      return;
  }
return $_COOKIE["devise"];
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

    function pull_music($id){
      include 'sqli.php'; 
      $query="SELECT * FROM `music` WHERE  id = $id  ";
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



   // pull_music

function insert_task($name,$task,$devise_cookie,$val){
  include 'sqli.php'; 
  $query = "INSERT INTO task_t(`name`,`task`, `Address_d`,`val`) VALUES('".$name."','".$task."','".$devise_cookie."','".$val."')";
   if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
}

//  מיותר
// colome   $row['$c'];   pull_task($devise_cookie,task) 
function pull_task($devise_cookie,$c){
  include 'sqli.php'; 
  $query="SELECT * FROM `task_t` WHERE `Address_d` = '".$devise_cookie."'   AND task='on' ";
  $result=mysqli_query($connect,$query);
  if($result){
    $result_check=mysqli_num_rows($result);
    if($result_check==1){
      $row=mysqli_fetch_assoc($result);
      if($c==1)  
        return  $row['devise_name'];
      else if($c==2)
        return  $row['name'];
      else if($c==3)
        return  $row['task'];
      else if($c==4)
        return  $row['val']; //val

      }
      return null;
  }
  echo "Error: " . $query . "<br>" . mysqli_error($connect);
  return null;
  mysqli_close($connect);
}

function update_task($devise_cookie,$val){
  include 'sqli.php'; 
  $query = "UPDATE `task_t` SET `name`='".$val."' WHERE `Address_d` LIKE '".$devise_cookie."' ";
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
  
    function toggel_sync($devise_cookie,$toggel){
      include 'sqli.php'; 
      $query = "UPDATE `devise` SET `sync`=$toggel  WHERE `devise_name` = '".$devise_cookie."' ";
      if(!mysqli_query($connect,$query)){
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
        return;
      }
      mysqli_close($connect);
      return;
      }  

    function play($devise_cookie,$val,$name){  
        if($val){
          $_SESSION['val']=$val;
        }
        insert_task($name,"on",$devise_cookie,$val); 
      return;
    }

    function sync_and_play($devise_cookie,$val,$name){
      include "sqli.php";
        if($name=="pause"){
          $val=0;
        }
      $query="SELECT `devise_name` FROM `devise` where `sync`=  true";
      $result=mysqli_query($connect,$query);
      $result_check=mysqli_num_rows($result);
      if($result_check>0){                                  // <1    192.168.0.2    //play >1
          while($row=mysqli_fetch_assoc($result)){

            $devise_cookie =$row['devise_name'];                     // nede fix comend to all
           insert_task($name,"on",$devise_cookie,$val); 
          }
          mysqli_close($connect);
          return;
      }
    }
    

    function ip_is_sync($devise_cookie,$val,$name){   // bool
      include "sqli.php";
      $devise_cookie=check_ip($devise_cookie);
      $query="SELECT `id` FROM `devise` WHERE `devise_name` = '".$devise_cookie."'   and  `sync`= true ";
      $result=mysqli_query($connect,$query);
      if(mysqli_num_rows($result)){
        sync_and_play($devise_cookie,$val,$name);
        return ;
      }
      play($devise_cookie,$val,$name); 
      return ;
    }


    function check_ip($devise_cookie){ //bool
      if(!$devise_cookie){
        $devise_cookie= get_devise_name();
      }
      return $devise_cookie;
    } 
     

    function delete_song($id,$user){
      include 'sqli.php'; 
      $query="SELECT `id` FROM `music` WHERE  id = $id  and user_n = '".$user."' ";
      $result=mysqli_query($connect,$query);
      $result_check=mysqli_num_rows($result);
      if($result_check==0){
      echo"<script> alert(' אנא בדוק שהשיר נמצא בבעלותך '); </script>" ;
      return false;
     }
      if(!unlink("Media_Library/music/".pull_music($id))){
        echo"<script> alert(' שגיאה במערכת קבצים '); </script>" ;
        return false;
      } 
      if(!mysqli_query($connect," DELETE FROM `music` where `id` = $id" ))
        {
          echo"<script> alert('  שגיאה לא צפוייה במערכת, מידע לא נמחק   '); </script>" ;
          echo "Error: " . $query . "<br>" . mysqli_error($connect);
          return false;
        }
        mysqli_close($connect);
        return true;
    }


          
function  update_devise($devise_cookie){
  include 'sqli.php'; 
  $query="SELECT `id` FROM `devise`  WHERE  `devise_name` = '".$devise_cookie."' ";
  $result=mysqli_query($connect,$query);
    if(!$result){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
  }
  if(mysqli_num_rows($result)==1){
    echo"<script> alert(' ".$devise_cookie." כבר קיים במערכת  '); </script>" ;
    mysqli_close($connect);
    return ;
  
  }else{
    $query = "INSERT INTO `devise`(`devise_name`) VALUES('".$devise_cookie."')";
    if(!mysqli_query($connect,$query)){
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
  }
  mysqli_close($connect);
}






?>