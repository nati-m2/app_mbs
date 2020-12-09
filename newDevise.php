<?php
include "php_func\phpFunction.php";
include_once 'sqli.php'; 
echo "<h1> כתובת ".get_ip()."</h1>";
if(isset($_GET['devise'])){
$Address=get_ip();
$devise=$_GET['devise'];
$query = "INSERT INTO `devise`(`devise_name`, `Address`) VALUES('".$devise."','".$Address."')";
   if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
//header("Location:   .php");
mysqli_close($connect);
}
?>  
<html>
		<head>
		<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>mbs</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="styles.css">
				<script src="0000ck.js"></script>
				<script src="000valid_all.js"></script>
		</head>
		<body class="body_y">
		<a href ="index.php" target="_top" type=submit  class="sub1">חזרה לבית</a>
				<center>
					<form action="newDevise.php" method="GET" onsubmit="/*return  validpass();*/">
							<h2 >:התחבר</h2><br>
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
