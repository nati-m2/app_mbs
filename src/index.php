<?php  
  include "sqli.php";
include 'Sidebar.php';
if(!isset($_COOKIE["login"])) {
  echo" <script> location.replace('login.php'); </script>";
}
?>

<html>
<body>


<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  

<style>
.card {

  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 270;
  margin-top: 200;
  border-radius: 5px;
  display: inline-block;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,1,1);
}
img {
  border-radius: 150px;
}


.container {
  padding: 2px 16px;
}
</style>
</head>
<body>
<center>
<?php

  
    
      $query="SELECT * FROM `user` ";
      $result=mysqli_query($connect,$query);
      $result_check=mysqli_num_rows($result);
      if($result_check>0){
          while($row=mysqli_fetch_assoc($result)){
            echo" 
    
            <div class='card'>
            <a href='start.php?user=".$row['firstname']."&&img=".$row['path']."'>
         <img src=".$row['path']." alt='Avatar' width='250px' height='250px'   ></a> 
         <div class='container'>
         <h1><b>".$row['firstname']."</b></h1> 
         
       </div>
     </div>
      
        
   
        ";
    
          }
        }
        else{
          echo"
            <a class='sub1' href ='register_user.php' >עוד לא רשום</a>";
          }
          
    ?>


        
</center>

  
  
</body>
</html>
