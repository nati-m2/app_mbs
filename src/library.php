<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
		<meta name="author" content="nati mizrhi">
		<title>library</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="styles.css">
		<script src="ck.js"></script>
        <script src="valid_all.js"></script>
    </head>
<body>

<h1>dddddddddddddddddddd</h1>

<?php
//LIKE '". $user."'


$search="L";

 include "sqli.php";
    $query="SELECT * FROM `song_t` where  `name` LIKE '%".$search."%'  ";
    $result=mysqli_query($connect,$query);
    $result_check=mysqli_num_rows($result);
    echo "<p>" .$result_check."</p>";
    if($result_check>0){
        while($row=mysqli_fetch_assoc($result)){

                    echo "<p>". $row['name']." ".$row['user_n']."</p>";
            }
        }


        mysqli_close($connect);

?>





<table>
      <tr>
        <th><?php  
        
        
        ?> </th>
      </tr>
      </table>
</body>
</html>