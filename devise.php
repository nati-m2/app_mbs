<?php
if(isset($_GET['Address'])){
    session_start();
    $_SESSION["target"]=$_GET['Address'];
    header("Location:run.php");
    }

?><html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
    <body>
        <?php
            include "php_func\phpFunction.php";
            include "sqli.php";
            $query="SELECT * FROM `devise`";
            $result=mysqli_query($connect,$query);
            $result_check=mysqli_num_rows($result);
            if($result_check>0){
                while($row=mysqli_fetch_assoc($result)){
                echo "<form action=devise.php>
                    ".$row['devise_name'].": <input  class=sub_up type=submit  name=Address value=".$row['Address'].">עדכן</form>";
            }
        }
            mysqli_close($connect);


        ?>
    </body>
</html>