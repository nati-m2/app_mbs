<?php if(!session_id())session_start();

include "php_func\phpFunction.php"; 
?>
<html>
		<head>
		<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>Sidebar</title>
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
                        <?php date_default_timezone_set("israel");
                          echo "<p>".date("G:i:s  -  d/m/y")."</p>";

                         if(!isset($_SESSION["login"])){
                          
                            echo "<a href='login.php'>login</a>";   
                            }else{
                                echo "<a href='profile.php'>".$_SESSION["login"]."</a>"; 
                                echo "<a href='logout.php'>logout</a>"; 
                             }
                        ?>
                         <a href="index.php" target="_top">בית</a>
                         
                         <a href="upload.php" onclick="closeNav()" target="main">uploads</a>
                       
                         <a ><?php echo " כתובת :".get_ip(); ?> </a>
                        <a  href="Settings.php" onclick="closeNav()" >settings</a>
                        <a  href="newDevise.php" onclick="closeNav()" >newDevise</a>   
                        <p>  מכשירים  </p>    
                        <?php
                        include "sqli.php";
                        $query="SELECT * FROM `devise`";
                        $result=mysqli_query($connect,$query);
                        $result_check=mysqli_num_rows($result);
                        if($result_check>0){
                            while($row=mysqli_fetch_assoc($result)){
                                  
                  echo" <a href=devise_logic.php?Address=".$row['Address']." >".$row['devise_name']."</a>";
                      }
                    }
            echo"</div>";
           // mysqli_close($connect);
           // exit;
        
            ?>




                  </div>
</div>
</center> 
</body>
</html>
