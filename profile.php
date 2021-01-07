<?php

include 'Sidebar.php';

if(!session_id())session_start();
    if(!isset($_SESSION["login"])){
        header("Location:index.php");
}?> 
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">


    <body>
        <right>
    <img  src="img\img_avatar1.gif" alt="Avatar"   width="200" height="200"  class="avatar">
        <form class="" action="" method="post" >
        <div class="container">
        <p>:שם משתמש
        <?php echo $_SESSION['login']; ?></p>
      <p>:סיסמה
      <?php echo "pass"; ?></p>
      <label>
       <p> <input type="checkbox" checked="checked" name="prev"> premesheng</p>
      </label>
    </div>
        </form>
    </body>
</head>
</html>