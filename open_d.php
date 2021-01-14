
<?php

if(isset($_GET['song_id']))
    $_SESSION['song_id']=$_GET['song_id'];
    
   echo "<script>openNav2();</script>";
   header("Location: main.php");
?>