<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';

//'123';//
$loginUser=$_SESSION["NAME"]; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo $loginUser;//"Connected successfully<br><br>";//$loginUser;
         
    
$conn->close();
?>