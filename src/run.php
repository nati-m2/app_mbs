<?php 
include "php_func/phpFunction.php"; 
 ?>
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
                   // function: "remove"
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
                    //console.log("ttt");
                    if (data != "") {
                        console.log(data);
                       if (data==="pause"){
                        x.pause(); 
                        document.getElementById("play").style.display = "block";
                         document.getElementById("pause").style.display = "none";
                       }
                        else  if (data.substring(0, 6)==="volume"){
                         slider.value=parseInt(data.substring(7));
                          
                         x.volume=slider.value/100;
                        }else{
                            //play song
                            var data2=data;
                            document.getElementById("song_n").innerHTML=data2;
                            data ="Media_Library/music/"+data;
                            document.getElementById("myAudio").src=data;
                            playAudio();
                            }
                             // location.reload();
                            RemoveFromDb();
                    }
                },
                error: function(xhr, status, error) {
                   console.error(xhr);
                }
            });
    }
    </script>
 
 </head>

    <body onload="setInterval('CheckTask()',1200),start() ">

<div id= "player_div" > 
        <audio   id='myAudio'  autoplay>
        <source src  type= 'audio/ogg'>
        <source src  type='audio/mpeg'>
        </audio>
        <p id="song_n"></p>
        <center>
        <input id='play' type="image"  src='img/play-icon.png' width='45' height='45' value='' onclick='playAudio()' >
       <input id='pause'  type="image"  src='img/Puse-icon.png' width='45' height='45' value='' onclick='pauseAudio()' >
        <div class='slidecontainer2'>
            <input type='range' min='0' max='' value='0' class='slider' id='c_time'>
        </div>
        </center>
        <div class='slidecontainer'>
        <img   id ='speaker'  src='img/speaker.png' width='27' height='27' >
        <input id='myRange' type='range' min='0' max='100' value class='slider'>
        </div>
        <center>
        <div class='s_time'>
        <p>  <i id='s_time'></i>:<i id='sec_time_s'></i>/<i id='e_time'></i>:<i id='sec_time'></i>  </p>
        </div>
        </center>
    </div>
    
       
    </body>
    <script src="player/play_logic.js"></script>
</html>