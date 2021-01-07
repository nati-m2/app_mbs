<?php
 include 'Sidebar.php';
include_once 'sqli.php'; 

if(isset($_GET['devise'])){
$Address=get_ip();
$devise=$_GET['devise'];
$query = "INSERT INTO `devise`(`devise_name`, `Address`) VALUES('".$devise."','".$Address."')";
   if(!mysqli_query($connect,$query)){
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
header("Location:index.php");
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
