<?php


?>

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

    <audio controls autoplay>
    <?php echo pull_task(get_ip(),3);  ?>
        <source src=" <?php echo "Media_Library/".pull_task(get_ip(),3); ?>" type="audio/ogg">
        <source src=" <?php echo "Media_Library/".pull_task(get_ip(),3); ?>"type="audio/mpeg">
     </audio>



    </body>
</html>