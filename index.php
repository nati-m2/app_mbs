<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
      <body>

<?php
include_once 'sqli.php'; 
include "php_func\phpFunction.php"; 
date_default_timezone_set("israel");
echo "<h1>".date("G:i:s  -  d/m/y")."</h1>";
session_start();
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
<h1 >hi  <?php echo " ip addres is:".get_ip(); ?> </h1>


<a  href="Settings.php">aaaaaaaaaaaaaaaaaaa</a>

</center>



  </body>   
      </html>
