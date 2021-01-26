<?php if(!session_id())session_start(); 




?>
<!DOCTYPE html>
<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home </title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="styles.css">
                <script src="ck.js"></script>
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
                    document.getElementById("s").value=name;
        </script>

    </head>
        <body>
<div class="background"></div>
<section>

    <div class="album-art">
    <center>
      <input id='s' type="text" value placeholder="Search..">
</center>

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
    include 'sqli.php'; 
    $query="SELECT * FROM `song_t` where  user_n  LIKE '". $user."' ";
    $result=mysqli_query($connect,$query);
    $result_check=mysqli_num_rows($result);
    if($result_check>0){
        while($row=mysqli_fetch_assoc($result)){
          echo" <li>
          <span>".$row['name']."</span>
          <div>
       
          <span>
            <form class='in_line' action='devise_logic.php'   method='POST' >
            <input type='hidden'  name='val'  value='".$row['id']."'>
            <input type='hidden'  name='acc'   value='play'  >
            <input id='play'   type='image'  src='img/play.png' width='27' height='25'>
         </form>
         <span>  </span>
         <form class='in_line' action='devise_logic.php'   method='POST' >
         <input type='hidden'  name='d'  value='".$row['id']."'>
         <input id='play'   type='image'  src='img/trash.png' width='27' height='25'>
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
</section>

<script>

function openNav2() {
    document.getElementById("myNav").style.height = "100%";
   
  }
</script>

    
</body>
</html>