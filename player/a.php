<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="play_st.css">

</head>
  <body onload="start()"> 
    <audio   id="myAudio" >
      <source src="t_a.ogg" type="audio/ogg">
      <source src="t_a.mp3" type="audio/mpeg">
    </audio>
    <center>
      <img id="play" src="play-icon.png" width="45" height="45" onclick="playAudio()">
      <img id="pause" src="Puse-icon.png" width="50" height="50" onclick="pauseAudio()">
      <br>
    
      <div class="slidecontainer2">
        <input type="range" min="0" max="" value="0" class="slider" id="c_time">
      </div>
      <div class="s_time">
      <p>  <i id="s_time"></i>:<i id="sec_time_s"></i>/<i id="e_time"></i>:<i id="sec_time"></i>  </p>
      </div>
    </center>

    <div class="slidecontainer">
      <img   id ="speaker"  src="speaker.png" width="27" height="27" >
      <input id="myRange" type="range" min="0" max="100" value="10" class="slider"   >
    </div>
  
  </body>
  <script src="play_logic.js"></script>
</html>
