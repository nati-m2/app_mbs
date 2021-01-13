<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: 'Lato', sans-serif;
}

.overlay {
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(255,255,255, 0.3);
  overflow-y: hidden;
  transition: 0.5s;
}

.overlay-content {
  position: relative;




}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color:  rgb(0,0,0);
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay {overflow-y: auto;}
  .overlay a {font-size: 20px}
  .overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>
</head>
<body>

<div id="myNav" class="overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <div class="overlay-content">
  <?php
            
             echo"<div class=navbar>";
             include "sqli.php";
                        $query="SELECT * FROM `devise`";
                        $result=mysqli_query($connect,$query);
                        $result_check=mysqli_num_rows($result);
                        if($result_check>0){
                            while($row=mysqli_fetch_assoc($result)){ 
                  echo" <a  href=devise_logic.php?Address=".$row['Address'].">".$row['devise_name']."</a>";
                  echo" 
                  <img id='play1' src='img/play-icon.png' width='45' height='45'>
                  <img id='pause1' src='img/Puse-icon.png' width='50' height='50' >
                  <input type='range' min='0' max='' value='0' class='slider' id='c_time'>
                  <img   id='speaker1'  src='img/speaker.png' width='27' height='27' >
                  <input id='myRange1' type='range' min='0 'max='100' value='10' class='slider' >
                  ";
               
                      }
                    }
            echo"</div>";
            mysqli_close($connect);
         
            ?>
  </div>
</div>




<script>
function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
</script>
     
</body>
</html>