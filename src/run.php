<?php 
include "php_func/phpFunction.php"; 
 ?>
<html>
    <head>
    <meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
			<title>mbs</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
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
                       // console.log('remove');
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
                    console.log(data); 
                    if (data != "") {
                       if (data==="pause"){
                        x.pause(); 
                        document.getElementById("play").style.display = "block";
                         document.getElementById("pause").style.display = "none";
                       }
                        else  if (data.substring(0, 6)==="volume"){  // volume:65     
                         slider.value=parseInt(data.substring(7));
                         x.volume=slider.value/100;  
                        }else if (data==="next"){
                            //play song       
                           
                            play_next_bt();
                        }else if (data==="prev"){
                            play_prev_bt();
                        }else{
                             queue.push(data);  
                             open_q(); 
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
       
        <input  id='close_q'    type="image"  src='img/queue_close-icon.png' width='40' height='40'  onclick='close_q()' >
        <div id="queue_div" class="queue_div_c " >
            <h3 id="ne" >הבא בתור</h3><br>
            <p id="song_queue" class="queue_div_c"> תור ריק</p>
        </div>



        <h3 id="song_n" >בחר שיר לניגון</h3>
       
        <input  id='open_q'  type="image"  src='img/queue-icon.png' width='40' height='40'  onclick='open_q()' >
        <input id='prev'  class="player_t" type="image"  src='img/‏‏prev-icon.png' width='45' height='45' value='' onclick='play_prev_bt()' />
        <input id='next'  class="player_t" type="image"  src='img/next-icon.png' width='45' height='45' value='' onclick='play_next_bt()' />
        <input id='play' class="player_t" type="image"  src='img/play-icon.png' width='49' height='49' value='' onclick='playAudio()' >
       <input id='pause' class="player_t" type="image"  src='img/Puse-icon.png' width='45' height='45' value='' onclick='pauseAudio()' >
        <div class='slidecontainer2'>
            <input type='range' min='0' max='' value='0' class='slider' id='c_time'>
        </div>
        <div class='slidecontainer'>
        <img   id ='speaker'  src='img/speaker.png' width='27' height='27' >
        <input id='myRange' type='range' min='0' max='100' value='<?php echo pull_set("default volume");  ?>' class='slider'>
        </div>
    
        <div class='s_time'>
        <p>  <i id='s_time'></i>:<i id='sec_time_s'></i>/<i id='e_time'></i>:<i id='sec_time'></i></p>
        </div>
       
    </div>
    </body>
    <script src="player/play_logic.js"></script>
</html>