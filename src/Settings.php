
<html>
<?php include 'Sidebar.php';?>

<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
    <title>settings</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
    <body>
  
    <center>
    
    <div class="f_right">
    <h1>   הגדרות  מערכת</h1>
    <?php
            include "sqli.php";
            $query="SELECT * FROM `settings`";
            $result=mysqli_query($connect,$query);
            $result_check=mysqli_num_rows($result);
            if($result_check>0){
                while($row=mysqli_fetch_assoc($result)){
     		    $id=$row['id'];	
                    $val=$row['val'];
                    echo"
                    
                    <form action=update_set.php>
                    <p> :".$id."
                    ".$row['name'].": <input class=ordern type=text name=val  placeholder= ".$row['val']." required>
                    <input  class=sub_up type=submit  name=id  value=".$id.">עדכן
                    </form>
                    ";
                }
            }
            mysqli_close($connect);

        ?>
     
        </center>
        </div>
    </body>
    </html>