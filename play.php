<?php 
 include "sqli.php"; //  $connect


 
include "php_func\phpFunction.php";

$this_ip = get_ip();
$query=mysqli_query($connect,"select * from task_t where Address='$this_ip' and name='play'");
$row=mysqli_fetch_array($query);
if ($row){
    $song_name = $row['song_n'];
    if ($song_name){
        echo $song_name;
        exit;
    }
}


echo "";
exit;

?>

