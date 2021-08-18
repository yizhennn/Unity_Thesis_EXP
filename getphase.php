<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';


$loginUser   = $_SESSION["NAME"];//_POST["loginUser"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br><br>";
             
$sql = "SELECT phase FROM `timegame_$loginUser` WHERE phase>=0 ORDER BY phase DESC LIMIT 1";
//SELECT * FROM `timegame_123` WHERE phase>0 ORDER BY phase DESC
$result = $conn->query($sql);



if ($result->num_rows > 0) 
{ 

    // output data of each row
    $rows=array();
    while($row = $result->fetch_assoc()) 
    {
        $_SESSION["PHASE"]=$row["phase"];
        $rows[]=$row;
    }
    //echo $_SESSION["PHASE"] ;

    echo json_encode($rows[0]);
}
else
{
    echo "no 0";
}

      
$conn->close();
?>
