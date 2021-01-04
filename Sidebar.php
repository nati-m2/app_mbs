<?php if(!session_id())session_start();

include "php_func\phpFunction.php"; 
?>
<html>
		<head>
		<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>bon</title>
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
                        <?php if(!isset($_SESSION["login"])){
                            echo "<a href='login.php'>login</a>";   
                            }else{
                                echo "<a href='profile.php'>".$_SESSION["login"]."</a>"; 
                                echo "<a href='logout.php'>logout</a>"; 
                             }
                            
                        ?>
                         <a href="index.php" target="_top">בית</a>
                         <a ><?php echo " ip addres is:".get_ip(); ?> </a>
                        <a  href="Settings.php">settings</a>
                        <a  href="newDevise.php">newDevise</a>         
                  </div>
</div>
</center> 
</body>
</html>
