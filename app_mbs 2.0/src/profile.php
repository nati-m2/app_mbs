<?php
include 'Sidebar.php';
include 'sqli.php';
if(!isset($_COOKIE["login"])) {
  echo" <script> location.replace('login.php'); </script>";
}
$user = $_COOKIE["login"];
$query="SELECT path FROM `user`  WHERE `firstname` LIKE '". $user."' ";
$result=mysqli_query($connect,$query);
$result_check=mysqli_num_rows($result);
if($result_check == 1){
    $row=mysqli_fetch_assoc($result);
    $img= $row["path"];
}
mysqli_close($connect);
?> 
<html>
<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="ck.js"></script>
    <script src="valid_all.js"></script>
    <style>

img {
        border-radius: 150px;
    }
    .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
  </style>
  </head>
    <body>
    <center>
    
    <button class="button button1" onclick="open_log()">פתח לוג משימות</button>
      <button class="button button2" id="b2" onclick="openset_img()">שנה תמונה</button>
        <a href="test.php" target="_top" id="b1">
        <button class="button button2" id="b2" onclick="openset_img()">מידע על השרת</button><a> 
        <a href="/:1242" target="_top" id="b1">
        <button class="button button2" id="b2" onclick="openset_img()">sql</button><a> 
        <button class="button button3" id="b1" onclick="openset()">פתח הגדרות</button>
        <button class="button button3" id="b1" onclick="open_d_user()">מחק משתמש</button>
    
    
    </center>
   
  
    <div class="f_right">
    
        <div class="avt-art">
    <img  src=<?php echo $img; ?> alt="Avatar"   width="200" height="200"  class="avatar">
    </div>
     
    <h1><?php echo $_COOKIE["login"]; ?> :שם משתמש </h1>      
    <button class="button button6" id="b1" onclick="open_change_password()">שנה סיסמה</button>
 
        
       
     
        
      </div>
      <center>
        <div id="log"   class="scroll_n">
      <h1>לוג  מערכת</h1>
      <?php
              include "sqli.php";
              $query="SELECT * FROM `task_t`";
              $result=mysqli_query($connect,$query);
              $result_check=mysqli_num_rows($result);
              if($result_check>0){
                  while($row=mysqli_fetch_assoc($result)){
          
                      echo"<p>".$row['id']." [משימה:".$row['name']."] ".$row['task']." [כתובת:".$row['Address_d']."][ערך:".$row['song_id']."] </p>";
                  }
              }
              mysqli_close($connect);
          ?>
          <button class="button button2"   onclick="close0()" >סגור</button>
          </div>
        <div id="mo">
        <div id="setimg" >
          <form action="up_img_p.php" method="post" enctype="multipart/form-data" >
            <p> Select img to upload:</p>
            <input class="button button2"  type="file"  name="file"  />
            <input class="button button2"  type="submit" value="Upload img" name="submit" />
          </form>
          <button class="button button2"  onclick="close0()" >סגור</button>
        </div>
     
          
          <div id="change_password"  >
          <br><br><br>
          <h2> שינוי סיסמה</h2>
          <form action="d_user.php" method="post"  onsubmit="return validpass() &&  checkpass()" >
          <input type="text" placeholder="סיסמה ישנה" name="old_password"  required> <br><br>
          <input type="password" placeholder=" סיסמה חדשה" name="password" id="pass" require><br><br>
          <input type="password" placeholder="שוב סיסמה" name="password2" id="pass2" require><br><br>
          <input  class=sub_up type=submit  name=id  value="עדכן">
          </form>
         <h1 style=" color:red;" id="result"></h1>
    
          </div>
              
      <div id="set">
      <h1>   הגדרות  מערכת</h1>
      <?php
              include "sqli.php";
              $query="SELECT * FROM `settings`";
              $result=mysqli_query($connect,$query);
              $result_check=mysqli_num_rows($result);
              if($result_check>0){
                  while($row=mysqli_fetch_assoc($result)){
              $id=$row['id'];	
                      $val=$row['val'];
                      echo"
                      <form action=update_set.php>
                      <p> :".$id."
                      ".$row['name'].": <input class=ordern type=text name=val  placeholder= ".$row['val']." required>
                      <input  class=sub_up type=submit  name=id  value=".$id.">עדכן
                      </form>
                      ";
                  }
              }
              mysqli_close($connect);
          ?>
      <button class="button button2"   onclick="close0()" >סגור</button>
          </div>
        </div>
        <div id="d_user" >


          <h1 style="color: #f44336;" >מחיקת משתמש  אזור  מסוכן</h1>
         <h2>בחר איזה מידע את/ה רוצה למחוק מהשרת </h2>
    
         <form action="d_user.php" method="post"  >
         <label class="switch">  
         <input type="checkbox" name= "user" value= "user" >
         <span class="slider round"> <br> <p>מחיקת משתמש</p></span>
        </label>
        <label class="switch">
         <input type="checkbox" name= "photos"  value="photos" >
         <span class="slider round">  <br> <p>מחיקת תיקיית תמונות</p></span>
        </label>

     
        <label class="switch">
         <input type="checkbox" name="music" value="music" >
         <span class="slider round">   <br> <p>מחיקת תיקיית מוזיקה</p> </span>
        </label>
        <br>   <br> <br>   <br> <br>
        <input type="submit" class="button button3">
        </form>



       
      <button class="button button2"   onclick="close0()" >ביטול</button>
  
         
          </div>
  

          </center>
  
    </body>
</html>