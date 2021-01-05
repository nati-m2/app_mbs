 <?php
include "php_func\phpFunction.php"; 
  try { create_db();
        create_table_user();
        create_table_devise(); 
        create_table_settings();
        create_table_Task();
        insert_set("maxfile","10000000");
        //insert_set($name,$val);

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
   firstname TEXT(30) NOT NULL, pass TEXT(32) NOT NULL)";
    if (mysqli_query($connect,$query)) {
      echo "Table user created successfully";
      echo "<br>";
    } else {
     throw new Exception("Error creating table user");
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
       throw new Exception("Error creating table devise");
        echo "Error creating table: " . mysqli_error($connect);
      
      }
      mysqli_close($connect);
}


function  create_table_settings(){
  include 'sqli.php'; 
    $query = "CREATE TABLE settings(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name TEXT(15) NOT NULL, val TEXT(40))";
      if (mysqli_query($connect,$query)) {
        echo "Table devise created successfully";
        echo "<br>";
      } else {
       throw new Exception("Error creating table settings");
        echo "Error creating table: " . mysqli_error($connect);
      
      }
      mysqli_close($connect);
}




function  create_table_Task(){
  include 'sqli.php'; 
    $query = "CREATE TABLE task_t(id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name TEXT(15) NOT NULL, task TEXT(5), Address TEXT(20), song_n TEXT(40) )";
      if (mysqli_query($connect,$query)) {
        echo "Table devise created successfully";
        echo "<br>";
      } else {
       throw new Exception("Error creating table Task");
        echo "Error creating table: " . mysqli_error($connect);
      
      }
      mysqli_close($connect);
}




?> 
