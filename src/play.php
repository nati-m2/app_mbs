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
        echo  pull_music($row['val']); 
        exit;
    }else if($row['name']=='volume'){     // var= $row['name']:$row['song_id'] // "volume:84"
        echo 'volume'.":".$row['val'];
        exit;
    }
    else if($row['name']=='pause'){     // 
        echo 'pause';
        exit;
    }
    else if($row['name']=='next'){     // 
        echo 'next';
        exit;
    }
    else if($row['name']=='prev'){     // 
        echo 'prev';
        exit;
    }



}

echo "";
exit;

?>

