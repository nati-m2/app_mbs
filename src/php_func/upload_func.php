<?php

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
  

function  upload_dir($file,$user,$type){
    $music= array("mp3", "m4a", "wav");
    $img=array("png", "jpeg", "gif", "jpg");
    $size=(int)pull_set("maxfile");
    foreach($file['name'] as $i => $name){
      $uploadOk = 1;
      $FileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
          if($type=="music"){
              if (!in_array($FileType,$music)){
                echo"<script> alert(' קובץ זה אינו פורמט נתמך(mp3, m4a, wav)'); </script>" ;
                $uploadOk = 0;
              }
            }
            if($type=="photos"){
              if (!in_array($FileType, $img)){
                echo"<script> alert(' קובץ זה אינו פורמט נתמך(png, jpeg, gif, jpg)'); </script>" ;
                $uploadOk = 0;
              }
            }
            if (file_exists("Media_Library/".$type."/".$user."/".$name)){
              if (!run_over($name,$type)){ 
                $uploadOk = 0;
              }  
            }
            if ($file['size'][$i] > $size) {  
              echo "Sorry, your file is too large.";
              $uploadOk = 0;
            }	
           if( $uploadOk == 1){
              if(move_uploaded_file($file['tmp_name'][$i],"Media_Library/".$type."/".$user."/".$name)){
                insert_media($name,$user,$type);
                }
              }
            }
         echo"<script> alert('התיקייה עלתה בהצלחה'); </script>" ;
        }
      

function insert_media($name,$user,$type){
    if($type=="music"){
    insert_music($name,$user);
    return;
    }
    if($type=="photos"){
    insert_picture($name,$user);
    return;
    }
}

function upload_file($file,$user,$type){
    $size=(int)pull_set("maxfile");
    $music= array("mp3", "m4a", "wav");
    $img=array("png", "jpeg", "gif", "jpg");
    $name = $file['name'];
    $FileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
    if($type=="music"){
        if (!in_array($FileType,$music)){
        echo"<script> alert(' קובץ זה אינו פורמט נתמך(mp3, m4a, wav)'); </script>" ;
        return false;
        }
    }
    if($type=="photos"){
        if (!in_array($FileType, $img)){
        echo"<script> alert(' קובץ זה אינו פורמט נתמך(png, jpeg, gif, jpg)'); </script>" ;
            return false;
        }
    }
    if (file_exists("Media_Library/".$type."/".$user."/".$name)){
      if (!run_over($name,$type)) {   // fix
        $uploadOk = 0;
      }  
    }
    if ($file["size"] > $size) { 
        return false;
    }
    if(move_uploaded_file($file['tmp_name'],"Media_Library/".$type."/".$user."/".$name)){
            insert_media($name,$user,$type);
            echo"<script> alert(' הקובץ עלה למערכת בהצלחה'); </script>" ;
            return true;
            
    } else {
        echo"<script> alert('Sorry, there was an error uploading your file.'); </script>" ;
        return false;
    }

}

function run_over($name,$table){
    include 'sqli.php'; 
    $run_o=true;
    $user = $_COOKIE["login"];
    if(!mysqli_query($connect,"DELETE FROM `".$table."` WHERE `name` LIKE '". $name."' ")){
      echo "Error: " . $query . "<br>" . mysqli_error($connect);
       $run_o=false;
        }
        if($run_o){
          if(!unlink("Media_Library/".$table."/".$user."/".$name)){
            $run_o=false;
          }
      }
      return $run_o;
    }
  


    function insert_picture($name,$user){
      include 'sqli.php'; 
      $query = "INSERT INTO  photos(`name`,`user_n`) VALUES('".$name."','".$user."')";
      if(!mysqli_query($connect,$query)){
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
        return;
      }
      mysqli_close($connect);
      return;
      }
    




    function insert_music($name,$user){
      include 'sqli.php'; 
      $query = "INSERT INTO  music(`name`,`user_n`) VALUES('".$name."','".$user."')";
      if(!mysqli_query($connect,$query)){
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
        return;
      }
      mysqli_close($connect);
      return;
      }

?>