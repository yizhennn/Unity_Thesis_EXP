<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';

$timelog     = $_POST["timelog"];
$date        = $_POST["date"];
$daytime     = $_POST["daytime"];

$loginUser=$_SESSION["NAME"]; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo $loginUser;//"Connected successfully<br><br>";//$loginUser;
             
$sql = "INSERT INTO `timegame_$loginUser`(`step`,`timelog`,`dates`,`situation`,`daytime`) VALUES ('SpeedCalibration','$timelog','$date','speedcalistart','$daytime')";
$result = $conn->query($sql);


      
$conn->close();
?>
