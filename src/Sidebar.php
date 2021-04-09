<html>
		<head>
		<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title></title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
               <link rel="stylesheet" type="text/css" href="styles.css"> 	
               <script src="ck.js"></script>
        </head>             
<body>
<div id="Sidebar0">
                <div id="main Sidebar0">
                    <button class="openbtn" onclick="openNav()">☰</button>  
                </div>
                <center>
                    <div id="mySidebar" class="sidebar">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                        <a ><?php   echo $_COOKIE['devise']; ?> </a>
                        <?php date_default_timezone_set("israel");
                          echo "<p>".date("G:i:s  -  d/m/y")."</p>";?>
                        <?php
                         if(!isset($_COOKIE["login"])){
                            echo "<a href='login.php'>login</a>";   
                            }else{
                                echo "<a href='profile.php'>".$_COOKIE["login"]."</a>"; 
                                echo "<a href='logout.php'>logout</a>"; 
                             }
                        ?>
                         <a href="start.php" target="_top">מוזיקה שלי</a>
                         <a  href="photos.php" onclick="closeNav()" >התמונות שלי</a>
                         <a href="index.php" onclick="closeNav()" target="_top" >החלף חשבון</a>
                         <a href="upload.php" onclick="closeNav()" target="_top">uploads</a>
                         <a  href="newDevise.php" onclick="closeNav()" >מכשיר חדש</a>   
                  </div>
</div>
</center> 
</body>
</html>
