<?php

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';

$loginUser   = $_POST["loginUser"];
$daytime     = $_POST["daytime"]; 
$timelog     = $_POST["timelog"];
$date        = $_POST["date"];
$time_f      = $_POST["time_f"];

$entropy     = $_POST["entropy"];
$condition   = $_POST["condition"];
$disn20times = $_POST["disn20times"];
$HitOrnot    = $_POST["HitOrnot"];
$HitTime     = $_POST["HitTime"];
$HitHippoPos = $_POST["HitHippoPos"];
$HitDistance = $_POST["HitDistance"];
$sus_times   = $_POST["sus_times"];
$EV          = $_POST["EV"];
$state       = $_POST["state"];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
echo "HITORNOT it ssus ";
// Check connection
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error);}

$sql = "INSERT INTO `timegame_$loginUser`
(`step`,`timelog`,`dates`,`situation`,`daytime`,`time_f`,`entropy`,`condition`,`EV`,`disn20times`,`HitOrnot`,`HitHippoPos`,`HitTime`,`HitDistance`,`sus_times`) VALUES 
('$state','$timelog','$date','disn20hitornot','$daytime','$time_f','$entropy','$condition','$EV','$disn20times','$HitOrnot','$HitHippoPos','$HitTime','$HitDistance','$sus_times')";
if ($conn->query($sql) === TRUE){ echo "sus!";$result = $conn->query($sql);}
else{echo "no";}
$conn->close();
?>

