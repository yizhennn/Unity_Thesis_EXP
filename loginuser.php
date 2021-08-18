<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "BMLabGoh5993";
$dbname= 'bmlab';

$timelog     = $_POST["timelog"];
$loginUser   = $_POST["loginUser"];
$loginPass   = $_POST["loginPass"];
$date        = $_POST["date"];
$daytime     = $_POST["daytime"];

$_SESSION["NAME"] = $_POST["loginUser"];
$_SESSION["PASS"] = $_POST["loginPass"];


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
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        if($row["passwords"]== $loginPass){
        $sql3 = "INSERT INTO `timegame_$loginUser`(step,timelog,dates,situation,daytime) VALUES ('Login','$timelog','$date','loginsus','$daytime')";
       // $sql4 = "INSERT INTO `timegame_$loginUser`(`situation`) VALUES ('loginsustimeloging')";
            if ($conn->query($sql3) === TRUE) {
                echo "Login successfully";//"passwords: " . $row["passwords"].  "<br>";
                }
            else echo "Login but timelog failed ";//"passwords: " . $row["passwords"].  "<br>";
        }
        else{
            $sql5 = "INSERT INTO `timegame_$loginUser`(step,timelog,dates,situation,daytime) VALUES ('Login','$timelog','$date','loginfail','$daytime')";
            if ($conn->query($sql5) === TRUE) {

            echo "Login failed: wrong password or username";}
        }
    }

}
else{echo "Username does not exist.";}

$conn->close();
?>