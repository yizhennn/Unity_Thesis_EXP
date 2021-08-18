<?php
$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';


//$timelog     = $_POST["timelog"]
$loginUser   = $_POST["loginUser"];
$loginPass   = $_POST["loginPass"];
$date        = $_POST["date"];
$daytime     = $_POST["daytime"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br><br>";
             
$sql = "SELECT passwords FROM `timegame_$loginUser` WHERE username='".$loginUser."'" ;
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{ 
    echo "Username is already exist!";
   
}
else{
    //echo "Creating Username...<br>";

    $sql2 = "CREATE TABLE `timegame_$loginUser` (
        step text, 
        dates date,
        daytime time,
        username VARCHAR(50),
        passwords VARCHAR(50),
        phase int,
        parameter float,
        situation text,
        entropy int,
        timelog time,
        time_f time

        )";

    if ($conn->query($sql2) === TRUE) 
    {
       // echo "Table'".`timegame_$loginUser`."'created successfully";

        // insert data
       // $sql3 = "INSERT INTO `timegame_$loginUser`(dates,daytime,username,passwords,situation) VALUES ('$date','$daytime','$loginUser','$loginPass','FirstRegister')";
        $sql3 = "INSERT INTO `timegame_$loginUser`(step,dates,daytime,username,passwords,situation,phase) VALUES ('Register','$date','$daytime','$loginUser','$loginPass','FirstRegister','0')";

        if ($conn->query($sql3) === TRUE) { echo "New record created successfully";} 

    } 
    else {echo "Error creating table: " . $conn->error;}
}

$conn->close();
?>
