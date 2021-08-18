<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';

$timelog     = $_POST["timelog"];
$date        = $_POST["date"];
$daytime     = $_POST["daytime"];

$loginUser   = $_POST["loginUser"];
$limit   = $_POST["limit"];

//$_SESSION["NAME"]; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br><br>";
             
$sql = "INSERT INTO `timegame_$loginUser`(`step`,`timelog`,`dates`,`parameter`,`situation`,`phase`,`daytime`) VALUES ('SpeedCalibration','$timelog','$date','$limit','speedcaliover','1','$daytime')";
$result = $conn->query($sql);


      
$conn->close();
?>
