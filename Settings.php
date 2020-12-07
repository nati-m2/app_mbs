<head>
	<meta charset="UTF-8">
	<meta name="author" content="nati mizrhi">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
    <body>
        <?php
            include "php_func\phpFunction.php";
            include "sqli.php";
            $query="SELECT * FROM `settings`";
            $result=mysqli_query($connect,$query);
            $result_check=mysqli_num_rows($result);
            if($result_check>0){
                while($row=mysqli_fetch_assoc($result)){
                    echo "<input type=text placeholder=".$row['val']." name=val required><a href= update_set.php?id=".$row['id'].">:בחר</a></h1>";
                }
            }
            mysqli_close($connect);
            //update_set(1,"aaaa");
            echo pull_set("rrrrr");
        ?>
    </body>
