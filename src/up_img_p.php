<?php 

if(isset($_COOKIE["login"]) && isset($_FILES["file"])){
  upload_img_pro($_FILES["file"],$_COOKIE["login"]);
  echo"<script> location.replace('index.php'); </script>";
}



function upload_img_pro($file,$user){
    include 'sqli.php';
    $size=1000000;
    $img_type=array("png", "jpeg", "gif", "jpg");
    $name = $file['name'];
   // $img="img/".$name;
    $FileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
        if (!in_array($FileType,$img_type)){
        echo"<script> alert(' קובץ זה אינו פורמט נתמך(png, jpeg, gif, jpg)'); </script>" ;
            return false;
        }
    
//Check if file already exists
    if(file_exists("img/".$name)) {
        // Use unlink() function to delete a file  
        if(!unlink("img/".$name)) {  
            echo"<script> alert('קיים קובץ עם אותו שם בתיקיית תמונות'); </script>" ;
            return false;
        }  
    }

    if($file["size"] > $size) { 
        return false;
    }

    if(move_uploaded_file($file['tmp_name'],"img/".$name)){
            $query = "UPDATE `user` SET  `path`='"."img/".$name."'  WHERE `firstname` LIKE '".$user."'  ";
            mysqli_query($connect,$query);
                //echo"<script> alert('לא ניתן ליצור חיבור למסד נתונים'); </script>" ;
                /*
            } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connect);
            }*/
            mysqli_close($connect);
            return true;  
        } else {
            echo"<script> alert('Sorry, there was an error uploading your file.'); </script>" ;
            return false;
        }
        echo"<script> location.replace('profile.php'); </script>";
    }





?>