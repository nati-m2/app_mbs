<?php

include 'Sidebar.php';

if(!session_id())session_start();
    if(!isset($_SESSION["login"])){
          echo" <script> location.replace('index.php'); </script>";
}?> 
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <body>
    <div class="f_right">
        <div class="avt-art">
    <img  src="img\img_avatar1.gif" alt="Avatar"   width="200" height="200"  class="avatar">
    </div>
    <form class="" action="" method="post" >
        <h1><?php echo $_SESSION['login']; ?> :שם משתמש </h1>
        <h1>  pass <?php  ?>:סיסמה </h1>
    
    
       <p> <input type="checkbox" checked="checked" name="prev"> premesheng</p>
  
    </div>
        </form>
        </div>
    </body>
</head>
</html>