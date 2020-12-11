<html>
    <head>
    <meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
            
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
    <p  id="demo">00000</p>
    <script>
    function myFunction() {
    document.getElementById("demo").innerHTML =  document.getElementById("myAudio").currentTime;
    }
    var aid = document.getElementById("myAudio"); 
    function playaid() {
    aid.play();
} 

playaid();
</script> 
    <?php
    if(isset($_SESSION["task"])){
   // session_start();
   $song=$_SESSION["task"];
    echo "<h1>";
    echo $_SESSION["task"];
    echo "</h1>";
    echo "
     <audio id= 'myAudio' controls autoplay preload='metadata' >
        <source src= 'Media_Library/".$song. "' type=audio/ogg>
        <source src= 'Media_Library/".$song. "' type=audio/mpeg>
     </audio>";

     //sleep(2);
     unset($_SESSION["task"]);
    }
?>


    </body>
</html>