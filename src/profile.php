<?php

include 'Sidebar.php';
include 'sqli.php';
if(!session_id())session_start();
    if(!isset($_SESSION["login"])){
          echo" <script> location.replace('index.php'); </script>";
}
$user = $_SESSION["login"];
$query="SELECT path FROM `user`  WHERE `firstname` LIKE '". $user."' ";
$result=mysqli_query($connect,$query);
$result_check=mysqli_num_rows($result);
if($result_check == 1){
    $row=mysqli_fetch_assoc($result);
    $img= $row["path"];

    
}
mysqli_close($connect);
?> 



<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style> 
    img {
        border-radius: 150px;
    }
    </style>

    <body>
    <div class="f_right">
        <div class="avt-art">
    <img  src=<?php echo $img; ?> alt="Avatar"   width="200" height="200"  class="avatar">
    </div>
    <form class="" action="" method="post" >
        <h1><?php echo $_SESSION['login']; ?> :שם משתמש </h1>
        <h1>  pass <?php  ?>:סיסמה </h1>
       <p> <input type="checkbox" checked="checked" name="prev"> premesheng</p>
  
    </div>
        </form>
        <form action="up_img_p.php" method="post" enctype="multipart/form-data" >
        <p> Select img to upload:</p>
        <input type="file" name="fileToUpload" id="fileToUpload"  />
        <input type="submit" value="Upload img" name="submit">
        </form>
        </div>
    </body>
</head>
</html>