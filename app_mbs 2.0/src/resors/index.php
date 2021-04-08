<?php include 'sqli.php' ?>
<html>
    <head>
        <title></title>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
         crossorigin="anonymous"></script>
        <script>
                $(document).ready(function(){
                    var c=0;
                    $("#btn").click(function(){
                        c=c+2;
                        $("#test").load("load-c.php",{com: c , Lname: "data2"}
                     
                        ); 
                    });
                  
                });
        </script>

    </head>
        <body>
            <h1>ajax say: </h1>
<div id="test" >
        <p>00000000000</p>
<?php
/*
        $sql="SELECT * FROM `comments`  LIMIT 2 ";
        $res= mysqli_query($conn,$sql);
                if(mysqli_num_rows( $res)>0){
                        while($row= mysqli_fetch_assoc($res)){
                            echo "<p>". $row['at']."-".$row['msg']."</p>";
                        }

                }else{

                    echo "!!!"; 

                }
                mysqli_close($conn);
                */
?>

</div>
<button id="btn">click</button>
            
        </body>
</html>