<?php if(!session_id())session_start(); ?>
<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home </title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link rel="stylesheet" type="text/css" href="style_Album.css">

</head>
<body>
<div class="background"></div>
<section>

    <div class="album-art">
		<img src="img/img_avatar1.gif" width='150' height='150'>
      <div class="actions">
        <div class="play">Play</div>
        <div class="bookmark">
    
        </div>
      </div>
    </div>
    <div class="album-details">
      <h2> <img src="#"/>1111</h2>
      <h1>Unleashed</h1><span> <span>ז'אנר</span><span></span></span>
    </div>
  </div>
  <div class="album-tracks">
    <ol>

    <?php

 
    include 'sqli.php'; 
    include "php_func\phpFunction.php";

    //  user , p where user=   
    $query="SELECT * FROM `song_t` ";
    $result=mysqli_query($connect,$query);
    $result_check=mysqli_num_rows($result);
    if($result_check>0){
        while($row=mysqli_fetch_assoc($result)){
     
         echo" <li> <span>".$row['name']."</span><span>זמן</span><span><a href=devise_logic.php?song_id=".$row['id']."><div class='play'>Play</div></a></li>";
        }
    }
    mysqli_close($connect);

?>
   
	
	
    </ol>
  </div>
</section>



  </body>   
   </html>
