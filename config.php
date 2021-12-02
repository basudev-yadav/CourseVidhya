<?php

$server = "localhost";
$user = "root";
$pass = "";
$database = "coursevidhya";

#establishes the connection to phpmyadmin server 
$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>
