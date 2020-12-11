<?php
include "php_func\phpFunction.php";
if($_SERVER['REQUEST_METHOD'] == 'GET'){
if(isset($_GET['Address'])){
    session_start();
    unset($_SESSION["task"]);
    $Address= $_GET['Address'];
    $task= "on";
    $name= "play";
    $song_n = "Celine Dion - Im Alive.mp3";
    insert_task($name,$task,$Address,$song_n);
    //header("Location:index.php");
    }
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body >
        <?php
            
            include "sqli.php";
            $query="SELECT * FROM `devise`";
            $result=mysqli_query($connect,$query);
            $result_check=mysqli_num_rows($result);
            if($result_check>0){
                while($row=mysqli_fetch_assoc($result)){
                echo "<form action=devise.php method=GET >
                    ".$row['devise_name'].": <input  class=sub_up type=submit  name=Address value=".$row['Address'].">עדכן</form>";
            }
        }
            mysqli_close($connect);
        ?>
       <iframe class="player" src="player.php" width="100%" height="170" style="border:none;"></iframe>

    </body>
</html>