<html>
    <head>
    <meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
				<title>home</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" type="text/css" href="player/play_st.css">
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
                        playAudio();
                        time_play();
                        playaid();
                     
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr);
                }
            });
    }
    </script>
 
 </head>

    <body onload="setInterval('CheckTask()', 1000),start() ">
  
    <p id="demo"></p>
    <p  id="demo2">xxx</p>
    <?php
    if(isset($_SESSION["task"])){
   $song= "Media_Library/".$_SESSION["task"];
    echo "<h1>";
    echo  $_SESSION["task"];
     "</h1>";
     echo" <br>";
    unset($_SESSION["task"]);
    }
?>


<div id= "player_div" > 
        <audio   id='myAudio' autoplay>
        <source src= '<?php echo $song; ?>'  type= 'audio/ogg'>
        <source src= '<?php echo $song; ?>'  type='audio/mpeg'>
        </audio>
        <center>
        <img id='play' src='img/play-icon.png' width='45' height='45' onclick='playAudio()'>
        <img id='pause' src='img/Puse-icon.png' width='45' height='45' onclick='pauseAudio()'>
        <br>
        
        <div class='slidecontainer2'>
            <input type='range' min='0' max='' value='0' class='slider' id='c_time'>
        </div>
        <div class='s_time'>
        <p>  <i id='s_time'></i>:<i id='sec_time_s'></i>/<i id='e_time'></i>:<i id='sec_time'></i>  </p>
        </div>
        </center>

        <div class='slidecontainer'>
        <img   id ='speaker'  src='img/speaker.png' width='27' height='27' >
        <input id='myRange' type='range' min='0' max='100' value='10' class='slider'   >
        </div>
        

    </div>
        <div class='speaker_m'>
            <img   id ='speaker_m'  src='img/speaker_m.png' width='55' height='55' >
            </div>
        <iframe  id ='speaker_devise' class="" src="devise.php" width="217" height="" style="border:none;"></iframe>
       


    </body>
    <script src="player/play_logic.js"></script>
</html>



