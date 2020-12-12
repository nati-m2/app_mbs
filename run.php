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
                        playaid();
                        time_play();
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
    }
    </script>
 <script>
    var duration_aid = document.getElementById("Audio").duration; 
    var currentTime_aid = document.getElementById("Audio").currentTime; 

    function time_play() {
        document.getElementById("demo").innerHTML =  currentTime_aid;
        document.getElementById("demo2").innerHTML =  duration_aid;
    }
    function playaid() {
        aid.play();
    }
time_play();
playaid();
   </script> 
 </head>
    <body onload="setInterval('CheckTask()', 1000)">
    <p  id="demo" ></p>
    <p  id="demo2"></p>
    <?php
      session_start();
    if(isset($_SESSION["task"]) && $_SESSION["task"]!='0'){
   $song=$_SESSION["task"];
    echo "<h1>";
    echo  $song;
    echo "</h1>";
    echo "
     <audio id='Audio'   autoplay controls preload='metadata' >
        <source src= 'Media_Library/".$song. "' type=audio/ogg>
        <source src= 'Media_Library/".$song. "' type=audio/mpeg>
     </audio>";
     unset($_SESSION["task"]);
    }
?>


    </body>
</html>