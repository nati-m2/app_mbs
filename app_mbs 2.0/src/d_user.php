<?php
include 'sqli.php';
if(!isset($_COOKIE["login"])) {
    echo" <script> location.replace('login.php'); </script>";
  }
  $user = $_COOKIE["login"];


  if($_POST['music'] =="music") {
    delete_user_data($user,"music");
    rrmdir("Media_Library/music/".$user);
    mkdir("Media_Library/music/".$user, 0777, true);
  }

  if($_POST['photos']=="photos") {
    delete_user_data($user,"photos");
    rrmdir("Media_Library/photos/".$user);
    mkdir("Media_Library/photos/".$user, 0777, true);
  }
  if($_POST['user']=="user"){
    $query=" DELETE FROM `user` where  `firstname`  LIKE '". $user."' ";
    mysqli_query($connect,$query);
    setcookie("login", "", time()-1,"/");
  }


  if(isset( $_POST['old_password'] )&& isset( $_POST['password'] )){
  if(!update_pass($user,$_POST['old_password'],$_POST['password'])){
    echo" <script> location.replace('profile.php'); </script>";
    exit;
  }
  setcookie("login", "", time()-1,"/");
  }
 
 echo" <script> location.replace('index.php'); </script>";


function delete_user_data($user,$table){
  include 'sqli.php';
  $query="DELETE FROM `".$table."` where  user_n  LIKE '". $user."' ";
  if(!mysqli_query($connect,$query)){
    echo"<script> alert('שגיאה לא צפוייה במערכת מידע לא נמחק'); </script>" ;
  }else{
    echo"<script> alert(' המידע נמחק ממסד נתונים בהצלחה  '); </script>" ;
  }
  mysqli_close($connect);
}


function rrmdir($dir) {
  if (is_dir($dir)) {
    $objects = scandir($dir);
    foreach ($objects as $object) {
      if ($object != "." && $object != "..") {
        if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
      }
    }
    reset($objects);
    rmdir($dir);
  }
}
function update_pass($user,$old_pass,$new_pass){
  include 'sqli.php'; 
  $query="SELECT * FROM `user` WHERE `firstname`='".$user."' AND  `pass`= '". md5($old_pass)."'";
  $result=mysqli_query($connect,$query);
  if(mysqli_num_rows($result) == 1){
        $query = "update user set pass='".md5($new_pass)."' where  pass='".md5($old_pass)."' AND `firstname` ='".$user."' ";
      if(!mysqli_query($connect,$query)){
          echo "Error: " . $query . "<br>" . mysqli_error($connect);
          return false;
      }
  }else{
    echo"<script> alert(' אין אפשרות לשנות את הסיסמה ללא הסיסמה הישנה '); </script>" ;
    return false;
  }

  mysqli_close($connect);
  return true;
  }


?>