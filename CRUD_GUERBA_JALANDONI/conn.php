<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "miradb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error($conn));
}
// else{
//     echo "Successful!";
// }

?>