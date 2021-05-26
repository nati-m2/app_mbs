<?php
include "php_func/phpFunction.php"; 
include_once 'Sidebar.php';
if(!isset($_COOKIE["login"])) {
	echo" <script> location.replace('login.php'); </script>";
  }
if(isset($_GET['devise']) && isset($_COOKIE["login"])){
$devise_cookie=$_GET['devise'];
setcookie("devise",$devise_cookie,time() + (86400 * 365), "/");
update_devise($devise_cookie);
 echo" <script> location.replace('index.php'); </script>";
}

if(isset($_COOKIE['devise']) && isset($_GET['reset_d'])){
	$devise_cookie=$_COOKIE['devise'];
	setcookie("devise", "", time() - 3600);
	reset_devise($devise_cookie);
	echo" <script> location.replace('newDevise.php'); </script>";
}
	

?>  
<html>
		<head>
		<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
			<title>mbs</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="styles.css">
				
		</head>
		<body class="body_y">



					<body class="myDevise">
					<h1 >המכשירים שלי </h1><br>
						<?php
						 include "sqli.php";
              			$query="SELECT * FROM `devise`";
              			$result=mysqli_query($connect,$query);
               			$result_check=mysqli_num_rows($result);
               			if($result_check>0){
                   		while($row=mysqli_fetch_assoc($result)){ 
						    echo  "<h2>" .$row['devise_name']."</h2>";
						   }
						}
						?>
					</div>

				<center>
					<form action="newDevise.php" method="GET" onsubmit="/*return  validpass();*/">
							<h2 >רישום מכשיר</h2><br>
							 <p> 
								שם מכשיר 
								 <br>
								 <input type="text" name="devise" id="devise" >
								<br><br>
								<input class="sub" type="submit" name="submit" value="סיים">
								<br><br>
							 </p>
						</form>
						



					<?php 
							if(isset($_COOKIE['devise'])){
								echo"
								<h2 >אפוס מכשיר</h2><br>
								<h2> מכשיר זה מזוהה על שם ".$_COOKIE["devise"] ."<h2>
								<form action='newDevise.php' method='GET' >
		  						<input type='hidden'  name='reset_d'  value=".$_COOKIE['devise'].">
								<input class='sub2' type='submit' name='submit' value='שכח '>
								</form>";
							}
					?>

<pre>
<p >לידעתך
 מערכת זו מזהה מכשירים על פי עוגיות במידה ומחקת את העוגיות
 בדפדפן ושם המכשיר עדיין מופיע תחת  מכשירים שלי 
הכנס את אותו השם והמערכת תעדכן את מסד הנתונים
במידה והינך מעוניין למחוק מכשיר, רשום את הדפדפן שלך לאותו שם שהינך מעוניין 
למחוק ולחץ שכח
פעולה זו תמחק מכשיר זה גם ממסד נתונים וגם מהדפדפן שלך
 </p></pre><br>
					</center>
				</body>
</html>