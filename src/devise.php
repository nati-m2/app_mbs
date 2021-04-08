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
  <br>
  <br><br>
  <table>
  <tr><th><p>מכשירים</p></th><tr>
    <td>
 
    <?php
    echo"<div class='navbar'>";
    include "sqli.php";
               $query="SELECT * FROM `devise`";
               $result=mysqli_query($connect,$query);
               $result_check=mysqli_num_rows($result);
               if($result_check>0){
                   while($row=mysqli_fetch_assoc($result)){ 
           echo  "<p>" .$row['devise_name']."<p>";
        echo"
        <form class='in_line' action='devise_logic.php' method='POST' >
        <input type='hidden'  name='Address'  value='".$row['Address']."'>
        <input type='hidden'  name='acc'   value='volume'  >
         <input class='slider_v' style='width: 600;'  type='range' name='val'  min='1' max='100' value='' >
         <input type='submit' class='button button5' value='עדכן'>
         </form>";

        
            /// chak if sync is on

        if($row['sync']){
         echo"
        <form class='in_line' action='devise_logic.php' method='POST' >
        <input type='hidden'  name='Address'  value='".$row['Address']."'>
        <input type='hidden'  name='acc'   value='sync'>
        <input type='hidden'  name='toggel'   value='false'>
        <input type='submit' class='button button3' value='sync'>
        </form>";
      }else{
        echo"
        <form class='in_line' action='devise_logic.php' method='POST' >
        <input type='hidden'  name='Address'  value='".$row['Address']."'>
        <input type='hidden'  name='acc'   value='sync'>
        <input type='hidden'  name='toggel'   value='true'>
        <input type='submit' class='button button2' value='sync'>
        </form>";
      }
      echo"
      <form class='in_line' action='devise_logic.php' method='POST' >
      <input type='hidden'  name='Address'  value='".$row['Address']."'>
      <input type='hidden'  name='acc'  value='prev'>
      <input type='submit' class='button button1' value='prev'>
      </form> ";
    
        echo"
        <form class='in_line' action='devise_logic.php' method='POST' >
        <input type='hidden'  name='Address'  value='".$row['Address']."'>
        <input type='hidden'  name='acc'   value='pause'>
        <input type='submit' class='button button4 ' value='pause'>
        </form> ";
        echo"
        <form class='in_line' action='devise_logic.php' method='POST' >
        <input type='hidden'  name='Address'  value='".$row['Address']."'>
        <input type='hidden'  name='acc'   value='play'>
        <input type='submit' class='button button1' value='play'>
        </form> ";
      
        echo"
        <form class='in_line' action='devise_logic.php' method='POST' >
        <input type='hidden'  name='Address'  value='".$row['Address']."'>
        <input type='hidden'  name='acc'  value='next'>
        <input type='submit' class='button button1' value='next'>
        </form> ";
      
       
         echo"</span><br>";
             }
           }
  
   mysqli_close($connect);
  
   ?>
 
  </tr>

</table>

  </div>
</div>

</body>
</html>


