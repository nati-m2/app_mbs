<html>
<head>
<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
        <title>mbs</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="styles.css">
				<script src="ck.js"></script>
        <script src="valid_all.js"></script>
</head>

<body>
<?php

include_once 'sqli.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name=$_POST['name'];
    $password=$_POST['password'];
    if ((empty($name)) || (empty($password))) {
        echo "חייב למלא שם וסיסמה <br>";
    }else{
    $query="SELECT * FROM `user` WHERE `firstname`='".$name."'";
    $result=mysqli_query($connect,$query);
    if(mysqli_num_rows($result) > 0){
        echo "השם כבר קיים במערכת";
        mysqli_close($connect);
    }
    else{
    $query = "INSERT INTO `user`(`firstname`, `pass`,`path`) 
    VALUES('".$name."' ,'".md5($password)."',' img/img_avatar.png')";
    if (!mysqli_query($connect,$query)){
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
    //header("Location:   .php");
    mysqli_close($connect);
    chdir ("Media_Library/" );
    mkdir($name);
    echo "!!נרשמת בהצלחה $name";
      echo" <script> location.replace('index.php'); </script>";
}
}
}
?>
</body>

</html>