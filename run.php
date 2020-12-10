<html>
    <head>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>

    function RemoveFromDb(){
        $.ajax({
                type: "POST",
                url: "remove.php",
                data: {
                    function: "remove"
                },
                cache: false,
                success: function(data) {
                        console.log('remove');

                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
    }
    function CheckTask(){
        $.ajax({
                type: "POST",
                url: "play.php",
                data: {
                    function: "update"
                },
                cache: false,
                success: function(data) {
                    if (data != "") {
                        console.log(data);
                        // play song
                        RemoveFromDb();
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
    }
        
    </script>

    </head>
    <body onload="setInterval('CheckTask()', 1000)">

  
    <?php
    if(isset($_SESSION["task"])){
   // session_start();
   $song=$_SESSION["task"];
    echo "<h1>";
    echo $_SESSION["task"];
    echo "</h1>";
        
    echo "
     <audio controls autoplay>
        <source src= 'Media_Library/".$song. "' type=audio/ogg>
        <source src= 'Media_Library/".$song. "' type=audio/mpeg>
     </audio>";
     unset($_SESSION["task"]);
    }
   
?>


    </body>
</html>