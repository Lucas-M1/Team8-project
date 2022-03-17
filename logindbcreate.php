<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'logininfo');

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

 
// Check connection
if($mysqli === true){
    echo "";
}
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

//Creates database to store user's login info
$sql = "CREATE DATABASE if not exists logininfo";
if($mysqli->query($sql) === true){
    echo "";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
$mysqli->close();
?>
