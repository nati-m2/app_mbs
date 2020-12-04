<?php //include 'un_order.php';?>
<html>
	<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>mbs</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" type="text/css" href="styles.css"> 	
               <script src="ck.js"></script>

	</head>


<body class="body_x">
<?php
date_default_timezone_set("israel");
echo "<p class=top1>".date("G:i:s  -  d/m/y")."</p>";


$_SESSION["c_add_order"]="";
$_SESSION["Regular"]=0;
$_SESSION["flag"]=0;
?>
<br><br><br><br><br><br><br><br>
<center>
<form action="new_bon.php">
    <input class="sub mar" type="submit" value="הזמנה"><br>
    </form>
</center>
</body>
</html>