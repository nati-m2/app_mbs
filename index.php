<?php if(!session_id())session_start(); ?>
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
                
                date_default_timezone_set("israel");
                echo "<h1>".date("G:i:s  -  d/m/y")."</h1>";
                if(!isset($_SESSION["login"])){
                  echo "<center> <form action=login.php>
                  <input class=sub1 type=submit value=התחל>
                  </form>
                  </center>";
                }else{
                  echo "<center> <form action=start.php>
                  <input class=sub1 type=submit value=".$_SESSION["login"].">
                  </form>;
                  <form action=logout.php>
                  <input class=sub type=submit value=logout>
                  </form>
                  </center>";
                }
                ?>
            <center>
          
                </center>
                </div>

<center>
<div class="player">
          <iframe  src="player.php" width="99%" height="400" style="border:none;"></iframe>
      </div>

</center>
    
    </div>


  </body>   
      </html>
