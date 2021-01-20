<?php



//since PHP 5.2.0, allow_url_include must be enabled for these

// To create the nested structure, the $recursive parameter 
// to mkdir() must be specified.
//rmdir ( '/var/www/html/Media_Library' );
//mkdir('/var/www/html/Media_Library1', 0777, true);
//mkdir('/var/www/html/Media_Library1', 0777, true);
//chown -R 100 /var/www/html/
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
    <?php
  
    
if(isset($_SESSION["task"]) && isset($_SESSION["name"]) ){
   // $volume=pull_set("default volume");   set default volume
    if($_SESSION["name"]=="play"){
   $song="Media_Library/".$_SESSION["task"];
   echo "<p>". $_SESSION["task"]."</p>";
    }
    if($_SESSION["name"]=="volume"){
        $volume=$_SESSION["task"];
    }
    if($_SESSION["name"]=="pause"){
        $pause="pause";
    }

 
    unset( $_SESSION["name"]);
  unset($_SESSION["task"]);
    }
?>


<div id= "player_div" > 
        <audio   id='myAudio' autoplay>
        <source src= '<?php echo $song; ?>'  type= 'audio/ogg'>
        <source src= '<?php echo $song; ?>'  type='audio/mpeg'>
        </audio>
        <center>
        
        <input id='play' type="image"  src='img/play-icon.png' width='45' height='45' value='' onclick='playAudio()' >
       <input id='pause'  type="image"  src='img/Puse-icon.png' width='45' height='45' value='' onclick='pauseAudio()' >
        <br>
        <div class='slidecontainer2'>
            <input type='range' min='0' max='' value='0' class='slider' id='c_time'>
        </div>
        </center>

        <div class='slidecontainer'>
        <img   id ='speaker'  src='img/speaker.png' width='27' height='27' >
        <input id='myRange' type='range' min='0' max='100' value='<?php echo $volume ?>' class='slider'>
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
phpinfo();
  ?>
