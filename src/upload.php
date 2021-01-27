<?php
include 'Sidebar.php';
if(!isset($_COOKIE["login"])) {
  echo" <script> location.replace('login.php'); </script>";
  
}?>
<html>
<html>
<head>
<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home </title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src="ck.js"></script>
      
</head>
<body  style="margin:0;">


<center>

<div id="music">
       <h1>הכנסת מוזיקה למערכת</h1>
       <h2><?php echo $_COOKIE["login"]; ?> שים לב כל שיר שנכנס דרך הממשק יופיע  ישירות בחשבון של </h2>
        <button class="button button2" id="b2" onclick="open_updir()"> תקייה</button>
       
        <button class="button button2" id="b2" onclick="open_upfile()">שיר</button>
<div id="upfile">
  <form action="uploads.php" method="post" enctype="multipart/form-data" >
      <p> Select file to upload:</p>
    <input type="file" name="fileToUpload" id="fileToUpload"  />
    <input type="submit" value="Upload " name="submit">
  </form>
  <button class="button button2" onclick="close1()">סגור</button>
</div>
<div id="updir">
  <form action="upload_dir.php" method="post" enctype="multipart/form-data"> 
          <p> בחר תיקיה להעלאה</p> 
 <input type='file'   name="files[]" id="files"  directory="" webkitdirectory="" moxdirectory="" multiple>
  <input type="Submit" class="button button2"   value="Upload" name="upload" />
  </form>
  <button class="button button2" onclick="close1()">סגור</button>
  </div>






 



  </center>


  



</body>
</html>
