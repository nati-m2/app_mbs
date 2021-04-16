<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" type="text/css" href="devise.css">
<script src="ck.js"></script>

</head>
<body> 
<br>

<br>


<div id="myNav" class="overlay ">
<div class="overlay-content  scroll_n2">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav2()">&times;</a>
  <br>  <br>  <br>
  <br><br>
  <table>
  <tr><th><p>מכשירים מרוחקים</p></th><tr>
    <td>
 <center>



    <?php
    echo"<div class='navbar'>";
    include "sqli.php";
               $query="SELECT * FROM `devise`";
               $result=mysqli_query($connect,$query);
               $result_check=mysqli_num_rows($result);
               if($result_check>0){
                echo  "<div id='bt_p'> ";
                   while($row=mysqli_fetch_assoc($result)){ 
                      echo  "<span  ><p>" .$row['devise_name']." נגן ב</p></span>";
                      echo"
                      <form class='in_line' action='devise_logic.php' method='POST' >
                      <input type='hidden'  name='devise_name'  value='".$row['devise_name']."'>
                      <input type='hidden'  name='acc'   value='volume'  >
                      <input class='slider_v'   type='range' name='val'  min='1' max='100' value='' >
                      <input class='icon'    type='image' value='submit' src='img/ri-volume.png' >
                      </form>";
                          /// chak if sync is on

                      if($row['sync']){
                      echo"
                      <form class='in_line' action='devise_logic.php' method='POST' >
                      <input type='hidden'  name='devise_name'  value='".$row['devise_name']."'>
                      <input type='hidden'  name='acc'   value='sync'>
                      <input type='hidden'  name='toggel'   value='false'>
                      <input   class='icon'  type='image' value='submit' src='img/ri-sync-off.png'  >
                      </form>";
                    }else{
                      echo"
                      <form class='in_line' action='devise_logic.php' method='POST' >
                      <input type='hidden'  name='devise_name'  value='".$row['devise_name']."'>
                      <input type='hidden'  name='acc'   value='sync'>
                      <input type='hidden'  name='toggel'   value='true'>
                      <input  class='icon'  type='image' value='submit' src='img/ri-sync.png'  >
                      </form>";
                    }
                    echo"
                    <form class='in_line' action='devise_logic.php' method='POST' >
                    <input type='hidden'  name='devise_name'  value='".$row['devise_name']."'>
                    <input type='hidden'  name='acc'  value='prev'>
                    <input   class='icon' type='image' value='submit' src='img/ri-prev.png'>
                    </form> ";
                  
                      echo"
                      <form class='in_line' action='devise_logic.php' method='POST' >
                      <input type='hidden'  name='devise_name'  value='".$row['devise_name']."'>
                      <input type='hidden'  name='acc'   value='pause'>
                      <input  class='icon'  type='image' value='submit' src='img/ri-pause.png' >
                      </form> ";
                      echo"
                      <form class='in_line' action='devise_logic.php' method='POST' >
                      <input type='hidden'  name='devise_name'  value='".$row['devise_name']."'>
                      <input type='hidden'  name='acc'   value='play'>
                      <input  class='icon'  type='image' value='submit' src='img/ri-play.png'  >
                      </form> ";
                    
                      echo"
                      <form class='in_line' action='devise_logic.php' method='POST' >
                      <input type='hidden'  name='devise_name'  value='".$row['devise_name']."'>
                      <input type='hidden'  name='acc'  value='next'>
                      <input class='icon'   type='image' value='submit' src='img/ri-next.png' >
                      </form> ";
                    
                      
                      echo"</span><br><br></div>";
             }
           }
  
   mysqli_close($connect);
  
   ?>
   </td>
  </tr>

</table>

  </div>
</div>
</center>
</body>
</html>


