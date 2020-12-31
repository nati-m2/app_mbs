<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
      <body class="body_x">
<?php
include_once 'sqli.php'; 
include "php_func\phpFunction.php"; 
$_SESSION["task"]=" ";
session_start();

?>
<center>
<?php include "run.php";?>
</center>

  </body>   
      </html>
