<?php

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';

$timelog     = $_POST["timelog"];
$date        = $_POST["date"];
$daytime     = $_POST["daytime"];
$state       = $_POST["state"];
$newphase      = $_POST["newphase"];

$loginUser   = $_POST["loginUser"];

//$_SESSION["NAME"]; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully<br><br>";
             
$sql = "INSERT INTO `timegame_$loginUser`(`step`,`timelog`,`dates`,`situation`,`phase`,`daytime`) VALUES ('$state','$timelog','$date','exp_end','$newphase','$daytime')";
if ($conn->query($sql) === TRUE)//,`entropy`,//,'$entropy','$condition','$disn20times'
{ echo "sus!";
$result = $conn->query($sql);}
else{echo "no";}
$conn->close();
?>
