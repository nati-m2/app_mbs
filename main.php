<?php if(!session_id())session_start(); 
?>
<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home </title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link rel="stylesheet" type="text/css" href="style_Album.css">
      <script src="ck.js"></script>

</head>
<body>
<div class="background"></div>
<section>

    <div class="album-art">
		<img src="img/img_avatar1.gif" width='150' height='150'>
    </div>
     <h1><?php echo $_SESSION['user']?>:פליליסט</h1><span>
       <span>ז'אנר</span>
  <div  class="scroll_n">
  <div class="album-tracks">
    <ol>

    <?php   
     include 'devise.php';
    include 'sqli.php'; 
    include "php_func\phpFunction.php";
    //  user , p where user=where  user  
    
    $user=$_SESSION['user'];
    $query="SELECT * FROM `song_t`  WHERE `user_n` LIKE '". $user."' ";
    $result=mysqli_query($connect,$query);
    $result_check=mysqli_num_rows($result);
    if($result_check>0){
        while($row=mysqli_fetch_assoc($result)){
         echo" <li>
         <span>".$row['name']."</span>
         <div>
         <span>זמן</span>
         <span style='font-size:15px;cursor:pointer' onclick='openNav()'>&#9776;</span>
         <span><a  href=devise_logic.php?song_id=".$row['id'].">
         <img src='img/play.png' width='27' height='25'></a></span>
         </div>
          </li>";
        }
    }
    mysqli_close($connect);

?>
  
    </ol>
  </div>
  </div>
</section>



  </body>   
   </html>
