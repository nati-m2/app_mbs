
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
            body {
              font-family: Arial, Helvetica, sans-serif;
              
            }
            
            .navbar {
            
              overflow: hidden;
              background-color: #333;
              width: 150;
              margin-top:1 ;
            
            }
            
            .navbar a {
              width: 150;
              float: left;
              font-size: 14px;
              color: white;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
            }
            
            .dropdown {
              float: left;
              overflow: hidden;
            }
            
            
            .navbar a:hover, .dropdown:hover .dropbtn {
                background-color: rgb(46, 156, 245);
            }
            </style>
</head>
        <body class="body_x">
            <?php
            
             echo"<div class=navbar>";
             include "sqli.php";
                        $query="SELECT * FROM `devise`";
                        $result=mysqli_query($connect,$query);
                        $result_check=mysqli_num_rows($result);
                        if($result_check>0){
                            while($row=mysqli_fetch_assoc($result)){
                  echo" <a  href=devise_logic.php?Address=".$row['Address'].">".$row['devise_name']."</a>";
                      }
                    }
            echo"</div>";
            mysqli_close($connect);
            ?>

                          
      

    </body>
</html>