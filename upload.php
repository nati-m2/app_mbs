<!DOCTYPE html>
<html>
<body>

<form action="uploads.php" method="post" enctype="multipart/form-data" >
  Select folder to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"   multiple>
  <input type="submit" value="Upload folder" name="submit">
</form>

<?php

if(is_dir(string $filename)){




}else{




}



?>


<form action="uploads.php" method="post" enctype="multipart/form-data" >
  Select folder to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"   multiple>
  <input type="submit" value="Upload folder" name="submit">
</form>

<form action="upload_dir.php" method="post" enctype="multipart/form-data"> 
  Select Folder to Upload: <input type="file" name="files[]" id="files" multiple directory="" webkitdirectory="" moxdirectory="" /><br/><br/> 
  <input type="Submit" value="Upload" name="upload" />
  </form>
</body>
</html>
