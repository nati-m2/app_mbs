<?php 
include "sqli.php"; //  $connect

include "php_func/phpFunction.php";

$this_ip = get_ip();
$query=mysqli_query($connect,"select * from task_t where Address_d='$this_ip' AND task='on'");
$row=mysqli_fetch_array($query);
if (mysqli_num_rows($query)>1){
    mysqli_query($connect," DELETE FROM `task_t` ");
}

if ($row){
   if($row['name']=='play'){
        echo  pull_song_t($row['song_id']); 
        exit;
    }else if($row['name']=='volume'){     // var= $row['name']:$row['song_id'] // "volume:84"
        echo 'volume'.":".$row['song_id'];
        exit;
    }
    else if($row['name']=='pause'){     // var= $row['name']:$row['song_id'] // "volume:84"
        echo 'pause';
        exit;
    }



}

echo "";
exit;

?>

