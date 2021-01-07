<!DOCTYPE html>
<html>
<html>
<head>
			<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home </title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="styles.css">
  

</head>
<body>
<center>
<?php
if(!session_id())session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
}
?>
<form action="uploads.php" method="post" enctype="multipart/form-data" >
 <p> Select file to upload:</p>
  <input type="file" name="fileToUpload" id="fileToUpload"  />
  <input type="submit" value="Upload folder" name="submit">
</form>

<form action="upload_dir.php" method="post" enctype="multipart/form-data"> 
<p>  Select Folder to Upload:</p>  <input type="file" name="files[]" id="files"  directory="" webkitdirectory="" moxdirectory="" multiple><br/><br/> 
  <input type="Submit" value="Upload" name="upload" />
  </form>
  </center>
</body>
</html>
