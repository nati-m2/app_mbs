<html>
<head>
<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home </title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="styles.css">
      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <script src="ck.js"></script>
	<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 120px;
  height: 120px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>
<script>
var myVar;


function loader(){
	document.getElementById("loader").style.display = "block";
}


</script>
</head>
<body class="body_y" onload="loader()" style="margin:0;">    
<div id="loader"></div>
  <div  id="myDiv" class="animate-bottom"></div>
</body>



</html><?php
include "php_func/phpFunction.php"; 


if(isset($_COOKIE["login"])) {
$it=(int)pull_set("maxfile");
  if(isset($_POST['upload']))
  {
  /*	if($_POST['foldername'] != "")
  	{*/  //$_POST['foldername'];
		  $foldername="Media_Library/music/"; //Media_Library/music/user
											  //Media_Library/photos/user
		$c=0;
  		if(!is_dir($foldername)) mkdir($foldername);
  		foreach($_FILES['files']['name'] as $i => $name){


		/*
		echo"
					<div class='w3-light-grey'>
         <div id='myBar' style='height:24px;width:'.".$c." ></div>
        </div>";

*/
			$c++;
  		    if(strlen($_FILES['files']['name'][$i]) > 1){
				$FileType = strtolower(pathinfo($name,PATHINFO_EXTENSION));
				if($FileType != "mp3" && $FileType != "wav" && $FileType != "m4a") {
					echo "Sorry, only mp3 and amr files are allowed.";
					break;
				  }
				  if (file_exists($name)) {
					echo "Sorry, file already exists.";
					break;
				  }
				 
				  if (filesize($name) > $it) {  //pull_set("max_file_size")){  //10000000 //pull from settings maxsimun file size
					echo "Sorry, your file is too large.";
					break;
				  }
				  echo "<p> <br>מעתיק:".$name."</p>";
				  $user=$_COOKIE["login"];
				if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$foldername."/".$user."/".$name)){		// :bool
					insert_song_t($name,$user);
				}
  		    }
  		}
  		echo "Folder is successfully uploaded";
  	
  	//else
  	  //  echo "Upload folder name is empty";
  }

}
//echo" <script> location.replace('upload.php'); </script>";


  ?>
