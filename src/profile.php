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
    <style>

img {
        border-radius: 150px;
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
      <form class="" action="" method="post" >
            <h1><?php echo $_COOKIE["login"]; ?> :שם משתמש </h1>
            <h1>  pass <?php  ?>:סיסמה </h1>
          <p> <input type="checkbox" checked="checked" name="prev"> premesheng</p>
     
      </form>

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
          
                      echo"<p>".$row['id']." [משימה:".$row['name']."] ".$row['task']." [כתובת:".$row['Address_d']."][ערך:".$row['val']."] </p>";
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
            <input class="button button2"  type="file" name="fileToUpload" id="fileToUpload"  />
            <input class="button button2"  type="submit" value="Upload img" name="submit" />
          </form>
          <button class="button button2"  onclick="close0()" >סגור</button>
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
          <h1>מחיקת משתמש  אזור  מסוכן</h1>
         <h2>האם אתה בטוח שאתה רוצה למחוק את המשתמש זה?</h2>
         <h2> פעולה זו תמחק גם את כל הקבצים שהמשתמש ההעלה</h2>
         <a href="d_user.php" target="_top" id="b1">
        <button class="button button2" id="b2" onclick="openset_img()">מחק</button><a> <br><br>
      <button class="button button2"   onclick="close0()" >ביטול</button>
  
         
          </div>
  

          </center>
  
    </body>
</html>