<?php 
 include "sqli.php"; //  $connect


 
include "php_func\phpFunction.php";

$this_ip = get_ip();
$query=mysqli_query($connect,"select * from task_t where Address_d='$this_ip' and task='on'");
$row=mysqli_fetch_array($query);
if ($row){
    $song_name = $row['song_id'];
    if ($song_name){
        echo $song_name;
        exit;
    }
}


echo "";
exit;

?>

