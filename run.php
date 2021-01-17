<?php if(!session_id())session_start();
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
                    console.log("d");
                    if (data != "") {
                        console.log(data);
                        //play song
                        RemoveFromDb();
                       location.reload();
                        playAudio();
                     
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

    <div id= "player_div" > 
  
    <?php
     $song=$pause=null;
     $vol=pull_set("default volume"); 
    
    if(isset($_SESSION["task"])   && isset($_SESSION["val"]) ){
        if($_SESSION["task"]=='play'){
             $song="Media_Library/".$_SESSION["val"];
             $pause='1';
             echo "<p>".$song."</p>";
        } 
        else if($_SESSION["task"]=='pause'){
            $pause='0'; // pause=0 play=1
       }
       else if($_SESSION["task"]=='volume'){
        $vol=$_SESSION["val"];
   }
    unset($_SESSION["val"]);
    }


?>

        <audio   id='myAudio' autoplay>
        <source src= '<?php echo $song; ?>'  type= 'audio/ogg'>
        <source src= '<?php echo $song; ?>'  type='audio/mpeg'>
        </audio>
        <center>
        <input id='play' type="image" src='img/play.png'  width='45' height='45' onclick='playAudio()' value='<?php echo $pause; ?>'> 
        <input id='pause'type="image" src='img/Puse-icon.png'  width='45' height='45' onclick='pauseAudio()'value='<?php echo $pause; ?>' > 
       
        <div class='slidecontainer2'>
            <input type='range' min='0' max='' value='0' class='slider' id='c_time'>
        </div>
        </center>

        <div class='slidecontainer'>
        <img   id ='speaker'  src='img/speaker.png' width='27' height='27' >
        <input id='myRange' type='range' min='0' max='100' class='slider' value='<?php echo $vol; ?>' >
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