<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="nati mizrhi">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="styles.css">
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" 
                integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
                crossorigin="anonymous"></script>
    </head>
    <body>
<br><br><br><br><br><br><br><br><br><br>
<div id="testing">
  
</div>
    </body>
    <script>
                $(document).ready(function(){ 
                setInterval(function (){
                    console.log('Hello world!');
                    $('#testing').load('test.php','#testing');
                },2000);
            });
            </script>
</html>