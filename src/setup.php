<html>
		<head>
		<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
			<title>mbs</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<script src="0000ck.js"></script>
				<script src="000valid_all.js"></script>
<style>
/* Center the loader */
body{
    /*background-image:url("img/wallpaper3.jpg");*/
    background-color: #0a1a24;
    background-repeat:no-repeat;
    background-attachment: fixed;
    }

h1,p,h2{ color: white; 
}
.sub1 {
        font-size: 20px;
        width:100;
        height: 100;
        background-color: rgb(75, 57, 240);
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-left: 20;
        margin-top: 10;
      }
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
</head>
<body class="body_y" onload="myFunction()" style="margin:0;">    
		<center>
            <h1>מוכנים להתחיל</h1>



<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
  <h1>Tada!</h1>
 
	<a href ="setupsql.php" target="_top" type=submit  class="sub1">go</a>
	<a href ="index.php" target="_top" type=submit  class="sub1">ביטול</a>
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage,20000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>
</html>

		</center>
        </body>
</html>