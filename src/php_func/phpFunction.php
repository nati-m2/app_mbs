<?php 
/////////////////////////////// Library of Logical Functions /////////////////////////////////


// if $_COOKIE["devise"]  rturn name else return null
function get_devise_name(){
  if(!isset($_COOKIE["devise"])){
      return;
  }
return $_COOKIE["devise"];
}


// pull settings by name from sql table
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


// insert settings  name(str) and  val(str) 

function insert_set ($name,$val){
    include 'sqli.php'; 
    $query = "INSERT INTO  settings(`name`,`val`) VALUES('".$name."','".$val."')";
    if(!mysqli_query($connect,$query)){
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
      return;
    }
    mysqli_close($connect);
    return;
  }



// pull music by id from sql table

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



//insert new task  $name(str) ,$task(str) ,$devise_cookie(str) ,$val(str)
   
function insert_task($name,$task,$devise_cookie,$val){
  include 'sqli.php'; 
  $query = "INSERT INTO task_tb(`name`,`task`, `devise_name`,`val`) VALUES('".$name."','".$task."','".$devise_cookie."','".$val."')";
   if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
mysqli_close($connect);
}




// update  settings by $id(int)  $val(str)

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

   // Replace a sync flag on a device table
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
// play  call  to  insert_task() to create a task
    function play($devise_cookie,$val,$name){  
        if($val){
          $_SESSION['val']=$val;
        }
        insert_task($name,"on",$devise_cookie,$val); 
      return;
    }

// if the sync flag enabled, send the task to any device with the sync flag enabled

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
    
//  Distinguishes between a single device task or a multiple device task
    function send_task($devise_cookie,$val,$name){   // bool
      include "sqli.php";
      $devise_cookie=check_devise($devise_cookie);
      $query="SELECT `id` FROM `devise` WHERE `devise_name` = '".$devise_cookie."'   and  `sync`= true ";
      $result=mysqli_query($connect,$query);
      if(mysqli_num_rows($result)){
        sync_and_play($devise_cookie,$val,$name);
        return ;
      }
      play($devise_cookie,$val,$name); 
      return ;
    }

//Checks if the device name is valid
    function check_devise($devise_cookie){ //bool
      if(!$devise_cookie){
        $devise_cookie= get_devise_name();
      }
      return $devise_cookie;
    } 
     
//Deletes a song from the library
//! note Only if the owner of the song is the one who deletes
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


// Adds or updates device name in device table          
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
    echo"<script> alert(' ".$devise_cookie." נרשם בהצלחה  '); </script>" ;
    
  } 
 
  mysqli_close($connect);
}


// toggel a likes flag on a song in sql  table
function toggel_likes($song_id,$user_id){
  include 'sqli.php'; 
  $query="SELECT `likes` FROM `music` WHERE  id = $song_id ";
  $result=mysqli_query($connect,$query);
    if( mysqli_num_rows($result)){
      $row=mysqli_fetch_assoc($result);
      $likes=$row['likes'];
      if(strpos( $likes,$user_id)){  
        $likes=str_replace($user_id,"",$likes);
          }else{
            $likes= $likes." ".$user_id;
          }
      }
      $query = "UPDATE `music` SET  `likes`= '".$likes."'  WHERE  id = '".$song_id."' ";
      if(!mysqli_query($connect,$query)){
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
        return;
      }
      mysqli_close($connect);
      return;
      } 

//   reset and DELETE  devise frome   devise sql  table
  function reset_devise($devise_cookie){
        include 'sqli.php'; 
        $query="SELECT `id` FROM `devise`  WHERE  `devise_name` = '".$devise_cookie."' ";
        $result=mysqli_query($connect,$query);
        if(mysqli_num_rows($result)==1){
          mysqli_query($connect," DELETE FROM  `devise` WHERE `devise_name` = '".$devise_cookie."'   ");
          echo"<script> alert(' ".$devise_cookie." נמחק בהצלחה  '); </script>" ;
          return ;
        }
        echo"<script> alert(' ".$devise_cookie." מכשיר לא קיים  '); </script>" ;
        return ;
      }



//  מיותר
// colome   $row['$c'];   pull_task($devise_cookie,task) 
/*
function pull_task($devise_cookie,$c){
  include 'sqli.php'; 
  $query="SELECT * FROM `task_tb` WHERE `devise_name` = '".$devise_cookie."'   AND task='on' ";
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
}*/

/*
function update_task($devise_cookie,$val){
  include 'sqli.php'; 
  $query = "UPDATE `task_tb` SET `name`='".$val."' WHERE `devise_name` LIKE '".$devise_cookie."' ";
  if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
    return;
  }
  mysqli_close($connect);
  return;
  }
*/
// main ניתן לייעל בעת משיכת נתונים  בדף 
/*
function user_like_the_song($song_id,$user_id){
  include 'sqli.php'; 
  $query="SELECT `likes` FROM `music` WHERE  id = $song_id ";
  $result=mysqli_query($connect,$query);
 if( mysqli_num_rows($result)){
  $row=mysqli_fetch_assoc($result);
  if(strripos($row['likes'],$user_id)){
    mysqli_close($connect);
    return true;
  }
  mysqli_close($connect);
  return false;
 }
}
*/

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



?>