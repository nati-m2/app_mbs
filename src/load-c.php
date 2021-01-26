<?php
include 'sqli.php';
//if(!empty($_POST['search'])){
  $search=$_POST['search'];
 $query="SELECT * FROM `song_t` where  `name` LIKE '%".$search."%'  ";
 $result=mysqli_query($connect,$query);
 $result_check=mysqli_num_rows($result);
 echo "<p>" .$result_check." תוצאות חיפוש</p>";
 if($result_check>0){
     while($row=mysqli_fetch_assoc($result)){
      echo" <li>
      <span>".$row['name']."</span>
      <div class='in_line'>
 

        <form class='in_line' action='devise_logic.php'   method='POST' >
        <input type='hidden'  name='val'  value='".$row['id']."'>
        <input type='hidden'  name='acc'   value='play'  >
        <input id='play'   type='image'  src='img/play.png' width='27' height='25'>
         </form>
        <span>   </span>
        <form class='in_line' action='devise_logic.php'   method='POST' >
        <input type='hidden'  name='d'  value='".$row['id']."'>
        <input id='play'   type='image'  src='img/trash.png' width='27' height='25'>
         </form>


     </form>
      </span>
      </div>
       </li>";
    }
}
mysqli_close($connect);
//}









?>