<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
			<meta name="author" content="nati mizrhi">
        <title>mbs</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="styles.css">
                <link rel="stylesheet" type="text/css" href="formStyle.css">
				<script src="ck.js"></script>
        <script src="valid_all.js"></script>
        </head>
<style>

</style>
</head>
<body class="body_z">

<div id="id01" class="modal">
<form class="modal-content animate" action="register_user_p.php"   method="POST" onsubmit="return validation();"  >

    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none',window.history.back();" class="close" title="Close Modal">&times;</span>
      <img  src="img\img_avatar1.gif" alt="Avatar"   width="200" height="200"  class="avatar">
      <br>
      <label for="psw"><b>הרשמה</b></label>
    </div>
    <div class="container">
   
      <label for="uname"><b>שם משתמש</b></label>
      <input type="text" placeholder="שם משתמש" name="name" id="name" required>
      <label for="psw"><b>סיסמה</b></label>
      <input type="password" placeholder="סיסמה" name="password" id="pass" require>
      <label for="psw"><b>ודא סיסמה</b></label>
      <input type="password" placeholder="שוב סיסמה" name="password2" id="pass2" require>
      <button  class="sub" type="submit">התחבר</button>
      <center><p style=" color:red;" id="result"></p></center>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>
   
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none' , window.history.back();" class="sub2">Cancel</button>
    </div>
  </form>
</div>

<script>
document.getElementById('id01').style.display='block' ;
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        window.history.back();

    }
}
</script>

</body>
</html>