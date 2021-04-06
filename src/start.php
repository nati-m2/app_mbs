<?php if(!session_id())session_start(); 
if(isset($_GET['user'])&&isset($_GET['img']) ){
    $_SESSION['login']=$_GET['user'];
    $_SESSION['img']= $_GET['img'];
  }

?>
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
                ?>
                </div>


                <?php

    $addr= get_ip();
               $query="SELECT * FROM `devise`   WHERE  '.$addr.' ";
               $result=mysqli_query($connect,$query);
               $result_check=mysqli_num_rows($result);
               if($result_check==0)
                 echo "<p>המכשיר לא רשום</p>";
                  ?>


              
<center>
    <iframe src="main.php" width="100%" height="69%"  name="main"  style="border:none;"></iframe>
    <div class="player">
        <iframe  src="run.php" width="100%" height="19%" style="border:none;"></iframe>
    </div>
</center>
    
    </div>


  </body>   
      </html>
