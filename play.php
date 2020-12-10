<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="nati mizrhi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
       

   
    </head>
    <body>
<br><br><br><br><br><br><br>


<br><br><br>
<center>
<?php 
include "php_func\phpFunction.php";
echo "<h1>";

echo pull_task(get_ip(),3); 

  //  update_task(get_ip(),"playing");

echo "</h1>";
?>
     <audio controls autoplay>
        <source src=" <?php echo "img/".pull_task(get_ip(),3); ?>" type="audio/ogg">
        <source src=" <?php echo "img/".pull_task(get_ip(),3); ?>"type="audio/mpeg">
     </audio> 
</center>    


    </body>
</html>