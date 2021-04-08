<?php
include 'sqli.php'; 
include 'Sidebar.php';
if(isset($_COOKIE["login"])) {
	$user=$_COOKIE["login"];
  }else{
	echo" <script> location.replace('login.php'); </script>";
  }

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="styles.css"> 	
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  text-align: center;
  padding: 32px;
}

.row {
  display: -ms-flexbox; /* IE 10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE 10 */
  flex-wrap: wrap;
  padding: 0 4px;
}

/* Create two equal columns that sits next to each other */
.column {
  -ms-flex: 12.5%; /* IE 10 */
  flex: 12.5%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
}

/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  font-size: 18px;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
}
</style>
</head>
<body>

<!-- Header -->
<div class="header" id="myHeader">
  <h1>זיכרונות שלך</h1>
  <p>מספר עמודות</p>
  <button class="btn" onclick="one()">1</button>
  <button class="btn " onclick="two()">2</button>
  <button class="btn active" onclick="four()">5</button>
</div>

<!-- Photo Grid -->
<div class="row"> 
<?php


$query="SELECT * FROM `photos` WHERE  user_n = '".$user."'";
$result=mysqli_query($connect,$query);
$result_check=mysqli_num_rows($result);
if($result_check>0){
$c=0;


 $c2=((int)($result_check/5)+1);

echo" <div class='column'> ";
	while($row=mysqli_fetch_assoc($result)){
		$c=$c+1;
		$img= "Media_Library/photos/".$user."/".$row['name'];
		echo" <img src=".$img." style='width:99%'>";
		if($c%2!=0){
		if($c==$c2){
			echo"</div>";
			echo" <div class='column'> ";
			$c=0;
		}
	}
		
	}
  }
  mysqli_close($connect);


?>
 

</div>

<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// Full-width images
function one() {
    for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "100%";  // IE10
    elements[i].style.flex = "100%";
  }
}

// Two images side by side
function two() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "35%";  // IE10
    elements[i].style.flex = "35%";
  }
}

// Four images side by side
function four() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.msFlex = "12.5%";  // IE10
    elements[i].style.flex = "12.5%";
  }
}

// Add active class to the current button (highlight it)
var header = document.getElementById("myHeader");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

</body>
</html>




