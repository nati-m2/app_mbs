<?php if(!session_id())session_start(); 
if(isset($_GET['user'])){
    $user=$_GET['user'];
    $_SESSION['user']=$user;
  }

?>
<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
  
  <div class="grid-container">
          <div class="main">
                <?php
                include 'Sidebar.php';
                include_once 'sqli.php'; 
         
                ?>
                </div>

<center>
    <iframe src="main.php" width="100%" height="70%"  name="main"  style="border:none;"></iframe>
    <div class="player">
        <iframe  src="player.php" width="100%" height="19%" style="border:none;"></iframe>
    </div>
</center>
    
    </div>


  </body>   
      </html>
