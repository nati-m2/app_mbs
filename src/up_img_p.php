<?php  if(!session_id()) session_start(); 
include 'sqli.php';
   



echo " <center><p>";
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      //  echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "קובץ תמונה<br>";
        $uploadOk = 0;
    }
}
//Check if file already exists
if (file_exists($target_file)) {
    // Use unlink() function to delete a file  
    if (!unlink($target_file)) {  
        echo"<script> alert('קיים קובץ עם אותו שם בתיקיית תמונות'); </script>" ;
        $uploadOk = 0;
    }  
}
 /*  Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
*/
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo"<script> alert('הקובץ שנבחר אינו קובץ תמונה'); </script>" ;
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "התהליך בוטל עקב שגיאת העלאה <br>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
       $img=basename( $_FILES["fileToUpload"]["name"]);
if(isset($_SESSION["login"])){
    $user = $_SESSION["login"];
    $img="img/".$img;
$query = "UPDATE `user` SET  `path`='".$img."'  WHERE `firstname` LIKE '".$user."'  ";
if (!mysqli_query($connect,$query)){
    echo"<script> alert('לא ניתן ליצור חיבור למסד נתונים'); </script>" ;
} else {
echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
}
else {
        echo "Sorry, there was an error uploading your file.";
    }

echo " </p></center>";
}}
echo" <script> location.replace('index.php'); </script>";

?>