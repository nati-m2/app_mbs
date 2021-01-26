<?php if(!session_id())session_start(); 

 include 'sqli.php'; 
 include "php_func/phpFunction.php";
 if(!isset($_COOKIE["login"])) {
  echo" <script> location.replace('login.php'); </script>";
}



?>
<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home </title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link rel="stylesheet" type="text/css" href="style_Album.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
         crossorigin="anonymous"></script>
        <script>
                   $(document).ready(function(){
                
                    $("#s").keyup(function(){
                        var name= $("#s").val();
                      
                        $.post("load-c.php",{search: name}, function(data,status){
                            $("#search_res").html(data); 
                             });
                        });
                    });
        </script>
      <script src="ck.js"></script>
      <style>
      
.chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
 background-color: rgba(73, 74, 75, 0.637);
}

.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
}
</style>
</head>
<body>
<div class="background"></div>
<section>

    <div class="album-art f_right">
 
      <input id='s' type="text" value placeholder="Search..">

    </div>

     <div class="chip">
     <img src=" <?php echo $_SESSION['img']?>" alt="Person" width="20" height="20">
  <?php echo $_SESSION['user']?>:פלייליסט
  </div>
       <span>פתח במכשיר</>
       <span style='font-size:15px;cursor:pointer' onclick='openNav2()' >&#9776;</span>
      <div  class="scroll_n"> 
      
     
      <div class="album-tracks">
       <ol>
       <div id="search_res" >
    <?php   

     include 'devise.php';
    //  user , p where user=where  user  LIKE '". $user."'
    $user=$_SESSION['user'];
    include "sqli.php";
    $query="SELECT * FROM `song_t` where  user_n  LIKE '". $user."' ";
    $result=mysqli_query($connect,$query);
    $result_check=mysqli_num_rows($result);
    if($result_check>0){
        while($row=mysqli_fetch_assoc($result)){
          echo" <li>
          <span>".$row['name']."</span>
          <div>
          <span> </span>
          <span>
            <form class='in_line' action='devise_logic.php'   method='POST' >
            <input type='hidden'  name='val'  value='".$row['id']."'>
            <input type='hidden'  name='acc'   value='play'  >
            <input id='play'   type='image' value='submit' src='img/play.png' width='27' height='25'>
             </form>
          </span>
          </div>
           </li>";
        }
    }
    mysqli_close($connect);
    ?>
  
    </ol>
  </div>
  </div>  
</div>
</section>

<script>

function openNav2() {
    document.getElementById("myNav").style.height = "100%";
   
  }


  </script>


  </body>   
   </html>
