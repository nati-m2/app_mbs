 <?php

  try { create_db();
    try{  create_table_user();}
    catch(Exception $e) {
      echo 'Message: ' .$e->getMessage();
    }
    try{ create_table_devise(); }
    catch(Exception $e) {
      echo 'Message: ' .$e->getMessage();
    }
    header("Location: index.php");
  }
  catch(Exception $e) {
    echo 'Message: ' .$e->getMessage();
  }

 
function  create_db(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
  // Create database
      $sql = "CREATE DATABASE mbs";
      if (mysqli_query($conn,$sql)) {
        echo "Database created successfully";
        echo "<br>";
        return 1;
      } else {
       // echo "Error creating database: " . mysqli_error($conn);
       throw new Exception("יש בעייה ליצור מסד נתונים");
       echo "<br>";
       echo "Error creating table: " . mysqli_error($connect);
     
        
        return 1;
      }
mysqli_close($conn);
}
function  create_table_user(){
    include  'sqli.php'; 
    $query = "CREATE TABLE user(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   firstname TEXT(30) NOT NULL, pass TEXT(40) NOT NULL)";
    if (mysqli_query($connect,$query)) {
      echo "Table user created successfully";
      echo "<br>";
    } else {
      throw new Exception('Error creating table user');
      echo "<br>";
      echo "Error creating table: " . mysqli_error($connect);
   
    }
        mysqli_close($connect);
}
function  create_table_devise(){
  include 'sqli.php'; 
    $query = "CREATE TABLE devise(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      devise_name TEXT(20) NOT NULL, Address TEXT(20))";
      if (mysqli_query($connect,$query)) {
        echo "Table devise created successfully";
        echo "<br>";
      } else {

        throw new Exception('Error creating table devise');
        echo "<br>";
        echo "Error creating table: " . mysqli_error($connect);
      
      }
      mysqli_close($connect);
}







?> 