<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

define('DB_NAME', 'bookinfo');
 
// Attempt to connect to MySQL database 
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
// Check connection
if($mysqli === true){
    echo ("Connection to SQL database established");
}
 

if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}


//Creates database to store booking info
$sql = "CREATE DATABASE if not exists bookinfo";
if($mysqli->query($sql) === true){
    echo "";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
?>