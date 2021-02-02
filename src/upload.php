<?php
include 'Sidebar.php';
  include_once "php_func/phpFunction.php"; 

if(!isset($_COOKIE["login"])) {
  echo" <script> location.replace('login.php'); </script>";
  
}?>
<html>
<html>
<head>
      <meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
			<title>upload</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
      <link rel="stylesheet" type="text/css" href="styles.css">

      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src="ck.js"></script>
     
</head>
<body>
<center>
  <div id="up">
    <button class="button button2"  onclick="o_music()">מוזיקה</button>
    <button class="button button3"  onclick="o_photos()">תמונה</button>
  </div>
    <div id="photos">  
                <h1>הכנסת תמונה למערכת</h1>
              <h2><?php echo $_COOKIE["login"]; ?> שים לב כל שיר שנכנס דרך הממשק יופיע  ישירות בחשבון של </h2> 
              <button class="button button2" onclick="o_updir_img()"> תיקיה</button>
              <button class="button button3"  onclick="o_file_img()">קובץ תמונה</button>
              </div>

              <div id="upfile_img">
                <form action="upload_logic.php" method="post" enctype="multipart/form-data" >
                <p> בחר קובץ</p>
                  <input type="file" name="fileToUpload" id="fileToUpload"  />
                  <input type='hidden'  name='up'   value='upfile_img'>
                  <input type="submit" class="button button2" onclick="loader1()" value="Upload " name="submit">
                </form>
                <button class="button button2" onclick="close3()">סגור</button>
                </div>
              <div id="updir_img">
              <form action="upload_logic.php" method="post" enctype="multipart/form-data"> 
              <p> בחר תיקייה להעלאה</p> 
              <input type='hidden'  name='up'   value='updir_img'>
            <input type='file'   name="files[]" id="files"  directory="" webkitdirectory="" moxdirectory="" multiple>
              <input type="Submit" class="button button2"  onclick="loader1()"  value="upload" name="upload" />
              </form>
              <button class="button button2" onclick="close3()">סגור</button>
            </div>

    </div>
        <div id="music">
                  <h1>הכנסת מוזיקה למערכת</h1>
                  <h2><?php echo $_COOKIE["login"]; ?> שים לב כל שיר שנכנס דרך הממשק יופיע  ישירות בחשבון של </h2>
                    <button class="button button2" id="b2" onclick="open_updir()"> תיקיה</button>
                    <button class="button button3" id="b2" onclick="open_upfile()">שיר</button>

            <div id="upfile">
              <form action="upload_logic.php" method="post" enctype="multipart/form-data" >
                  <p> בחר קובץ</p>
                  <input type='hidden'  name='up'   value='upfile_music'>
                <input type="file" name="fileToUpload" id="fileToUpload"  />
                <input type="Submit" id="bt" class="button button2"   onclick="loader1()" value="Upload" name="upload" />
              </form>
              <button class="button button2" onclick="close1()">סגור</button>
            </div>
            <div id="updir">
              <form action="upload_logic.php" method="post" enctype="multipart/form-data"> 
                      <p> בחר תיקיה להעלאה</p> 
            <input type='hidden'  name='up'   value='updir_music'>
            <input type='file'   name="files[]" id="files"  directory="" webkitdirectory="" moxdirectory="" multiple>
              <input type="Submit" id="bt" class="button button2"   onclick="loader1()" value="Upload" name="upload" />
              </form>
              <button class="button button2" onclick="close1()">סגור</button>
              </div>
              </div>

        <div id="loader"></div>
      </center>
</body>
</html>
