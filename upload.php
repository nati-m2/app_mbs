<!DOCTYPE html>
<html>
<body>

<form action="uploads.php" method="post" enctype="multipart/form-data" >
  Select file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload"  webkitdirectory  multiple />
  <input type="submit" value="Upload folder" name="submit">
</form>

<form action="upload_dir.php" method="post" enctype="multipart/form-data"> 
  Select Folder to Upload: <input type="file" name="files[]" id="files"  directory="" webkitdirectory="" moxdirectory="" multiple><br/><br/> 
  <input type="Submit" value="Upload" name="upload" />
  </form>
</body>
</html>
