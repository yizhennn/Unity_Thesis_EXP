<?php

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname = "bmlab";


$loginUser   = $_POST["loginUser"]; 
$daytime     = $_POST["daytime"];
$timelog     = $_POST["timelog"];
$date        = $_POST["date"];
$time_f      = $_POST["time_f"];
$entropy     = $_POST["entropy"];
$condition   = $_POST["condition"];
$disn20times = $_POST["disn20times"];
$EV          = $_POST["EV"];
$state       = $_POST["state"];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 
echo "Connected successfully<br><br>";
/*echo $entropy;
echo $condition;
echo $disn20times;*/
 
$sql = "INSERT INTO `timegame_$loginUser`(`step`,`timelog`,`dates`,`situation`,`daytime`,`time_f`,`entropy`,`condition`,`EV`,`disn20times`) VALUES ('$state ','$timelog','$date','disn20start','$daytime','$time_f','$entropy','$condition','$EV','$disn20times')";
if ($conn->query($sql) === TRUE)//,`entropy`,//,'$entropy','$condition','$disn20times'
{ echo "sus!";
$result = $conn->query($sql);}
else{echo "no";}
$conn->close();
?>
