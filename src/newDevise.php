<?php
 include 'Sidebar.php';
include_once 'sqli.php'; 
if(!isset($_COOKIE["login"])) {
	echo" <script> location.replace('login.php'); </script>";
	
  }
 


if(isset($_GET['devise']) && isset($_COOKIE["login"])){
$devise_cookie=get_devise_name();
$devise=$_GET['devise'];
setcookie("devise",$devise,time() + (86400 * 365), "/");
update_devise($devise);
echo" <script> location.replace('index.php'); </script>";
}
?>  
<html>
		<head>
		<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
			<title>mbs</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="styles.css">
				
		</head>
		<body class="body_y">
				<center>
				
					<form action="newDevise.php" method="GET" onsubmit="/*return  validpass();*/">
							<h2 >רישום מכשיר</h2><br>
							 <p> 
								שם מכשיר 
								 <br>
								 <input type="text" name="devise" id="devise" >
								<br><br>
								<input class="sub" type="submit" name="submit" value="סיים">
								<br><br>
							 </p>
						</form>
						
					</center>
				</body>
</html>
