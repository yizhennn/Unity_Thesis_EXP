<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';

$loginUser   = $_POST["loginUser"];
$timelog     = $_POST["timelog"];
$date        = $_POST["date"];
$daytime     = $_POST["daytime"];
$time_f      = $_POST["time_f"];
$state       = $_POST["state"];

//$loginUser   ='123';// $_SESSION["NAME"]; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo json_encode($loginUser);
//echo $loginUser;//"Connected successfully<br><br>";//$loginUser;
             
$sql = "INSERT INTO `timegame_$loginUser`(`step`,`timelog`,`dates`,`situation`,`daytime`,`time_f`) VALUES ('$state','$timelog','$date','expSubID','$daytime','$time_f')";
$result = $conn->query($sql);

$sql = "ALTER TABLE `timegame_$loginUser` ADD(`condition` int,`EV` float,`disn20times`int,`HitOrnot`text,`HitHippoPos`float,`HitTime` float,`RealHitTime` float,`RealHitPos`float,`HitDistance`float,`sus_times`int)";
$result = $conn->query($sql);

$sql = "SELECT parameter FROM `timegame_$loginUser` WHERE parameter>0 ORDER BY parameter DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{   // output data of each row
    $rows=array();
    while($row = $result->fetch_assoc()) 
    {
        $_SESSION["parameter"]=$row["parameter"];
        $rows[]=$row;
    }
    //echo $_SESSION["PHASE"] ;

    echo json_encode($rows[0]);
}
$conn->close();
?>
